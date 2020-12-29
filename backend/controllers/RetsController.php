<?php

namespace backend\controllers;

use backend\models\Rets;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;

/**
 * Application timeline controller
 */
class RetsController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

    public function actionAdd()
    {
        $model = new Rets();
        //$model->scenario = "add";            
        if ($model->load(Yii::$app->request->post())) {
            $retsData =Yii::$app->request->post();      
             
            $model->save();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>0
        ]);
    }
    


    public function actionUpdate($id)
    {
        $model = new Rets();
        $model->attributes = $model->getDataById($id); 
        if ($model->load(Yii::$app->request->post())) {
            $model->update();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Property saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Rets();        
        if(!empty($id)){
            $model->deleteById($id);           
            return $this->redirect(['index']);            
        }
    }

    public function actionIndex()
    {
        $model = new Rets();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('rets_property')
        //->where(['status' => 1])
        ->all();
        //print_r($rows);die;
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['address_with_unit','city','state','zip','property_type'],
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
