<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use common\models\Settings;
use common\models\EmailTemplate;
use frontend\models\Resources;
use Sitemaped\Element\Urlset\Urlset;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\Url;
use MongoDB;

/**
 * Site controller
 */
class ResourcesController extends Controller
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

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index','supports','ajaxsearch','ajax-document-send'],
                        'allow' => true,
                        'roles' => ['admin','agent'],
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
        
        $model = new Resources();
        $buldingData = [];
        if(Yii::$app->request->post()){
            $data = Yii::$app->request->post();
            $data['resource_search_query'] = '4 Bogardus Place 2F';
            $buldingData = $model->buildingSearch($data['resource_search_query']);
        }
        return $this->render('index',[
            'buldingData'=>$buldingData,
        ]);
    }

    /**
     * @return string
     */
    public function actionSupports()
    {
        $model = new Resources();
    $return = "fail";    
    if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $supportsData = $model->getSupportsDataById($data['type']);
            //print_r($supportsData);die;
            $success=Yii::$app->mailer->compose()
            //->setFrom('dharmraj.kumhar@gmail.com')
            ->setTo($supportsData['email'])
            ->setSubject($supportsData['type'])
            ->setTextBody($data['message'])
            ->setHtmlBody('<b>'.$data['message'].'</b>')
            ->send();
            if(!empty($success)){
                $return = "success";
            }else{
                $return = "fail";
            }
            

        }
        return $return;
    }


    public function actionAjaxDocumentSend()
    {
        $http = Yii::$app->params['http'];
        $base_url = Url::base($http);
        $request = \Yii::$app->request;
        $return = "fail";
        //print_r($request->post());
        if ($request->isPost) {
            $postData = $request->post();
            //print_r($postData);die;
            if(!empty($postData['contacts']) && !empty($postData['document_id'])){
                $settingmodel = new Settings();
                $emailTemplatemodel = new EmailTemplate();
                $settings = $settingmodel->getsetting();
                $template = $emailTemplatemodel->gettemplate('RESOURCE_DOCUMENT'); 
                //print_r($template);die;    
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
                $document_path = $postData['form_doc_path_'.$postData['document_id']];
                //echo $document_path;die;              
                $document_Arr = explode('_',$postData['document_id']);
                $emailArr = [0=>'dharmraj.objects@gmail.com',1=>'bizzhub1@mailinator.com'];
                $subject = $template['subject'];
                $body = $template['header'].'</br></br>'.$template['content'].'</br></br>'.$template['footer'];
                $success=Yii::$app->mailer->compose()
                ->setFrom('developers.wdp@gmail.com')
                ->setTo($emailArr)
                ->setSubject($subject)
                //->setTextBody('This is document send mail')
                ->setHtmlBody($body)
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

    public function actionAjaxsearch()
    {
        $model = new Resources();
        $address = $document = "";  
        $returnArray = []; 
        if(!empty($_POST)){
            $data = $model->buildingSearch($_POST['searchtext']);
            if(!empty($data)){
                $liCount = 1;                
                foreach ($data as $key => $value) {
                    if($liCount == 1){
                        $ulClass="doc_list bild_show";
                        $activeClass = "build_list opened_doc";
                    }else{
                        $ulClass="doc_list bild_hide";
                        $activeClass = "build_list";
                    }
                    $address.= '<p id="build_'.$key.'" onclick="showDoc(this.id)" class="'.$activeClass.'">'.$value['address'].'</p>';
                    $document .='<ul id="doc_'.$key.'" class="'.$ulClass.'">';
                    if(!empty($value['purchase_application'])){
                        $document .='<li><a href=file/download?n='.$value['purchase_application'].'&p=buildings&a=index>'.'Purchase Application'.'</a></li>';
                    } 
                    if(!empty($value['offering_plan'])){
                        $document .='<li><a href=file/download?n='.$value['offering_plan'].'&p=buildings&a=index>'.'Offering Plan'.'</a></li>';
                    } 
                    if(!empty($value['amendments'])){
                        $document .='<li><a href=file/download?n='.$value['amendments'].'&p=buildings&a=index>'.'Amendments'.'</a></li>';
                    }
                    if(!empty($value['house_rules'])){
                        $document .='<li><a href=file/download?n='.$value['house_rules'].'&p=buildings&a=index>'.'House Rules'.'</a></li>';
                    }  
                    if(!empty($value['sublet_policy'])){
                        $document .='<li><a href=file/download?n='.$value['sublet_policy'].'&p=buildings&a=index>'.'Sublet Policy'.'</a></li>';
                    } 
                    if(!empty($value['covid_19_policy'])){
                        $document .='<li><a href=file/download?n='.$value['covid_19_policy'].'&p=buildings&a=index>'.'COVID-19 Policy'.'</a></li>';
                    } 
                    if(!empty($value['sublet_application'])){
                        $document .='<li><a href=file/download?n='.$value['sublet_application'].'&p=buildings&a=index>'.'Sublet Application'.'</a></li>';
                    } 
                    if(!empty($value['rental_application'])){
                        $document .='<li><a href=file/download?n='.$value['rental_application'].'&p=buildings&a=index>'.'Rental Application'.'</a></li>';
                    }   
                    if(!empty($value['bulk_rate_offering'])){
                        $document .='<li><a href=file/download?n='.$value['bulk_rate_offering'].'&p=buildings&a=index>'.'Bulk Rate Offering'.'</a></li>';
                    } 
                    if(!empty($value['renovations'])){
                        $document .='<li><a href=file/download?n='.$value['renovations'].'&p=buildings&a=index>'.'Renovations'.'</a></li>';
                    } 
                    if(!empty($value['by_laws'])){
                        $document .='<li><a href=file/download?n='.$value['by_laws'].'&p=buildings&a=index>'.'By-Laws'.'</a></li>';
                    }
                    if(!empty($value['lease_agreement'])){
                        $document .='<li><a href=file/download?n='.$value['lease_agreement'].'&p=buildings&a=index>'.'Lease Agreement'.'</a></li>';
                    }
                    if(!empty($value['move_in_out'])){
                        $document .='<li><a href=file/download?n='.$value['move_in_out'].'&p=buildings&a=index>'.'Move In/Out'.'</a></li>';
                    } 
                    if(!empty($value['regulatory_agreement'])){
                        $document .='<li><a href=file/download?n='.$value['regulatory_agreement'].'&p=buildings&a=index>'.'Regulatory Agreement'.'</a></li>';
                    } 
                    if(!empty($value['flip_tax_policy'])){
                        $document .='<li><a href=file/download?n='.$value['flip_tax_policy'].'&p=buildings&a=index>'.'Flip Tax Policy'.'</a></li>';
                    }
                    if(!empty($value['pet_policy'])){
                        $document .='<li><a href=file/download?n='.$value['pet_policy'].'&p=buildings&a=index>'.'Pet Policy'.'</a></li>';
                    }
                    if(!empty($value['terrace_policy'])){
                        $document .='<li><a href=file/download?n='.$value['terrace_policy'].'&p=buildings&a=index>'.'Terrace Policy'.'</a></li>';
                    } 
                    if(!empty($value['storage_policy'])){
                        $document .='<li><a href=file/download?n='.$value['storage_policy'].'&p=buildings&a=index>'.'Storage Policy'.'</a></li>';
                    }
                    if(!empty($value['financials_2019'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2019'].'&p=buildings&a=index>'.'Financials 2019'.'</a></li>';
                    }
                    if(!empty($value['financials_2018'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2018'].'&p=buildings&a=index>'.'Financials 2018'.'</a></li>';
                    }
                    if(!empty($value['financials_2017'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2017'].'&p=buildings&a=index>'.'Financials 2017'.'</a></li>';
                    }
                    if(!empty($value['financials_2016'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2016'].'&p=buildings&a=index>'.'Financials 2016'.'</a></li>';
                    } 
                    if(!empty($value['financials_2015'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2015'].'&p=buildings&a=index>'.'Financials 2015'.'</a></li>';
                    } 
                    if(!empty($value['financials_2014'])){
                        $document .='<li><a href=file/download?n='.$value['financials_2014'].'&p=buildings&a=index>'.'Financials 2014'.'</a></li>';
                    }
                    if(!empty($value['operating_budget'])){
                        $document .='<li><a href=file/download?n='.$value['operating_budget'].'&p=buildings&a=index>'.'Operating Budget'.'</a></li>';
                    } 
                    if(!empty($value['fitness_center_policy'])){
                        $document .='<li><a href=file/download?n='.$value['fitness_center_policy'].'&p=buildings&a=index>'.'Fitness Center Policy'.'</a></li>';
                    } 
                    if(!empty($value['credit_report_form'])){
                        $document .='<li><a href=file/download?n='.$value['credit_report_form'].'&p=buildings&a=index>'.'Credit Report Form'.'</a></li>';
                    } 
                    if(!empty($value['annual_meeting_notes'])){
                        $document .='<li><a href=file/download?n='.$value['annual_meeting_notes'].'&p=buildings&a=index>'.'Annual Meeting Notes'.'</a></li>';
                    } 
                    if(!empty($value['handbook'])){
                        $document .='<li><a href=file/download?n='.$value['handbook'].'&p=buildings&a=index>'.'Handbook'.'</a></li>';
                    }
                    if(!empty($value['subscription_agreement'])){
                        $document .='<li><a href=file/download?n='.$value['subscription_agreement'].'&p=buildings&a=index>'.'Subscription Agreement'.'</a></li>';
                    } 
                    if(!empty($value['refinance_application'])){
                        $document .='<li><a href=file/download?n='.$value['refinance_application'].'&p=buildings&a=index>'.'Refinance Application'.'</a></li>';
                    }  
                    $document .="</ul>";
                    $liCount++;
                } 
                $returnArray = ['address'=>$address, 'document'=>$document];               
            }           
        }
        return json_encode($returnArray);
    }
}
