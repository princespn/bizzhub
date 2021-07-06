<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use common\models\Settings;
use frontend\models\Document;
use Sitemaped\Element\Urlset\Urlset;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use MongoDB;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Site controller
 */
class DocumentController extends Controller
{
    /**
     * @return array
     */
    //public $layout = "home";
    /*public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                'only' => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }*/

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index','ajax-cat-doc-display','ajax-contact-search','ajax-document-send'],
                        'allow' => true,
                        'roles' => ['admin','agent'],
                    ],
                    [                    
                        'actions' => ['test','imagic-test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],                   

                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new Document();        
        $category = $model->getCategory();
        $document = $model->getDocument();
        $documentData = $model->getDocumentData('all');     

        return $this->render('index',[
            'category'=>$category,
            'document'=>$document,
            'documentData'=>$documentData,
            //'contactData'=>$contactData
        ]);
    }

    public function actionAjaxCatDocDisplay()
    {
        $model = new Document();
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $postData = $request->post();
            $documentData = $model->getDocumentData($postData);
        }
        $document = $this->renderPartial("_ajax_cat_doc", ['documentData'=>$documentData]);
        return Json::encode($document);
    }

    public function actionAjaxContactSearch($q = null, $id = null)
    {
        $model = new Document();
        $request = \Yii::$app->request;
        $contactData = [];
        if (!is_null($q)) {
            $settingmodel = new Settings();
            $settings = $settingmodel->getsetting();     
            $server = $settings['mongodb_URI_connection_url']['value']; 
            $c = new MongoDB\Client( $server );
            $db = $c->fub_webhooks;
            $collection = $db->people;
            $filter = $a = $where = [];
            $a['$and'][] = ['$or'=>[['firstName'=>['$regex'=>$q]],['lastName'=>['$regex'=>$q]],['name'=>['$regex'=>$q]],['emails.value'=>['$regex'=>$q]]]]; 
            $where['status'] = 1;
            $pepoles = $collection->find($a, ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'picture'=>TRUE]])->toArray();
            $count = 1;
            $viewData = [];
            $contactsData = [];
            $count = 0;
            $contact_image = "@web/img/Group 4551.png";
            foreach($pepoles as $data){                            
                $viewData['id'] = $data->_id;
                $viewData['mongo_status'] = 1;
                $viewData['name'] = utf8_encode($data->firstName).' '.utf8_encode($data->lastName); 
                foreach($data->emails as $email_value){
                    if($email_value->isPrimary == 1){
                        $viewData['email'] = $email_value->value;
                    }
                }
                $viewData['picture'] = "@web/img/user-1.png";
                if(!empty($data->picture->small)){
                    $viewData['picture'] = $data->picture->small;
                }
                $mongo_contact['mongo_'.$data->_id] = '<div class="Select_cont"><div class="select_cont_img">'.Html::img($viewData['picture']).'</div><div class="select_cont_detail"><h4>'.$viewData['name'].'</h4><p>'.$viewData['email'].'</p></div></div>';
            }
            $mysql_data = (new \yii\db\Query())
                        ->select(['id','concat(first_name, SPACE(1), last_name) as name','email'])
                        ->from('contacts')
                        ->where($where);
                        if(!empty($q)){
                            $mysql_data = $mysql_data->andWhere(['or',['like', 'first_name', $q],['like', 'last_name', $q],['like', 'email', $q]]);
                        }
                        $mysql_data = $mysql_data->andWhere(['is', 'mongo_contact_id', new \yii\db\Expression('null')])
                        ->All();
            foreach($mysql_data as $mysql_contactData){
                $mysql_contact['mysql_'.$mysql_contactData['id']] = '<div class="Select_cont"><div class="select_cont_img">'.Html::img($contact_image).'</div><div class="select_cont_detail"><h4>'.$mysql_contactData['name'].'</h4><p>'.$mysql_contactData['email'].'</p></div></div>';
            }            
            $contactData = array_merge($mongo_contact, $mysql_contact); 
        }
        foreach($contactData as $id => $value){
            $results[] = ['id' => $id, 'text' => $value];
        }
        $out['results'] = $results;
        return Json::encode($out);
    }

    public function actionAjaxDocumentSend()
    {
        $http = Yii::$app->params['http'];
        $base_url = Url::base($http);
        $request = \Yii::$app->request;
        $return = "fail";
        if ($request->isPost) {
            $postData = $request->post();
            if(!empty($postData['contacts']) && !empty($postData['document_id'])){
                $settingmodel = new Settings();
                $settings = $settingmodel->getsetting();     
                $server = $settings['mongodb_URI_connection_url']['value']; 
                $c = new MongoDB\Client( $server );
                $db = $c->fub_webhooks;
                $collection = $db->people;                
                foreach($postData['contacts'] as $contact_id){
                    $contact_id_arr = explode('_',$contact_id);
                    $cont_id = end($contact_id_arr);
                    $pepoles = $collection->find(['_id'=>(int)$cont_id], ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'picture'=>TRUE]])->toArray();
                    //print_r($pepoles);die;
                }                
                $document_Arr = explode(',',$postData['document_id']);
                foreach($document_Arr as $doc_id){
                    $document_path[] = $base_url.'/storage/web/document/'.$postData['form_doc_path_'.$doc_id];
                    $document_name = $postData['form_doc_name_'.$doc_id];
                }
                $emailArr = [0=>'dharmraj.objects@gmail.com',1=>'bizzhub1@mailinator.com'];
                $subject = "Document";
                $success=Yii::$app->mailer->compose()
                ->setFrom('developers.wdp@gmail.com')
                ->setTo($emailArr)
                ->setSubject($subject)
                ->setTextBody('This is document send mail')
                ->setHtmlBody('<b>Send Document</b>')
                ->attach($document_path)
                ->send();
                if(!empty($success)){
                    $return = "success";
                }else{
                    $return = "fail";
                }

            }
        }
        return  $return;
    }

    public function actionImagicTest()
    {
        $fPath = Yii::$app->params['document_path_image'];
        if(!is_dir($fPath)) {
            mkdir($fPath, 0777, true);
        }  
        $storage = \Yii::getAlias('@storage');
        $Imagefilename='Agent Hub Design.pdf';
        $converted_images = '/web/document/Agent Hub Design.pdf';
        $Converted_path_Multi=$storage.$converted_images;
        $Converted_path=$storage.'/web/document/thumb/Agent Hub Design'.'.png';
        if(extension_loaded('imagick')){
            $imagick = new \Imagick();
            $imagick->readImage($Converted_path_Multi);
            $pages = (int)$imagick->getNumberImages();
            if ($pages < 3) {
               $resolution = 600; 
             } else {
              $resolution = floor(sqrt(1000000/$pages)); 
             }
             $imagick->setResolution($resolution, $resolution);
            foreach($imagick as $i=>$imagick) { 
                $imagick->writeImage($Converted_path. " page ". ($i+1) ." of ".  $pages.".png"); 
            }
        }
    }
    
}
