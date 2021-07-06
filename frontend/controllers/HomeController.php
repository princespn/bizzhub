<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use common\models\Settings;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Contacts;
use frontend\models\Home;
use yii\helpers\BaseFileHelper;
use yii\data\Pagination;


/**
 * Site controller
 */
class HomeController extends Controller
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
                        'actions' => ['index','ajax-add-contacts','get-retsdata','get-retsfiledata','generate-docx'],
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
        $request = Yii::$app->request;
        $view = !empty($request->get('v'))?$request->get('v'):'list';
        $limit = 8;
        if($view == 'list'){
            $limit = 5;
        }        
        $postData = Yii::$app->request->post();
        //print_r($q);die;
        //echo $view;die;
        $home = new Home();
        $retsData = $home->getRetsData();
        $query = (new \yii\db\Query())
            ->select(['rets_property.address_with_unit','rets_property.place_name','rets_property.property_type','rets_property.num_baths','rets_property.num_bedrooms','rets_property.vacant','rets_property.rets_keys','rets_property.building_pets','rets_property.hoa_fee','rets_property.assessment_no','rets_property.maximum_financing_percent','rets_property.listing_price','rets_property.virtual_tour_url','rets_property.video_url','rets_property.id','agent.first_name','agent.last_name','agent.status','agent.agent_image_base_url','agent.agent_image'])
            ->from('rets_property')
            ->leftjoin('rets_agent agent', 'agent.agent_id=rets_property.agent1_id');
            if(!empty($postData)){
                $query->andFilterWhere([
                    'or',
                    ['like', 'rets_property.address_with_unit', $postData['q']],
                    ['like', 'rets_property.place_name', $postData['q']],
                ]);
                //$query->where(['rets_property.address_with_unit'=>$postData['q'],'rets_property.place_name'=>$postData['q']]);
            }
            $query->orderBy(['id' => SORT_DESC]);
            //->limit(7)
            //->All();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => $limit]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
            //print_r($models);die;
        $propertyData = [];    
        foreach($models as $key => $pData){
          $rpi = (new \yii\db\Query())
            ->select(['*'])
            ->from('rets_property_image')
            ->where(['property_id'=>$pData['id']])
            ->All();
          $propertyData[$key] = $pData; 
          $propertyData[$key]['images'] = $rpi; 
        }
        //echo count($propertyData); die;       
        //print_r($propertyData);die;
        return $this->render($view,[
            //'retsData'=> $retsData,
            'retsData' => $propertyData,
            'pages' => $pages,
        ]);
    }


    public function actionAjaxAddContacts()
    {
        $model = new Contacts();
        $return = "fail";  
    $user_id = Yii::$app->user->getId();
    $role = Yii::$app->db
        ->createCommand("Select `item_name` from rbac_auth_assignment where user_id='2'")
        ->queryScalar();
    $contactAuthArr = Yii::$app->params['ContactAuthUserRole']; 
    $error = 'you have some error';     
    if (in_array($role, $contactAuthArr)){     
        if (Yii::$app->request->isAjax) {
                $data = Yii::$app->request->post(); 
                $rows = (new \yii\db\Query())
                        ->select(['id', 'email','agent_id'])
                        ->from('contacts')
                        ->where(['email' => $data['Contacts']['email']])
                        ->One();                                     
                if(!empty($rows)){
                    $agents = $user_id;
                    if($rows['agent_id'] != $agents){
                        $array1 = explode(',', $rows['agent_id']);
                        $array2 = explode(',', $agents);
                        $ag_id_arr = array_unique(array_merge($array1,$array2), SORT_REGULAR);
                        $ag_id = implode(',', $ag_id_arr);
                        //$agentids = $rows['agent_id'];
                        Yii::$app->db->createCommand()
                         ->update('contacts', ['agent_id' => $ag_id], ['id' => $rows['id']])
                         ->execute();
                         $success = 'Contact saved successfull.';                      
                    }else{
                        $error = 'This email id is already use.';
                    }                    
                }else{ 
                    Yii::$app->db->createCommand()
                    ->insert('contacts',
                        [
                            'first_name'=>$data['Contacts']['first_name'],
                            'last_name'=>$data['Contacts']['last_name'],
                            'email'=>$data['Contacts']['email'],
                            'agent_id'=>$user_id,
                            'created_date'=>time()
                        ]
                    )
                    ->execute();    
                    $success = 'Contact saved successfull.';
                } 
            }else{
                $error = 'Form data is blank';
            }
        }else{
           $error = 'You are not authorize'; 
        }
        if(!empty($success)){
             $return = $success;
        }else{
            $return = $error;
       }
       return json_encode($return);        
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
