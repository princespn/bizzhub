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
use frontend\models\ClientHome;
use common\models\ClientTemplate;
use common\models\ClientDataCategory;
use common\models\ClientDataForm;
use common\models\ClientForm;
use common\models\ClientData;
use common\models\User;
use yii\helpers\Json;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class ClientHomeController extends Controller
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
                        'actions' => ['index','ajax-add-contact','ajax-form-display','ajax-form-display-views','save-form','get-retsdata','get-retsfiledata','ajax-client-data'],
                        'allow' => true,
                        'roles' => ['client'],
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
        $user_id = Yii::$app->user->id;
        $models = new ClientHome();
        $id = 2;  
        $templete = ClientTemplate::findOne($id);
        $templeteaa = ClientTemplate::find()->where(['status'=>1,'id' => $id])->all();
        $category = ClientDataCategory::find()->where(['status'=>1,'templete_id' => $templete->id])->all();
        foreach($category as $cat_value){
            $cat_id_arr[$cat_value->id] = $cat_value->id;
        }
        $form = ClientDataForm::find()->andFilterWhere(['IN','cat_id', $cat_id_arr])->all();
        $form_count = count($form);
        //echo $form_count;die;
        foreach($form as $form_value){
            $form_id_arr[$form_value->id] = $form_value->id;
            $form_data_arr[$form_value->cat_id][] = $form_value;
        }
        $form_fields = ClientForm::find()->andFilterWhere(['IN','form_id', $form_id_arr])->orderBy(['field_order' => SORT_ASC])->all();
        foreach($form_fields as $form_field){
            $form_field_arr[$form_field->form_id][] = $form_field;
        }

        $formData = (new \yii\db\Query())
            ->select(['*'])
            ->from('client_data')
            ->where(['user_id'=>$user_id])
            ->All();
        $formDataArr = [];    
        foreach($formData as $f_value){
            $formDataArr[$f_value['form_id']][$f_value['field_id']] = $f_value['value'];
            $folderStatusArr[$f_value['form_id']] = $f_value['folder_status'];
        }
        $user_data = User::findIdentity($user_id);
        $profileselectorArr = json_decode($user_data->profileselector);
        $successmanagerArr = json_decode($user_data->successmanager);
        $attorneyArr = json_decode($user_data->attorney);
        $mortgageLenderArr = json_decode($user_data->mortgageLender);
        $agentArr = json_decode($user_data->agent);
        $profileSelector = User::getUser($profileselectorArr);
        $successManager = User::getUser($successmanagerArr);
        $attorney = User::getUser($attorneyArr);
        $mortgageLender = User::getUser($mortgageLenderArr);
        $agent = User::getUser($agentArr);    
        //print_r($folderStatusArr);die;     
         
        return $this->render('index',[
            'models' => $models,
            'templete' => $templete,
            'templeteaa' => $templeteaa,
            'category' => $category,
            'form_data_arr' => $form_data_arr,
            'form_field_arr' => $form_field_arr,
            'formData' => $formDataArr,
            'folderStatusArr' => $folderStatusArr,
            'profileSelector'=>$profileSelector,
            'successManager'=>$successManager,
            'agent'=>$agent,
            'attorney'=>$attorney,
            'mortgageLender'=>$mortgageLender

        ]);
    }


    public function actionAjaxFormDisplayViews(){
         $user_id = Yii::$app->user->id;
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $form_field_arr = $formDataArr = []; 
            $postData = $request->post();
            
            $fieldData = [];
            if(!empty($postData['fields_id'])){
                $existdata_data = (new \yii\db\Query())
                ->select(['id','status'])
                ->from('client_data')
                ->where(['field_id'=> $postData['fields_id'], 'user_id'=>$user_id])
                ->one();
                if ($existdata_data['status'] < 2) {
                    $fieldData['updated_at'] = time();
                    $fieldData['status'] = 2;
                    $result = Yii::$app->db->createCommand()
                    ->update('client_data', $fieldData,['id' => $existdata_data['id']])
                    ->execute();
                }
            }

            $fieldStatusData = (new \yii\db\Query())
                ->select(['id','status'])
                ->from('client_data')
                ->where(['field_id'=> $postData['fields_id'], 'user_id'=>$user_id])
                ->one();
            $field_status = $this->renderPartial("_ajax_field_status", ['fieldStatusData'=>$fieldStatusData]);

            return Json::encode($field_status);
    }
}



    public function actionAjaxFormDisplay(){
        $user_id = Yii::$app->user->id;
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $form_field_arr = $formDataArr = []; 
            $postData = $request->post();
            $form = ClientDataForm::find()->andFilterWhere(['id'=>$postData['form_id']])->one();
            $form_fields = ClientForm::find()->andFilterWhere(['form_id'=>$form->id])->orderBy(['field_order' => SORT_ASC])->all();
            $fieldData = [];
            foreach($form_fields as $form_field){
                $form_field_arr[$form_field->form_id][] = $form_field;
                $existdata_data = (new \yii\db\Query())
                ->select(['id','folder_status'])
                ->from('client_data')
                ->where(['field_id'=> $form_field->id, 'user_id'=>$user_id])
                ->one();
                //print_r($existdata_data);die;

                if($existdata_data['folder_status'] < 2){
                    $fieldData['form_id'] = $form_field->form_id;
                    $fieldData['field_id'] = $form_field->id;
                    $fieldData['user_id'] = $user_id;
                    $fieldData['value'] = "";
                    $fieldData['folder_status'] = 2;                
                    $fieldData['status'] = 1;                
                    if(!empty($existdata_data['id'])){
                        $fieldData['updated_at'] = time();
                        $result = Yii::$app->db->createCommand()
                        ->update('client_data', $fieldData,['id' => $existdata_data['id']])
                        ->execute();
                    }else{
                        $fieldData['created_at'] = time();
                        $fieldData['updated_at'] = time();
                        $result = Yii::$app->db->createCommand()
                        ->insert('client_data',$fieldData)
                        ->execute();
                    }
                }
            }
            $formData = (new \yii\db\Query())
                ->select(['*'])
                ->from('client_data')
                ->where(['user_id'=>$user_id,'form_id'=>$postData['form_id']])
                ->All(); 
            //print_r($formData);die; 
            $formDataStatusArr = $formfolderDataStatusArr = [];     
            foreach($formData as $f_value){
                $formDataArr[$f_value['form_id']][$f_value['field_id']] = $f_value['value'];
                $formDataStatusArr[$f_value['form_id']][$f_value['field_id']] = $f_value['status'];
                $formfolderDataStatusArr[$f_value['form_id']][$f_value['field_id']] = $f_value['folder_status'];
            }
            //print_r($formData);die;                 

            $renderArrat = ['form_value'=>$form, 'form_field_arr'=>$form_field_arr,'formData'=>$formDataArr,'formDataStatusArr'=>$formDataStatusArr,'formfolderDataStatusArr'=>$formfolderDataStatusArr];
            $forms = $this->renderPartial("_ajax_form", $renderArrat);
            $folder_status = $this->renderPartial("_ajax_folder_status", ['formData'=>$formData, 'form_value'=>$form]);

            return Json::encode(['forms'=>$forms,'folder_status'=>$folder_status]);
            

        }
    }
    

    public function actionAjaxClientData()
    {
        $user_id = Yii::$app->user->id;
        $request = \Yii::$app->request;
        $return  = 0;
        if ($request->isPost) {
            $postData = $request->post();
            if(!empty($_FILES["clientData"]['name'])) {
                //print_r($_FILES);die;
                foreach($_FILES["clientData"]['name'] as $f_key =>  $file_name_arr){
                    foreach($file_name_arr as $fild_key => $file_name){
                        $move_path = $_FILES["clientData"]['tmp_name'][$f_key][$fild_key];
                        if(!empty($move_path)){
                            $file_path = Yii::$app->params['client_attatch_path'];
                            if (!file_exists($file_path)) {
                                mkdir($file_path, 0777, true);
                            }
                            $full_path = $file_path.$file_name;
                            move_uploaded_file($move_path,$full_path); 
                            $fieldData['form_id'] = $f_key;
                            $fieldData['field_id'] = $fild_key;
                            $fieldData['user_id'] = $postData['user_id'];
                            $fieldData['value'] = $file_name;
                            $existdata = (new \yii\db\Query())
                            ->select(['id','folder_status','status'])
                            ->from('client_data')
                            ->where(['field_id'=>$fieldData['field_id'], 'user_id'=>$fieldData['user_id']])
                            ->One();

                            if(!empty($existdata)){
                                $fieldData['updated_at'] = time();
                                if ($existdata['status'] < 3 && !empty($fieldData['value'])) {
                                    $fieldData['status'] = 3;
                                }
                                $result = Yii::$app->db->createCommand()
                                ->update('client_data', $fieldData,['id' => $existdata['id']])
                                ->execute();
                                $return = 1;
                            }else{
                                $fieldData['created_at'] = time();
                                $fieldData['updated_at'] = time();
                                $result = Yii::$app->db->createCommand()
                                ->insert('client_data',$fieldData)
                                ->execute();
                                $return = 1;
                            }
                        }
                    }
                    $form_all_data = (new \yii\db\Query())
                            ->select(['id','folder_status','status'])
                            ->from('client_data')
                            ->where(['form_id'=>$f_key, 'user_id'=>$user_id])
                            ->all();
                    $review_flag = 0;        
                    foreach($form_all_data as $f_data){
                        if($f_data['status'] < 3){
                            $review_flag = 1;                            
                        }
                    }
                    if($review_flag != 1){
                        foreach($form_all_data as $fdata){
                            $f_status_data['updated_at'] = time();
                            if ($fdata['folder_status'] < 3) {
                                    $f_status_data['folder_status'] = 3;
                                }
                            $resultn1 = Yii::$app->db->createCommand()
                                ->update('client_data', $f_status_data,['id' => $fdata['id']])
                                ->execute();
                        }
                    }        

                }                      
            }
            //print_r($postData);die; 
            if(!empty($postData['clientData'])){
                foreach($postData['clientData'] as $form_id => $formData){              
                    if(!empty($formData)){
                        foreach($formData as $field_id =>$field_value){
                            $fieldData['form_id'] = $form_id;
                            $fieldData['field_id'] = $field_id;
                            $fieldData['user_id'] = $postData['user_id'];
                            if(is_array($field_value)){
                                $fieldData['value'] = ($field_value)?json_encode($field_value):[];
                            }else{
                                $fieldData['value'] = ($field_value)?$field_value:'';
                            }  
                            $existdata = (new \yii\db\Query())
                            ->select(['id','folder_status','status'])
                            ->from('client_data')
                            ->where(['field_id'=>$fieldData['field_id'], 'user_id'=>$fieldData['user_id']])
                            ->One();
                            if(!empty($existdata)){
                                $fieldData['updated_at'] = time();
                                if($existdata['status'] < 3 && !empty($fieldData['value'])) {
                                    $fieldData['status'] = 3;
                                }
                                $result = Yii::$app->db->createCommand()
                                ->update('client_data', $fieldData,['id' => $existdata['id']])
                                ->execute();
                                $return = 1;
                            }else{
                                $fieldData['created_at'] = time();
                                $fieldData['updated_at'] = time();
                                $result = Yii::$app->db->createCommand()
                                ->insert('client_data',$fieldData)
                                ->execute();
                                $return = 1;
                            }
                        }
                    }

                    $form_all_data2 = (new \yii\db\Query())
                        ->select(['id','folder_status','status'])
                        ->from('client_data')
                        ->where(['form_id'=>$form_id, 'user_id'=>$user_id])
                        ->all();
                    $review_flag2 = 0;        
                    foreach($form_all_data2 as $f_data2){
                        if($f_data2['status'] < 3){
                            $review_flag2 = 1;                            
                        }
                    }
                    if($review_flag2 != 1){
                        foreach($form_all_data2 as $fdata2){
                            $f_status_data2['updated_at'] = time();
                            if ($fdata2['folder_status'] < 3) {
                                    $f_status_data2['folder_status'] = 3;
                                }
                            $resultn2 = Yii::$app->db->createCommand()
                                ->update('client_data', $f_status_data2,['id' => $fdata2['id']])
                                ->execute();
                        }
                    }
                }
            }
        }
        echo $return;
                
    }
    
}
