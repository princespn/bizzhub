<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Contact;


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
                        'actions' => ['index','ajax-add-contact'],
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
        $contact = new Contact();
        //$config = new \PHRETS\Configuration;
        return $this->render('index',[
            'contact' => $contact
        ]);
    }


    public function actionAjaxAddContact()
    {
        $model = new Contact();
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
                        ->from('contact')
                        ->where(['email' => $data['Contact']['email']])
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
                         ->update('contact', ['agent_id' => $ag_id], ['id' => $rows['id']])
                         ->execute();
                         $success = 'Contact saved successfull.';                      
                    }else{
                        $error = 'This email id is already use.';
                    }                    
                }else{ 
                    Yii::$app->db->createCommand()
                    ->insert('contact',
                        [
                            'first_name'=>$data['Contact']['first_name'],
                            'last_name'=>$data['Contact']['last_name'],
                            'email'=>$data['Contact']['email'],
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
     * @return string|Response
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            }

            Yii::$app->getSession()->setFlash('alert', [
                'body' => \Yii::t('frontend', 'There was an error sending email.'),
                'options' => ['class' => 'alert-danger']
            ]);
        }

        return $this->render('contact', [
            'model' => $model
        ]);
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
