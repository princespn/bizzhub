<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\Contact;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\data\SqlDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\web\UploadedFile;
//use yii\db\ActiveQuery;


/**
 * Site controller
 */
class ContactsController extends Controller
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
                        'actions' => ['index','add','edit','delete'],
                        'allow' => true,
                        'roles' => ['agent'],
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
        $model = new Contact();
        $agent = $model->getuserByRole('agent');
        foreach($agent as $a_id){
            $agent_id_arr[$a_id['id']]=strtolower($a_id['username']);
        }
        //print_r($agent_id_arr);die;
        if(!empty(Yii::$app->request->post())){
             $model->csv_file = UploadedFile::getInstance($model, 'csv_file');
             if ( $model->csv_file )
                {
                    $storage = \Yii::getAlias('@storage');            
                    $time = time();
                    $model->csv_file->saveAs($storage.'/web/csv/' .$time. '.' . $model->csv_file->extension);
                    $model->csv_file = $storage.'/web/csv/' .$time. '.' . $model->csv_file->extension;

                     $handle = fopen($model->csv_file, "r");
                     //print_r($handle);die;
                      $cnt = 0;
                     while (($fileop = fgetcsv($handle, 1000, ",")) !== false) 
                     {
                        if ($cnt!=0){
                            //print_r(urldecode($fileop));die;
                            $first_name = $fileop[0];
                            $last_name = $fileop[1];
                            $pos = strpos($fileop[2], ',');
                            if ($pos === false) {
                                $agent_id_arr = explode(',', $fileop[2]);
                                foreach ($agent_id_arr as $key => $a_id) {
                                    $agent[] = array_search(strtolower($fileop[2]),$agent_id_arr);
                                }
                                print_r($agent);die('ffff');
                            } else {
                                die('dfff');
                            }
                            $agent = array_search(strtolower($fileop[2]),$agent_id_arr);
                            $email = $fileop[3];
                            $phone = $fileop[4];
                            $list = $fileop[5];
                            // print_r($fileop);exit();
                            $rows = (new \yii\db\Query())
                            ->select(['id', 'email','agent_id'])
                            ->from('contact')
                            ->where(['email' => $email])
                            ->One();
                            if ($rows['agent_id'] != $agent) {
                                echo $agent;die;
                                $agentids = $rows['agent_id'];
                                Yii::$app->db->createCommand()
                                 ->update('contact', ['agent_id' => $this->agent_id], ['id' => $rows['id']])
                                 ->execute(); 
                            }
                            Yii::$app->db->createCommand()
                            ->insert('contact',
                                [
                                    'first_name'=>$first_name,
                                    'last_name'=>$last_name,
                                    'email'=>$email,
                                    'agent_id'=>$agent,
                                    'phone'=>$phone,
                                    'list'=>$list,
                                    'created_date'=>time(),
                                ]
                            )
                            ->execute(); 
                        }
                        $cnt++;
                     }

                     if ($cnt >= 1) 
                     {
                        echo "data upload successfully";
                        $this->refresh();
                     }

                }
        }
        $user_id = Yii::$app->user->identity->id;
        $user_id = 2;
        $query = new Query();        
            $rows = $query->select("*")
            ->from('contact')
            ->where(['status' => 1])
            ->andWhere(new \yii\db\Expression('FIND_IN_SET(:agent_id,agent_id)'))
            ->addParams([':agent_id' => $user_id])
            //->andwhere(['FIND_IN_SET','agent_id', 2])
            ->all();            
            $contacts_data = $data_arr = [];
            foreach($rows as $key => $data){
                if($data['agent_id']){
                    $agentid = explode(",", $data['agent_id']);
                    $contacts_data['agent_name'] = [];
                    foreach($agentid as $aid){
                        //echo $agent_id_arr[$aid];die;
                        $contacts_data['agent_name'][]=ucfirst($agent_id_arr[$aid]);
                    }
                }
                $contacts_data['agent_name'] = implode(',', $contacts_data['agent_name']);
                $contacts_data['id'] = $data['id'];
                $contacts_data['first_name'] = $data['first_name'];
                $contacts_data['last_name'] = $data['last_name'];
                $contacts_data['email'] = $data['email'];
                $contacts_data['phone'] = $data['phone'];
                $contacts_data['agent_id'] = $data['agent_id'];
                $contacts_data['list'] = $data['list'];
                $contacts_data['status'] = $data['status'];
                $contacts_data['updated_date'] = $data['updated_date'];
                $contacts_data['created_date'] = $data['created_date'];
                //print_r($contacts_data);die;
                $data_arr[] = $contacts_data;
            }
            //print_r($data_arr);die;
        $provider = new ArrayDataProvider([
            'allModels' => $data_arr,
            'sort' => [
                'attributes' => ['first_name','last_name'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('index',[
                'dataProvider' => $provider,
                'model' => $models,
                'models'=>$model
            ]);
    }

    /**
     * @return string|Response
     */
    public function actionAdd()
    {
        $role = Yii::$app->authManager->getRoles();
        
        $model = new Contact();
        //print_r(Yii::$app->request->post());die;
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->attributes= Yii::$app->request->post();
                $rows = (new \yii\db\Query())
                    ->select(['id', 'email','agent_id'])
                    ->from('contact')
                    ->where(['email' => $model->attributes['email']])
                    ->One();
                if(!empty($rows)){
                    Yii::$app->session->setFlash('error', "This email id is already use.");
                }else{    
                    $model->save();
                    return $this->redirect(['index']);
                    Yii::$app->session->setFlash('success', "Contact saved successfull.");
                }
            }
        }
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        return $this->render('add', [
            'model' => $model,
            'agent_array'=>$agent_arr
        ]);
    }

    public function actionEdit($id)
    {
        $model = new Contact();
        //$myModel = Contact::find(10);
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        //$modelData = $model->getDataById($id);
        //print_r($modelData);die;
        $model->attributes = $model->getDataById($id);


        //$model = $model->findByPk($id);
        //$model->setModel($model);
        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->attributes= Yii::$app->request->post();
                //print_r($model);die;
                $model->update();
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('edit', [
            'model' => $model,
            'agent_array'=>$agent_arr
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Contact();        
        if(!empty($id)){
            $model->deleteContatsById($id);           
            return $this->redirect(['index']);            
        }
    }

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }

        return $content;
    }
}
