<?php

namespace backend\modules\client\controllers;

use backend\modules\client\models\search\DataCategorySearch;
use common\models\ClientDataCategory;
use common\traits\FormAjaxValidationTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
class CategoryController extends Controller
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
                        'roles' => ['listCategory'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['createCategory'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateCategory'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteCategory'],
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

        $category = new ClientDataCategory();

        $this->performAjaxValidation($category);
        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['index']);
        }
        $searchModel = new DataCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categories = ClientDataCategory::find()->all();
        $templete = ClientDataCategory::find_templete();
        $templete_arr = [];
        foreach($templete as $t_value){
            $templete_arr[$t_value['id']] = $t_value['name'];
        }
        $categories = ArrayHelper::map($categories, 'id', 'name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $category,
            'categories' => $categories,
            'templete_arr' => $templete_arr,
        ]);
    }

    /**
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $category = $this->findModel($id);

        $this->performAjaxValidation($category);

        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['index']);
        }
        $categories = ClientDataCategory::find()->andWhere(['not', ['id' => $id]])->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');
        $templete = ClientDataCategory::find_templete();
        $templete_arr = [];
        foreach($templete as $t_value){
            $templete_arr[$t_value['id']] = $t_value['name'];
        }
        $query = new Query();        
        $rows = $query->select("*")
        ->from('client_data_form')
        ->where(['status' => 1, 'cat_id'=>$id])
        ->orderby('form_order')
        ->all();
        $formdataProvider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['name'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
 
        return $this->render('update', [
            'model' => $category,
            'categories' => $categories,
            'templete_arr' => $templete_arr,
            'formdataProvider' => $formdataProvider
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
        if (($model = ClientDataCategory::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFormOrderUpdate()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post(); 
            $i = 1;
            $dara_arr = explode(',', $data['id']);
            //echo "<pre>";print_r($dara_arr);die;
            foreach ($dara_arr as $item) {
                Yii::$app->db->createCommand()
                 ->update('client_data_form',  ['form_order' => $i], ['id' => $item])
                 ->execute();
                $i++;
            }
            return 1;      
        }else{
            return 0;
        }
    }
}
