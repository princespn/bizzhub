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
        $address = $document = "";   
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
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['purchase_application'].'">'.'Purchase Application'.'</a></li>';
                    } 
                    if(!empty($value['offering_plan'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['offering_plan'].'">'.'Offering Plan'.'</a></li>';
                    } 
                    if(!empty($value['amendments'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['amendments'].'">'.'Amendments'.'</a></li>';
                    }
                    if(!empty($value['house_rules'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['house_rules'].'">'.'House Rules'.'</a></li>';
                    }  
                    if(!empty($value['sublet_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['sublet_policy'].'">'.'Sublet Policy'.'</a></li>';
                    } 
                    if(!empty($value['covid_19_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['covid_19_policy'].'">'.'COVID-19 Policy'.'</a></li>';
                    } 
                    if(!empty($value['sublet_application'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['sublet_application'].'">'.'Sublet Application'.'</a></li>';
                    } 
                    if(!empty($value['rental_application'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['rental_application'].'">'.'Rental Application'.'</a></li>';
                    }   
                    if(!empty($value['bulk_rate_offering'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['bulk_rate_offering'].'">'.'Bulk Rate Offering'.'</a></li>';
                    } 
                    if(!empty($value['renovations'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['renovations'].'">'.'Renovations'.'</a></li>';
                    } 
                    if(!empty($value['by_laws'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['by_laws'].'">'.'By-Laws'.'</a></li>';
                    }
                    if(!empty($value['lease_agreement'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['lease_agreement'].'">'.'Lease Agreement'.'</a></li>';
                    }
                    if(!empty($value['move_in_out'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['move_in_out'].'">'.'Move In/Out'.'</a></li>';
                    } 
                    if(!empty($value['regulatory_agreement'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['regulatory_agreement'].'">'.'Regulatory Agreement'.'</a></li>';
                    } 
                    if(!empty($value['flip_tax_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['flip_tax_policy'].'">'.'Flip Tax Policy'.'</a></li>';
                    }
                    if(!empty($value['pet_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['pet_policy'].'">'.'Pet Policy'.'</a></li>';
                    }
                    if(!empty($value['terrace_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['terrace_policy'].'">'.'Terrace Policy'.'</a></li>';
                    } 
                    if(!empty($value['storage_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['storage_policy'].'">'.'Storage Policy'.'</a></li>';
                    }
                    if(!empty($value['financials_2019'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2019'].'">'.'Financials 2019'.'</a></li>';
                    }
                    if(!empty($value['financials_2018'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2018'].'">'.'Financials 2018'.'</a></li>';
                    }
                    if(!empty($value['financials_2017'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2017'].'">'.'Financials 2017'.'</a></li>';
                    }
                    if(!empty($value['financials_2016'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2016'].'">'.'Financials 2016'.'</a></li>';
                    } 
                    if(!empty($value['financials_2015'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2015'].'">'.'Financials 2015'.'</a></li>';
                    } 
                    if(!empty($value['financials_2014'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['financials_2014'].'">'.'Financials 2014'.'</a></li>';
                    }
                    if(!empty($value['operating_budget'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['operating_budget'].'">'.'Operating Budget'.'</a></li>';
                    } 
                    if(!empty($value['fitness_center_policy'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['fitness_center_policy'].'">'.'Fitness Center Policy'.'</a></li>';
                    } 
                    if(!empty($value['credit_report_form'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['credit_report_form'].'">'.'Credit Report Form'.'</a></li>';
                    } 
                    if(!empty($value['annual_meeting_notes'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['annual_meeting_notes'].'">'.'Annual Meeting Notes'.'</a></li>';
                    } 
                    if(!empty($value['handbook'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['handbook'].'">'.'Handbook'.'</a></li>';
                    }
                    if(!empty($value['subscription_agreement'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['subscription_agreement'].'">'.'Subscription Agreement'.'</a></li>';
                    } 
                    if(!empty($value['refinance_application'])){
                        $document .='<li><a href="'.env('STORAGE_HOST_INFO').'buildings/'.$value['refinance_application'].'">'.'Refinance Application'.'</a></li>';
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
