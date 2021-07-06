<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\Contacts;
use common\models\Settings;
use common\models\EmailTemplate;
use common\models\ContactList;
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
use yii\helpers\Json;
use MongoDB;
use yii\data\Pagination;
use yii\helpers\Url;

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
                        'actions' => ['index','add','edit','delete','ajax-contacts-display','send-email','add-list','delete-contacts'],
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
        
        $model = new Contacts();
        $agent = $model->getuserByRole('agent');
        foreach($agent as $a_id){
            $agent_id_arr[$a_id['id']]=strtolower($a_id['username']);
        }
        $postData = Yii::$app->request->post();
        $getData = Yii::$app->request->get();        
        if(!empty($postData)){
            $model->csv_file = UploadedFile::getInstance($model, 'csv_file');
            if ( $model->csv_file ){
                $storage = \Yii::getAlias('@storage');            
                $time = time();
                $model->csv_file->saveAs($storage.'/web/csv/' .$time. '.' . $model->csv_file->extension);
                $model->csv_file = $storage.'/web/csv/' .$time. '.' . $model->csv_file->extension;
                $handle = fopen($model->csv_file, "r");
                $cnt = 0;
                while (($fileop = fgetcsv($handle, 1000, ",")) !== false) 
                {
                    //print_r($fileop);die;
                    $first_name = $last_name = $email = $phone = $list = $agent = "";
                    if ($cnt!=0){
                        $data['name'] = $fileop[0];
                        $data['first_name'] = $fileop[1];
                        $data['last_name'] = $fileop[2];
                        $data['email'] = $fileop[3];
                        $data['phone'] = $fileop[4];
                        $data['gender'] = $fileop[5];
                        $data['age'] = $fileop[6];
                        $data['company'] = $fileop[7];
                        $data['bio'] = utf8_encode($fileop[8]);
                        $data['list'] = $fileop[9];
                        //print_r($data);die;
                        $rows = (new \yii\db\Query())
                        ->select(['id', 'email'])
                        ->from('contact')
                        ->where(['email' => $email])
                        ->One();
                        if (!empty($rows)) {
                                Yii::$app->db->createCommand()
                                    ->update('contacts', $data, ['id' => $rows['id']])
                                    ->execute();
                        }else{
                            Yii::$app->db->createCommand()
                            ->insert('contacts',$data)
                            ->execute(); 
                        }
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
        $limit = 10;
        $user_id = Yii::$app->user->identity->id;
        $query = new Query();
        $contact_list = $query->select("id")
            ->from('contact_list');
            if(!Yii::$app->user->can('admin')){
               $contact_list->andWhere(new \yii\db\Expression('FIND_IN_SET(:user_id,user_id)')); 
               $contact_list->addParams([':user_id' => $user_id]);
            }
        $contact_list = $contact_list->all();

        $query = (new \yii\db\Query())
            ->select(['id', 'concat(first_name, SPACE(1), last_name) as name', 'email', 'phone', 'mongo_contact_id','mail_send_status','deleted_by'])
            ->from('contacts');
            if(!empty($getData) && !empty($getData['q'])){
                $query->andFilterWhere([
                    'or',
                    ['like', 'name', $getData['q']],
                    ['like', 'first_name', $getData['q']],
                    ['like', 'last_name', $getData['q']],
                    ['like', 'email', $getData['q']],
                ]);
            }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => $limit]);
        $contacts = $query->offset($pages->offset)
            ->andwhere(['status'=>1])
            ->limit($pages->limit)
            ->all();
        $mysql_data = []; 
        $mongo_ids = []; 
        $continue_count = 0;       
        foreach($contacts as $contact){
            if (strpos($contact['deleted_by'], (string)$user_id) !== false) {
                $continue_count++;
                continue;   
            }
            if(!empty($contact['mongo_contact_id'])){
                $mongo_ids[] = (int)$contact['mongo_contact_id'];
            }else{
                $contact['mongo_status'] = 0;
                $mysql_data[] = $contact;
            }
        } 
        $settingmodel = new Settings();
        $settings = $settingmodel->getsetting();        
        $server = $settings['mongodb_URI_connection_url']['value']; 
            // Connecting to server
        $c = new MongoDB\Client( $server );
        $db = $c->fub_webhooks;
        $collection = $db->people;
        $filter = $pepoles = [];
        if(!empty($mongo_ids)){
            $filter = ['_id'=>['$in'=>$mongo_ids]];                        
            $pepoles = $collection->find($filter, ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'phones'=>TRUE]])->toArray();
        }
        if(!empty($getData['q'])){
            $filter = $a = $where = [];
            $a['$and'][] = ['$or'=>[['firstName'=>['$regex'=>$getData['q']]],['lastName'=>['$regex'=>$getData['q']]],['name'=>['$regex'=>$getData['q']]],['emails.value'=>['$regex'=>$getData['q']]]]];
            $pepoles = $collection->find($a, ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'picture'=>TRUE]])->toArray(); 
        }
        //print_r($pepoles);die;
        $count = 1;
        $viewData = [];
        $contactsData = [];
        $count = 0;
        if(!empty($pepoles)){
            foreach($pepoles as $data){
                $key = $this->searchForId($data->_id,$contacts); 
                $viewData['mail_send_status'] = $contacts[$key]['mail_send_status'];
                $viewData['id'] = $data->_id;
                $viewData['mongo_status'] = 1;
                $viewData['name'] = utf8_encode($data->firstName).' '.utf8_encode($data->lastName); 
                if(!empty($data->emails)){ 
                    foreach($data->emails as $email_value){
                        if($email_value->isPrimary == 1){
                            $viewData['email'] = $email_value->value;
                        }
                    }
                }
                if(!empty($data->phones)){                        
                    foreach($data->phones as $phones_value){
                        if($phones_value->isPrimary == 1){
                            $viewData['phone'] = $phones_value->value;
                        }
                    }
                }
                $contactsData[] = $viewData;
            }
        }  
        $result = array_merge($mysql_data, $contactsData);

        return $this->render('index',[
                'contactData' => $result,
                'pages' => $pages,
                'models'=>$model,
                'contact_list'=>$contact_list,
                'getData' => $getData,
                'continue_count' => $continue_count
            ]);
    }

    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['mongo_contact_id'] == $id) {
                return $key;
            }
        }
        return null;
     }

    

    /**
     * @return string|Response
     */
    public function actionAdd()
    {
        $user_id = Yii::$app->user->id;
        $model = new Contacts();
        if(!empty(Yii::$app->request->post())){ 
            $post_data = Yii::$app->request->post(); 
            $post_data['Contacts']['list'] = implode(',', $post_data['Contacts']['list']);     
            if ($model->load($post_data) && $model->validate()) {
                $model->attributes= $post_data;
                $rows = (new \yii\db\Query())
                    ->select(['id', 'email', 'list'])
                    ->from('contacts')
                    ->where(['email' => $model->attributes['email']])
                    ->One();
                if(!empty($rows)){
                    $array1 = explode(',', $rows['list']);
                    $array2 = explode(',', $model->attributes['list']);
                    $list_id_arr = array_unique(array_merge($array1,$array2), SORT_REGULAR);
                    $list_id = implode(',', $list_id_arr);
                    //$agentids = $rows['agent_id'];
                    Yii::$app->db->createCommand()
                     ->update('contacts', ['list' => $list_id], ['id' => $rows['id']])
                     ->execute();
                    
                    Yii::$app->session->setFlash('success', "Contact saved successfull.");
                    return $this->redirect(['index']);                    
                }else{    
                    $model->save();                    
                    Yii::$app->session->setFlash('success', "Contact saved successfull.");
                    return $this->redirect(['index']);
                }
            }
        }
        
        $list_array = $model->getcontactList($user_id);
        foreach($list_array as $list_value){
            $list_arr[$list_value['id']]=$list_value['list_name'];
        }
        return $this->render('add', [
            'model' => $model,
            'list_array'=>$list_arr
        ]);
    }


    public function actionAddList()
    {
        $user_id = Yii::$app->user->id;
        $model = new ContactList();
        if(!empty(Yii::$app->request->post())){ 
            $post_data = Yii::$app->request->post(); 
            if ($model->load($post_data) && $model->validate()) {
                $model->user_id = $user_id;
                $model->save();                    
                Yii::$app->session->setFlash('success', "Contact saved successfull.");
                return $this->redirect(['index']);
            }
        }
        return $this->render('add-list', [
            'model' => $model,
        ]);
    }

    public function actionEdit($id)
    {
        $model = new Contacts();
        $user_id = Yii::$app->user->id;
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        $model->attributes = $model->getDataById($id);        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->attributes= Yii::$app->request->post();
                $model->update();
                return $this->redirect(['index']);
            }
        }
        $list_array = $model->getcontactList($user_id);
        foreach($list_array as $list_value){
            $list_arr[$list_value['id']]=$list_value['list_name'];
        }
        //print_r($list_arr);die;
        
        return $this->render('edit', [
            'model' => $model,
            'list_array'=>$list_arr
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Contacts();        
        if(!empty($id)){
            $model->deleteContatsById($id);           
            return $this->redirect(['index']);            
        }
    }

    public function actionSendEmail()
    {
        $http = Yii::$app->params['http'];
        $base_url = Url::base($http);
        $request = \Yii::$app->request;
        $response_array['status'] = "fail";
        if ($request->isPost) {
            $postData = $request->post();
            if(!empty($postData['contact_id'])){
                $settingmodel = new Settings();
                $emailTemplatemodel = new EmailTemplate();
                $settings = $settingmodel->getsetting();
                $template = $emailTemplatemodel->gettemplate('CONTACT_PAGE_EMAIL_TEMPLATE'); 
                $dataArr = [];
                if($postData['mongo_status'] == 1){
                    $server = $settings['mongodb_URI_connection_url']['value']; 
                    $c = new MongoDB\Client( $server );
                    $db = $c->fub_webhooks;
                    $collection = $db->people;     
                    $pepoles = $collection->find(['_id'=>(int)$postData['contact_id']], ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'picture'=>TRUE]])->toArray();
                    $dataArr['name'] = utf8_encode($pepoles[0]->firstName).' '.utf8_encode($pepoles[0]->lastName); 
                    if(!empty($pepoles[0]->emails)){ 
                        foreach($pepoles[0]->emails as $email_value){
                            if($email_value->isPrimary == 1){
                                $dataArr['email'] = $email_value->value;
                            }
                        }
                    }
                    //print_r($dataArr);die;
                }else{
                    $pepoles = (new \yii\db\Query())
                        ->select(['id','first_name','last_name','email'])
                        ->from('{{contacts}}')
                        ->where(['id' => (int)$postData['contact_id']])
                        ->one();
                    $dataArr['name'] = $pepoles['first_name'].' '.$pepoles['last_name']; 
                    $dataArr['email'] = $pepoles['email'];  
                } 
                $external_url = $settings['Contect_url1']['value'];
                $email = 'dharmraj.objects@gmail.com';
                $subject = $template['subject'];
                $body = $template['header'].'<br>'.$template['content'].'<br><a href="'.$external_url.'">link</a><br><br>'.$template['footer'];
                $success=Yii::$app->mailer->compose()
                ->setFrom('developers.wdp@gmail.com')
                ->setTo($email)
                ->setSubject($subject)
                //->setTextBody('This is document send mail')
                ->setHtmlBody($body)
                ->send();
                if(!empty($success)){
                    if($postData['mongo_status'] == 1){
                        $response_array['status'] = "success";
                        Yii::$app->db->createCommand()
                                ->update('{{contacts}}', ['mail_send_status' => 1],['mongo_contact_id' => (int)$postData['contact_id']])
                                ->execute();
                    }else{
                        Yii::$app->db->createCommand()
                                ->update('{{contacts}}', ['mail_send_status' => 1],['id' => (int)$postData['contact_id']])
                                ->execute();
                    }
                }else{
                    $response_array['status'] = "fail";
                }

            }
        }
        echo json_encode($response_array);
    }

    public function actionDeleteContacts()
    {
        $status = 0;
        $model = new Contacts(); 
        $http = Yii::$app->params['http'];
        $base_url = Url::base($http);
        $request = \Yii::$app->request;
        $response_array['status'] = "fail";     
        if ($request->isPost) {
            $postData = $request->post();
            //print_r($postData['selected']);die;
            foreach($postData['selected'] as $contact_id){
                $getContactData = explode('_', $contact_id);
                //print_r($getContactData);die;
                if($getContactData[1] == 1){
                    $contact = (new \yii\db\Query())
                    ->select(['id','mongo_contact_id'])
                    ->from('{{contacts}}')
                    ->where(['mongo_contact_id' => (int)$getContactData[0]])
                    ->one();
                }else{
                    $contact = (new \yii\db\Query())
                    ->select(['id','mongo_contact_id'])
                    ->from('{{contacts}}')
                    ->where(['id' => (int)$getContactData[0]])
                    ->one();
                }
                //print_r($contact);die;
                //print_r($contact);die;
                if(!empty($contact['mongo_contact_id'])){
                    $status = $model->deletemongoContatsById($contact['id']);
                }else{
                    $status = $model->deleteContatsById($contact['id']);
                } 
            }         
        }
        if($status == 1){
            $response_array['status'] = "success";
        }else{
            $response_array['status'] = "false";
        }
        echo json_encode($response_array);
    }
    
}
