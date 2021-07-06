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
use frontend\models\Home;


/**
 * Site controller
 */
class CommonController extends Controller
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

    public function init()
    {
        parent::init();
    }

    public function beforeAction($action) {
        if(Yii::$app->user->isGuest){
            $this->layout = 'guest';
        }
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin','agent','client'],
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
        $admin_visible = $client_visible = 0;
        if(Yii::$app->user->can('admin') || Yii::$app->user->can('agent')){
            $admin_visible = 1;
        } else{
            $client_visible = 1;
        }
        //echo $client_visible.' '. $admin_visible;die;
        if(!$client_visible){
            return $this->redirect(['home/index']);
        }else{
            return $this->redirect(['client-home/index']);
        }
    }
    
}
