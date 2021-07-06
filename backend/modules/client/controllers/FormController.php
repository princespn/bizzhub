<?php

namespace backend\modules\client\controllers;

use backend\modules\client\models\search\DataFormSearch;
use common\models\ClientDataForm;
use common\traits\FormAjaxValidationTrait;
use common\models\ClientForm;
use common\models\ClientTemplate;
use common\models\ClientDataCategory;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\AccessControl;
class FormController extends Controller
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
                        'roles' => ['listForm'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['createForm'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateForm'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteForm'],
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
        $searchModel = new DataFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['form_order' => SORT_ASC],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionCreate()
    {
        $form = new ClientDataForm();
        $formField = new ClientForm();

        $this->performAjaxValidation($form);

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            return $this->redirect(['index']);
        }
        $templets = ClientTemplate::find()->Active()->all();
        $category = ClientDataCategory::find()->Active()->all();
        foreach ($templets as $key => $value) {
            $templete_array[$value->attributes['id']] = $value->attributes['name'];
        }
        foreach ($category as $cat_key => $cat_value) {
            $category_array[$cat_value->attributes['id']] = $cat_value->attributes['name'];
        }

        return $this->render('create', [
            'model' => $form,
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
        $form = $this->findModel($id);
        $formField = new ClientForm();
        $this->performAjaxValidation($form);

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            return $this->redirect(['index']);
        }
        $templete = ClientDataCategory::find_templete();
        $category = ClientDataCategory::find()->Active()->all();
        $templete_array = [];
        foreach($templete as $t_value){
            $templete_array[$t_value['id']] = $t_value['name'];
        }
        foreach ($category as $cat_key => $cat_value) {
            $category_array[$cat_value->attributes['id']] = $cat_value->attributes['name'];
        }
        $query = new Query();        
        $form_fields = $query->select("*")
        ->from('client_form_fields')
        ->where(['form_id'=>$id])
        ->orderby('field_order')
        ->all();
        $fieldsataProvider = new ArrayDataProvider([
            'allModels' => $form_fields,
            'sort' => [
                'attributes' => ['value'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('update', [
            'model' => $form,
            'templete_array' => $templete_array,
            'category_array' => $category_array,
            'formField' => $formField,
            'fieldsataProvider' => $fieldsataProvider,
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

    /**
     * @param integer $id
     *
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientDataForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAddField()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            //print_r($data['ClientForm']['field_options']);die;
            if(!empty($data['ClientForm']['field_options']) && !empty($data['ClientForm']['field_options'][0])){
                $data['ClientForm']['field_options'] = json_encode($data['ClientForm']['field_options']);
            }else{
                $data['ClientForm']['field_options'] = '';
            }
            $data['ClientForm']['fkey'] = str_replace(' ', '_', $data['ClientForm']['value']);   
            $data['ClientForm']['created_at'] = time();   
            $model = new ClientForm(); 
            if($model->load($data)){
                $model->save(); 
                return 1; 
                }else{
                    return 0;
                }     
        }else{
            return 0;
        }
    }

    public function actionEditField()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $formField = $this->findFieldModel($data['field_id']);
            $field_form = $this->renderPartial("_ajax_field_edit", array('formField' => $formField), true);
            return Json::encode($field_form);     
        }
    }

    public function actionUpdateField()
    {
        $form = new ClientForm();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            //print_r($data);die;
            if(!empty($data['ClientForm']['field_options']) && !empty($data['ClientForm']['field_options'][0])){
                $data['ClientForm']['field_options'] = json_encode($data['ClientForm']['field_options']);
            }else{
                $data['ClientForm']['field_options'] = '';
            }
            $form = $this->findFieldModel($data['ClientForm']['id']);
            if ($form->load($data) && $form->save()) {
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function actionFieldDelete($id)
    {
        $data_arr = $this->findFieldModel($id);
        $form_id = $data_arr->attributes['form_id'];
        $data_arr->delete();
        return $this->redirect(['form/update','id'=>$form_id]);
    }

    protected function findFieldModel($id)
    {
        if (($model = ClientForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFormFieldOrderUpdate()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post(); 
            $i = 1;
            $dara_arr = explode(',', $data['id']);
            //echo "<pre>";print_r($dara_arr);die;
            foreach ($dara_arr as $item) {
                Yii::$app->db->createCommand()
                 ->update('client_form_fields',  ['field_order' => $i], ['id' => $item])
                 ->execute();
                $i++;
            }
            return 1;      
        }else{
            return 0;
        }
    }
}
