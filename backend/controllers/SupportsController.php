<?php

namespace backend\controllers;

use backend\models\Supports;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * Application timeline controller
 */
class SupportsController extends Controller
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
                'only' => ['index', 'add','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listSupports'],
                    ],
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['createSupports'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateSupports'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteSupports'],
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
    

    public function actionAdd()
    {
        $model = new Supports();           
        if ($model->load(Yii::$app->request->post())) {
            $model->attributes = Yii::$app->request->post();  
            $rows = (new \yii\db\Query())
                    ->select(['id', 'type'])
                    ->from('supports')
                    ->where(['type' => $model->attributes['type']])
                    ->One();
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This is already added.");
                return $this->redirect(['add']);
            }else{    
                $model->save();
                Yii::$app->session->setFlash('success', "Support saved successfull.");
                return $this->redirect(['index']);
            }
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>0
        ]);
    }


    public function actionUpdate($id)
    {
        $model = new Supports();
        $model->attributes = $model->getDataById($id);           
        if ($model->load(Yii::$app->request->post())) {
            $model->attributes = Yii::$app->request->post(); 
            foreach($model->attributes as $key => $data){
                if(!empty($data)){
                    $updateData[$key] = $data;
                }
            }
            $updateData['updated_at']=time();
            $model->update($updateData);            
            Yii::$app->session->setFlash('success', "Record update successfull.");
            return $this->redirect(['index']);
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Supports();        
        if(!empty($id)){
            $model->deleteById($id); 
            Yii::$app->session->setFlash('success', "Record delete successfull.");
            return $this->redirect(['index']);            
        }
    }

    public function actionIndex()
    {
        $model = new Supports();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('supports')
        //->where(['status' => 1])
        ->all(); 
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['type','name'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('index',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }

    public function actionAddCategory()
    {
        $model = new DocumentCategory();
        if ($model->load(Yii::$app->request->post())) {
            $model->attributes = Yii::$app->request->post();
            $rows = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['title' => $model->attributes['title']])
                    ->One();
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This category is already use.");
            }else{    
                $model->save();
                return $this->redirect(['category']);
                Yii::$app->session->setFlash('success', "Category saved successfull.");
            }
        }
        return $this->render('add_category', [
            'model'=>$model,
        ]);
    }

    public function actionCatUpdate($id)
    {
        $model = new DocumentCategory();
        $model->attributes = $model->getDataById($id);
        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->attributes= Yii::$app->request->post();
                //print_r($model);die;
                $model->update();
                return $this->redirect(['category']);
            }
        }
        
        return $this->render('cat_update', [
            'model' => $model,
        ]);
    }

    public function actionCategory()
    {
        $model = new DocumentCategory();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('document_category')
        //->where(['status' => 1])
        ->all();
            
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['title'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('category_list',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }

    public function actionCatDelete($id)
    {
        $model = new DocumentCategory();        
        if(!empty($id)){
            $model->deleteById($id);           
            return $this->redirect(['category']);            
        }
    }
}
