<?php
namespace backend\modules\client\controllers;
use backend\modules\client\models\search\ClientTemplateSearch;
use backend\modules\client\models\search\DataCategorySearch;
use common\models\ClientTemplate;
use yii\web\Response;
use common\models\ClientDataCategory;
use common\models\ClientForm;
//use common\models\FormCategory;
use common\traits\FormAjaxValidationTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Url;

class TemplateController extends Controller
{
    use FormAjaxValidationTrait;

    /** @inheritdoc */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::class,
    //             'actions' => [
    //                 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }


        public function behaviors()
        {       
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listTemplate'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['createTemplate'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateTemplate'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteTemplate'],
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
    

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientTemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $template = new Clienttemplate();
        $formField = new ClientForm();

        $this->performAjaxValidation($template);

        if ($template->load(Yii::$app->request->post())) {
            $http = Yii::$app->params['http'];
            $client_instruction_url = Yii::$app->params['client_instruction_url'];
            $url = Url::base($http);
            $base_url = $url.'/..'.$client_instruction_url;
            $fPath = Yii::$app->params['client_instruction_path'];
            if(!is_dir($fPath)) {
                mkdir($fPath, 0777, true);
            }  
            $template->videoFile = UploadedFile::getInstance($template,'videoFile');
            
            if(!empty($template->videoFile)){
                $file_name = $template->name.'videoFile'.'.'. $template->videoFile->extension; 
                
                $template->videoFile->saveAs($fPath.$file_name);
                $template->videoFile = $file_name;
                $template->vedio_path = $base_url;
            }
            $template->save();
            return $this->redirect(['index']);
        }
        $templets = ClientTemplate::find()->Active()->all();
        $category = ClientDataCategory::find()->Active()->all();
        //print_r($templets);die;
        foreach ($templets as $key => $value) {
            $templete_array[$value->attributes['id']] = $value->attributes['name'];
        }
        foreach ($category as $cat_key => $cat_value) {
            $category_array[$cat_value->attributes['id']] = $cat_value->attributes['name'];
        }

        return $this->render('create', [
            'model' => $template,
            'formField' => $formField,
            'templete_array' => $templete_array,
            'category_array' => $category_array
        ]);
    }


    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $template = $this->findModel($id);
        $category_model = new ClientDataCategory();

        $this->performAjaxValidation($template); 
        
        if ($template->load(Yii::$app->request->post())) {
            $http = Yii::$app->params['http'];
            $client_instruction_url = Yii::$app->params['client_instruction_url'];
            $url = Url::base($http);
            $base_url = $url.'/..'.$client_instruction_url;
            $fPath = Yii::$app->params['client_instruction_path'];
            if(!is_dir($fPath)) {
                mkdir($fPath, 0777, true);
            }  
            $template->videoFile = UploadedFile::getInstance($template,'videoFile');
            
            if(!empty($template->videoFile)){
                $file_name = $template->name.'videoFile'.'.'. $template->videoFile->extension; 
                
                $template->videoFile->saveAs($fPath.$file_name);
                $template->videoFile = $file_name;
                $template->vedio_path = $base_url;
            }
            $template->save();
            return $this->redirect(['index']);
        }

        $template->created_at = date('Y-m-d H:i:s', $template->created_at);
        $templets = ClientTemplate::find()->Active()->all();
        $category = ClientDataCategory::find()->Active()->all();
        //print_r($category);die;
        foreach ($templets as $key => $value) {
            $templete_array[$value->attributes['id']] = $value->attributes['name'];
        }
        foreach ($category as $cat_key => $cat_value) {
            $category_array[$cat_value->attributes['id']] = $cat_value->attributes['name'];
        }
        //print_r($category_array);die;
        $query = new Query();        
        $rows = $query->select("*")
        ->from('client_data_category')
        ->where(['status' => 1, 'templete_id'=>$id])
        ->orderby('cat_order')
        ->all();
        $catdataProvider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['doc_name','category_name'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $catsearchModel = new DataCategorySearch();
        //$catdataProvider = $catsearchModel->search(Yii::$app->request->queryParams);

        return $this->render('update', [
            'model' => $template,
            'templete_array' => $templete_array,
            'category_array' => $category_array,
            'category' => $category,
            'catsearchModel' => $catsearchModel,
            'catdataProvider' => $catdataProvider,
            'category_model' => $category_model
        ]);
    }

    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionAddField()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();   
           // print_r($data['ClientForm']);die; 
            $model = new ClientForm(); 
            $model->attributes = $data['ClientForm'];
            $model->save(); 
            return 1;      
        }else{
            return 0;
        }
    }


    public function actionCategoryOrderUpdate()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post(); 
            $i = 1;
            $dara_arr = explode(',', $data['id']);
            //echo "<pre>";print_r($dara_arr);die;
            foreach ($dara_arr as $item) {
                Yii::$app->db->createCommand()
                 ->update('client_data_category',  ['cat_order' => $i], ['id' => $item])
                 ->execute();
                $i++;
            }
            return 1;      
        }else{
            return 0;
        }
    }

    /**
     * @param integer $id
     *
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientTemplate::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
