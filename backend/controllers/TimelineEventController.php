<?php

namespace backend\controllers;
use yii\filters\VerbFilter;
use backend\models\search\TimelineEventSearch;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use MailchimpAPI\Mailchimp;
/**
 * Application timeline controller
 */
class TimelineEventController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

    public function behaviors()
        {       
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add','update','delete','category','add-category'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listTimelineevent'],
                    ],
                    
                ],

                'denyCallback' => function ($rule, $action) {
                    $this->redirect("@web/timeline-event/index");
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new TimelineEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMailchimp()
    {
        // list data 
        $mailchimp = new Mailchimp('4b166d98dc0c9b22e4d03adc5783ccfe-us1');
        $listData = $mailchimp->lists()->get();
        $listData->getBody(); 
        $list_data = $listData->deserialize(); 
        //print_r($list_data->lists[0]->id);die;
        //segment data
        $segmentsData = $mailchimp->lists($list_data->lists[0]->id)->segments()->get();
        $segmentsData->getBody(); 
        $segments_data = $segmentsData->deserialize(); 
        //print_r($segments_data);die;

        /* Import data */
        /*$merge_values = [
            "FNAME" => "John5",
            "LNAME" => "Doe5"
        ];

        $post_params = [
            "email_address" => "example5@domain.com", 
            "status" => "unsubscribed", 
            "email_type" => "html", 
            "merge_fields" => $merge_values
        ];

        $mailchimp
            ->lists('bf7d17def8')
            ->members()
            ->post($post_params);*/

        

        /*$put_params = [
            //"email_address" => "example5@domain.com",
            "status_if_new" => "subscribed",
        ];
        $list_id = '525ea41114e79d2b3f45fe2fc04c10b3';
        $put_response = $mailchimp
                    ->lists()
                    ->members("example5@domain.com")
                    ->put($put_params);    

        print_r($put_response);die;*/
        //CURLOPT_SSL_VERIFYPEER = 0;
        //$audiance_id = 'bf7d17def8';
        /* import end */

        /* export list */

        //$response = $mailchimp->batches()->get();
        //print_r($response);die;
        $get_by = "example1@domain.com"; 
        $response = $mailchimp->lists('bf7d17def8')->members()->get();
        $response->getBody(); 
        $member = $response->deserialize();              
        print_r($member);die;
        /* end */

        return $this->render('mailchimp', [
        ]);
    }
}
