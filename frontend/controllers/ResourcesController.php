<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
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

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index','supports','ajaxsearch'],
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
        $model = new Resources();
        $supportsData = $model->getSupportsData();
        //print_r($documentData);die;

        return $this->render('index',[
            'supportsData'=>$supportsData,
        ]);
    }

    /**
     * @return string
     */
    public function actionSupports()
    {
        //die('ddd');
        $model = new Resources();
        //if (Yii::$app->request->isAjax) {
        //    $data = Yii::$app->request->post();
        //    $supportsData = $model->getSupportsDataById($data['type']);
            Yii::$app->mailer->compose()
            ->setFrom('dharmraj.kumhar@gmail.com')
            ->setTo('dharmraj.kumhar@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();

        //}
    }

    public function actionAjaxsearch()
    {
        $model = new Resources();
        $searchData = $document = "";   
        if(!empty($_POST)){
            $data = $model->buildingSearch($_POST['searchtext']);
            if(!empty($data)){
                $document .='<ul>';
                foreach ($data as $key => $value) {
                    $searchData.= '<p>'.$value['address'].'</p>';
                    if(!empty($value['purchase_application'])){
                        $document .='<li><a href="#">'.$value['purchase_application'].'</a></li>';
                    }
                }
                $document .="</ul>";
            }
           
        }
        //echo $document;die;
        return $searchData;
    }
}
