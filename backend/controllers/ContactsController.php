<?php
namespace backend\controllers;

use common\models\Contacts;
use common\models\ContactList;
use common\models\ContactsSearch;
use common\models\Contactuser;
use common\models\Settings;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use MongoDB;




/**
 * Application timeline controller
 */
class ContactsController extends Controller
{


public function behaviors()
        {       

         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add','import','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listContact'],
                    ],
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['addContact'],
                    ],
                    [
                        'actions' => ['import'],
                        'allow' => true,
                        'roles' => ['importContact'],
                    ],                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateContact'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteContact'],
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


    public $layout = 'common';
    //const FUB_API_KEY = '5ffaaae03547b708da22312027ea889bac8ade';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */
    


    public function actionImport()
    {
        $model = new Contacts(); 
        //print_r(Yii::$app->request->post());die;
        if (Yii::$app->request->post()) {
            ini_set('memory_limit', '-1');
            set_time_limit('-1');
            $post_data = Yii::$app->request->post();
            if($post_data['import'] == 'mongo'){
                $this->ImportMongo();
            }else{
            //set_time_limit(-1); // 
                $settingmodel = new Settings();
                $settings = $settingmodel->getsetting();
                $limit = $post_data['limit'];
                $offset = $post_data['offset'];
                if(!empty($limit) && $limit <= 100){
                    if(!empty($settings['followupboss_api_key']['value']) && !empty($settings['followupboss_x_system']['value'])  && !empty($settings['followupboss_x_system_key']['value'])){
                        $headers = array(
                        'Authorization: Basic '. base64_encode($settings['followupboss_api_key']['value'] . ":"),
                        "Content-Type: application/x-www-form-urlencoded; charset=utf-8",
                        "X-System: ".$settings['followupboss_x_system']['value'],
                        "X-System-Key: ".$settings['followupboss_x_system_key']['value'],
                        );
                        $ch = curl_init('https://api.followupboss.com/v1/people?sort=created&limit='.$limit.'&offset='.$offset.'&includeTrash=false');
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                        $response = curl_exec($ch);
                        if ($response === false) {
                        exit('cURL error: ' . curl_error($ch) . "\n");
                        }
                        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        $response = json_decode($response);
                        if (!empty($response->people)) {                    
                            $saveData = [];
                            foreach($response->people as $key => $data){
                                $saveData = [];
                                $saveData['followupboss_id'] = $data->id;
                                $saveData['first_name'] = utf8_encode($data->firstName);
                                $saveData['last_name'] = utf8_encode($data->lastName);
                                foreach($data->emails as $email_value){
                                    if($email_value->isPrimary == 1){
                                        $saveData['email'] = $email_value->value;
                                    }
                                }                        
                                foreach($data->phones as $phones_value){
                                    if($phones_value->isPrimary == 1){
                                        $saveData['phone'] = $phones_value->value;
                                    }
                                }
                                $saveData['status'] = 1;
                                $saveData['created_date'] = strtotime($data->created);
                                $saveData['updated_date'] = strtotime($data->updated);
                                if(!empty($saveData['email'])){
                                    $existdata_id = (new \yii\db\Query())
                                        ->select(['id'])
                                        ->from('contacts')
                                        ->where(['email'=>$saveData['email']])
                                        ->Scalar();
                                }elseif(!empty($saveData['phone'])){
                                    $existdata_id = (new \yii\db\Query())
                                        ->select(['id'])
                                        ->from('contacts')
                                        ->where(['phone'=>$saveData['phone']])
                                        ->Scalar();
                                }else{
                                    $existdata_id = (new \yii\db\Query())
                                        ->select(['id'])
                                        ->from('contacts')
                                        ->where(['followupboss_id'=>$saveData['followupboss_id']])
                                        ->Scalar();
                                }
                                if(!empty($existdata_id)){
                                    Yii::$app->db->createCommand()
                                     ->update('contacts', $saveData,['id' => $existdata_id])
                                     ->execute();
                                }else{
                                    Yii::$app->db->createCommand()
                                        ->insert('contacts',$saveData)
                                        ->execute();   
                                }    
                            }
                            $from = $offset;
                            $to = $offset+$limit;
                            Yii::$app->session->setFlash('success', $from." to ".$to." contacts have been imported successfully.");
                        }else{
                            Yii::$app->session->setFlash('error', "You have some error.");
                        }
                    }else{
                        Yii::$app->session->setFlash('error', "Please set follow up boss api key, X-System, X-System-Key from settings.");
                    }
                }
            }
        }  
                 
        return $this->render('import', [
            'model'=>$model,
        ]);
    }

    public function ImportMongo()
    {
        ini_set('memory_limit', '-1');
        set_time_limit('-1');
        $settingmodel = new Settings();
        $settings = $settingmodel->getsetting();        
        $server = $settings['mongodb_URI_connection_url']['value']; 
        try{
            // Connecting to server
            $c = new MongoDB\Client( $server );
        }catch(MongoConnectionException $connectionException){
            print $connectionException;
            exit;
        }
        try{
            $db = $c->fub_webhooks;
            $collection = $db->people;
            $pepoles = $collection->find();
            $count = 1;
            $dataarrr = [];
            $count = 0;
            foreach($pepoles as $data){ 
                //print_r($data);
                $count++;
                if($count == 1000){
                    exit();
                }
                $saveData = [];
                $saveData['name'] = utf8_encode($data->name);
                $saveData['first_name'] = utf8_encode($data->firstName);
                $saveData['last_name'] = utf8_encode($data->lastName);
                $saveData['stage'] = $data->stage;
                $saveData['source'] = $data->source;
                $saveData['sourceUrl'] = $data->sourceUrl;
                $saveData['contacted'] = $data->contacted;
                $saveData['price'] = $data->price;
                $saveData['assignedTo'] = $data->assignedTo;
                $saveData['claimed'] = $data->claimed;
                $saveData['createdVia'] = $data->createdVia;
                $saveData['lastActivity'] = strtotime($data->lastActivity);
                $tag = '';
                if(!empty($data->tags)){
                    foreach($data->tags as $tags){
                        $tag .= $tags.', ';                                          
                    }
                }
                $saveData['tags'] = rtrim($tag,', '); 
                foreach($data->emails as $email_value){
                    if($email_value->isPrimary == 1){
                        $saveData['email'] = $email_value->value;
                    }
                }                        
                foreach($data->phones as $phones_value){
                    if($phones_value->isPrimary == 1){
                        $saveData['phone'] = $phones_value->value;
                    }
                }
                $saveData['gender'] = !empty($data->socialData->gender)?$data->socialData->gender:'';
                $saveData['age'] = !empty($data->socialData->age)?$data->socialData->age:'';
                $saveData['location'] = !empty($data->socialData->location)?$data->socialData->location:'';
                $saveData['company'] = !empty($data->socialData->company)?$data->socialData->company:'';
                $saveData['title'] = !empty($data->socialData->title)?$data->socialData->title:'';
                $saveData['bio'] = !empty($data->socialData->bio)?utf8_encode($data->socialData->bio):'';
                $saveData['topics'] = !empty($data->socialData->topics)?$data->socialData->topics:'';
                $saveData['facebook'] = !empty($data->socialData->facebook)?$data->socialData->facebook:'';
                $saveData['twitter'] = !empty($data->socialData->twitter)?$data->socialData->twitter:'';
                $saveData['googleProfile'] = !empty($data->socialData->googleProfile)?$data->socialData->googleProfile:'';
                $saveData['googlePlus'] = !empty($data->socialData->googlePlus)?$data->socialData->googlePlus:'';
                $saveData['linkedIn'] = !empty($data->socialData->linkedIn)?$data->socialData->linkedIn:'';                
                $saveData['address_type'] = !empty($data->addresses[0]->address_type)?$data->addresses[0]->address_type:'';                
                $saveData['street'] = !empty($data->addresses[0]->street)?$data->addresses[0]->street:'';                
                $saveData['city'] = !empty($data->addresses[0]->city)?$data->addresses[0]->city:'';                
                $saveData['state'] = !empty($data->addresses[0]->state)?$data->addresses[0]->state:'';                
                $saveData['zip'] = !empty($data->addresses[0]->code)?$data->addresses[0]->code:'';                
                $saveData['country'] = !empty($data->addresses[0]->country)?$data->addresses[0]->country:'';                
                $saveData['status'] = 1;
                $saveData['created_date'] = strtotime($data->created);
                $saveData['updated_date'] = strtotime($data->updated);
                //$collaboratorsData['name'] = $data->collaborators;
                $existdata_id = '';
                if(!empty($saveData['email'])){
                    $existdata_id = (new \yii\db\Query())
                        ->select(['id'])
                        ->from('contacts')
                        ->where(['email'=>$saveData['email']])
                        ->Scalar();
                }elseif(!empty($saveData['phone'])){
                    $existdata_id = (new \yii\db\Query())
                        ->select(['id'])
                        ->from('contacts')
                        ->where(['phone'=>$saveData['phone']])
                        ->Scalar();
                }
                if(!empty($existdata_id)){
                    Yii::$app->db->createCommand()
                     ->update('contacts', $saveData,['id' => $existdata_id])
                     ->execute();
                }else{
                    Yii::$app->db->createCommand()
                        ->insert('contacts',$saveData)
                        ->execute();   
                } 
            }
            Yii::$app->session->setFlash('success', $from." to ".$to." contacts have been imported successfully.");

             
     
        }catch(MongoException $mongoException){
            print $mongoException;
            exit;
        }

    }

    public function actionAdd()
    {
        $model = new Contacts();
        if (Yii::$app->request->post()) {
            $contactData =Yii::$app->request->post();
            if($model->load(Yii::$app->request->post())){
                $model->list = ($_POST['Contacts']['list'])?implode(",",$_POST['Contacts']['list']):""; 
                if(!empty($_POST['Contacts']['first_name']) && !empty($_POST['Contacts']['last_name'])){
                    $model->name = $_POST['Contacts']['first_name'].' '.$_POST['Contacts']['last_name'];
                }else{
                    $model->name = $_POST['Contacts']['first_name'];
                }    
                $model->save(false);
                return $this->redirect(['index']);
            }     
        } 
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }  

        $contactList = ArrayHelper::map(ContactList::find()->all(), 'id', 'list_name');
        return $this->render('add', [
            'model'=>$model,
            'agent_array'=>$agent_arr,
            'contactList'=>$contactList,
            'id'=>0
        ]);
    }
    


    public function actionUpdate($id,$ismongo)
    {
        $model = new Contacts();
        if($ismongo == 1){
            $model= $this->findModelMongo($id);
            $view = 'mongo_update';
        }else{
            $model= $this->findModel($id);
            $view = 'add';
        } 
        //print_r($model->list);die;
        $model->list = ($model->list)?explode(',', $model->list):[];
        if ($model->load(Yii::$app->request->post())) {
            //print_r($model);die;
            $model->list = ($_POST['Contacts']['list'])?implode(",",$_POST['Contacts']['list']):"";
            if($ismongo != 1){
                if(!empty($_POST['Contacts']['first_name']) && !empty($_POST['Contacts']['last_name'])){
                    $model->name = $_POST['Contacts']['first_name'].' '.$_POST['Contacts']['last_name'];
                }else{
                    $model->name = $_POST['Contacts']['first_name'];
                }
            }
            $model->save(false);
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Property saved successfull.");
        }  
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        $contactList = ArrayHelper::map(ContactList::find()->all(), 'id', 'list_name');          
        return $this->render($view, [
            'model'=>$model,
            'agent_array'=>$agent_arr,
            'contactList'=>$contactList,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        //echo $id;die;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionIndex_old()
    {
        $searchModel = new ContactsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionIndex()
    {
        $searchModel = new ContactsSearch();
        $model = new Contacts();
        $getData = [];
        if(!empty(Yii::$app->request->queryParams)){
            $getData = Yii::$app->request->queryParams;
        }        
        ini_set('memory_limit', '-1');
        set_time_limit('-1');
        $default_list_id = (new \yii\db\Query())
                    ->select(['id'])
                    ->from('contact_list')
                    ->where(['list_key'=>'default_list'])
                    ->Scalar();
        $settingmodel = new Settings();
        $settings = $settingmodel->getsetting();        
        $server = $settings['mongodb_URI_connection_url']['value']; 
            // Connecting to server
        $c = new MongoDB\Client( $server );
        $db = $c->fub_webhooks;
        $collection = $db->people;
        $filter = $a = $where = [];
        if(!empty($getData['Contacts']['name'])){ 
            $a['$and'][] = ['$or'=>[['firstName'=>['$regex'=>$getData['Contacts']['name']]],['lastName'=>['$regex'=>$getData['Contacts']['name']]],['name'=>['$regex'=>$getData['Contacts']['name']]]]];           
            //$filter = ['$and'=>[$a = ['name'=>$getData['Contacts']['name']]]];
            //$where['name'] = $getData['Contacts']['name'];
            $model->name = $getData['Contacts']['name'];       
        }
        if(!empty($getData['Contacts']['email'])){                
            $a['$and'][] = ['emails.value'=>['$regex'=>$getData['Contacts']['email']]];
            //$filter = ['$and'=>[$a = ['emails.value'=>$getData['Contacts']['email']]]]; 
            $where['email'] = $getData['Contacts']['email'];
            $model->email = $getData['Contacts']['email']; 

        }
        if(!empty($getData['Contacts']['phone'])){            
            $a['$and'][] = ['phones.value'=>['$regex'=>$getData['Contacts']['phone']]]; 
            //$filter = ['$and'=>[$a = ['phones.value'=>$getData['Contacts']['phone']]]];
            $where['phone'] = $getData['Contacts']['phone'];
            $model->phone = $getData['Contacts']['phone'];                 
        }
        $where['status'] = 1;
        //print_r($where);die;
        /*if(!empty($a)){
            $filter = [
                '$and'=>[$a]
            ];
        } 
        print_r($filter);die; */    
        $pepoles = $collection->find($a, ['projection' =>['_id'=>TRUE,'firstName' => TRUE,'lastName' => TRUE,'emails'=>TRUE,'phones'=>TRUE]])->toArray();
        $count = 1;
        $viewData = [];
        $contactsData = [];
        $count = 0;
        foreach($pepoles as $data){ 
            /*if($count == 100){
                exit();
            } */               
            $viewData['id'] = $data->_id;
            $viewData['mongo_status'] = 1;
            $viewData['name'] = utf8_encode($data->firstName).' '.utf8_encode($data->lastName); 
            foreach($data->emails as $email_value){
                if($email_value->isPrimary == 1){
                    $viewData['email'] = $email_value->value;
                }
            }                        
            foreach($data->phones as $phones_value){
                if($phones_value->isPrimary == 1){
                    $viewData['phone'] = $phones_value->value;
                }
            }
            $existdata_id = '';
            if(!empty($viewData['id'])){
                $existdata_id = (new \yii\db\Query())
                    ->select(['id'])
                    ->from('contacts')
                    ->where(['mongo_contact_id'=>$viewData['id']])
                    ->Scalar();
            }
            if(empty($existdata_id)){
                $saveData['mongo_contact_id'] = $viewData['id'];
                $saveData['list'] = $default_list_id;
                $saveData['status'] = 1;
                Yii::$app->db->createCommand()
                    ->insert('contacts',$saveData)
                    ->execute();  
            }
            $contactsData[] = $viewData;
        }
        $mysql_data = (new \yii\db\Query())
                    ->select(['id','concat(first_name, SPACE(1), last_name) as name','email','phone'])
                    ->from('contacts')
                    ->where($where);
                    if(!empty($getData['Contacts']['name'])){
                        $mysql_data = $mysql_data->andWhere(['or',['like', 'first_name', $getData['Contacts']['name']],['like', 'last_name', $getData['Contacts']['name']]]);
                    }
                    $mysql_data = $mysql_data->andWhere(['is', 'mongo_contact_id', new \yii\db\Expression('null')])
                    ->All();
        //print_r($mysql_data);die;            
        $result = array_merge($mysql_data, $contactsData);           
        $provider = new ArrayDataProvider([
            'allModels' => $result,
            'key' => 'id',
            'sort' => ['attributes'=>['name','email','phone']], // HERE is your $sort
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $provider,
        ]);
    }



    public function actionView($id)
    {
        $model = new Contacts();
        if(empty($id)){
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }else{
            ini_set('memory_limit', '-1');
            set_time_limit('-1');
            $settingmodel = new Settings();
            $settings = $settingmodel->getsetting();        
            $server = $settings['mongodb_URI_connection_url']['value']; 
            // Connecting to server
            $c = new MongoDB\Client( $server );
            $db = $c->fub_webhooks;
            $collection = $db->people;
           // $pepoles = $collection->findone(['_id'=>$id],[]);
            $data = $c->fub_webhooks->people->findOne(array('_id'=>(int)$id),array());
            //print_r($data);die;               
            $viewData['id'] = $data->_id;
            $viewData['name'] = utf8_encode($data->name);
            $viewData['first_name'] = utf8_encode($data->firstName);
            $viewData['last_name'] = utf8_encode($data->lastName);
            $viewData['stage'] = $data->stage;
            $viewData['source'] = $data->source;
            $viewData['sourceUrl'] = $data->sourceUrl;
            $viewData['contacted'] = $data->contacted;
            $viewData['price'] = $data->price;
            $viewData['assignedTo'] = $data->assignedTo;
            $viewData['claimed'] = $data->claimed;
            $viewData['createdVia'] = $data->createdVia;
            $viewData['lastActivity'] = strtotime($data->lastActivity);
            $tag = '';
            if(!empty($data->tags)){
                foreach($data->tags as $tags){
                    $tag .= $tags.', ';                                          
                }
            }
            $viewData['tags'] = rtrim($tag,', '); 
            foreach($data->emails as $email_value){
                if($email_value->isPrimary == 1){
                    $viewData['email'] = $email_value->value;
                }
            }                        
            foreach($data->phones as $phones_value){
                if($phones_value->isPrimary == 1){
                    $viewData['phone'] = $phones_value->value;
                }
            }
            $viewData['gender'] = !empty($data->socialData->gender)?$data->socialData->gender:'';
            $viewData['age'] = !empty($data->socialData->age)?$data->socialData->age:'';
            $viewData['location'] = !empty($data->socialData->location)?$data->socialData->location:'';
            $viewData['company'] = !empty($data->socialData->company)?$data->socialData->company:'';
            $viewData['title'] = !empty($data->socialData->title)?$data->socialData->title:'';
            $viewData['bio'] = !empty($data->socialData->bio)?utf8_encode($data->socialData->bio):'';
            $viewData['topics'] = !empty($data->socialData->topics)?$data->socialData->topics:'';
            $viewData['facebook'] = !empty($data->socialData->facebook)?$data->socialData->facebook:'';
            $viewData['twitter'] = !empty($data->socialData->twitter)?$data->socialData->twitter:'';
            $viewData['googleProfile'] = !empty($data->socialData->googleProfile)?$data->socialData->googleProfile:'';
            $viewData['googlePlus'] = !empty($data->socialData->googlePlus)?$data->socialData->googlePlus:'';
            $viewData['linkedIn'] = !empty($data->socialData->linkedIn)?$data->socialData->linkedIn:'';                
            $viewData['address_type'] = !empty($data->addresses[0]->address_type)?$data->addresses[0]->address_type:'';                
            $viewData['street'] = !empty($data->addresses[0]->street)?$data->addresses[0]->street:'';                
            $viewData['city'] = !empty($data->addresses[0]->city)?$data->addresses[0]->city:'';                
            $viewData['state'] = !empty($data->addresses[0]->state)?$data->addresses[0]->state:'';                
            $viewData['zip'] = !empty($data->addresses[0]->code)?$data->addresses[0]->code:'';                
            $viewData['country'] = !empty($data->addresses[0]->country)?$data->addresses[0]->country:'';                
            $viewData['status'] = 1;
            $viewData['created_date'] = strtotime($data->created);
            $viewData['updated_date'] = strtotime($data->updated);
            //print_r($viewData);die;
            
        }

        return $this->render('view', [
            'viewData' => $viewData,
            'model' => $model,
        ]);
    }

 

    protected function findModel($id)
    {
        if (($model = Contacts::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelMongo($id)
    {
        if (($model = Contacts::findOne(['mongo_contact_id'=>$id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }     
}
