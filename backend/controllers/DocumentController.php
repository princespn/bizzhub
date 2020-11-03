<?php

namespace backend\controllers;

use backend\models\Document;
use backend\models\DocumentCategory;
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
class DocumentController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

    public function actionAdd()
    {
        $model = new Document();
        $category = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['status' => 1])
                    ->All();
        $cat_list=[];            
        foreach($category as $cat){
            $cat_list[$cat['id']]=$cat['title'];
        }            
        if ($model->load(Yii::$app->request->post())) {
            $model->file_path = UploadedFile::getInstance($model,'file_path');
            $storage = \Yii::getAlias('@storage');
            $model->file_path->saveAs($storage.'/document/' . $model->file_path->baseName . '.' . $model->file_path->extension);
            print_r($model->file_path);die;
            //print_r($model->file_path);die;
            $model->attributes = Yii::$app->request->post();
            print_r($model->attributes);die;
            $rows = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document')
                    ->where(['name' => $model->attributes['name']])
                    ->One();            
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This document is already use.");
            }else{    
                $model->save();
                return $this->redirect(['index']);
                Yii::$app->session->setFlash('success', "Document saved successfull.");
            }
        }           
        return $this->render('add', [
            'model'=>$model,
            'category'=>$cat_list,
        ]);
    }


    public function actionIndex()
    {
        $model = new Document();
        $category = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['status' => 1])
                    ->All();
        return $this->render('index', [
            'model'=>$model,
            'category'=>$category,
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
