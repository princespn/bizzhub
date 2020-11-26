<?php

namespace backend\controllers;

use backend\models\Buildings;
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
class BuildingsController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

    public function actionAdd()
    {
        $model = new Buildings();
        //$model->scenario = "add";            
        if ($model->load(Yii::$app->request->post())) {
            // $model->file_path = UploadedFile::getInstance($model,'file_path');
            // $storage = \Yii::getAlias('@storage');
            // $f_path = '/web/document/'.$model->file_path->baseName . '.' . $model->file_path->extension;
            // $model->file_path->saveAs($storage.$f_path);
            // if(empty($model->doc_name)){
            //     $model->doc_name = $model->file_path->baseName;              
            // }
            // $model->file_path = $model->file_path->name;
            $attributes = Yii::$app->request->post();  
            /*$rows = (new \yii\db\Query())
                    ->select(['id', 'doc_name'])
                    ->from('document')
                    ->where(['doc_name' => $model->attributes['doc_name']])
                    ->One();
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This document is already added.");
                return $this->redirect(['add']);
            }else{  */  
                //print_r($attributes);die;
                $model->save($attributes);
                return $this->redirect(['index']);
                Yii::$app->session->setFlash('success', "Document saved successfull.");
            //}

            //$model->save();
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
        $model = new Document();
        $model->attributes = $model->getDataById($id);
        //print_r($model->attributes);die;
        $old_file_path = $model->attributes['file_path'];
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
            if(!empty($model->file_path)){
                //die('ddd');                
                $storage = \Yii::getAlias('@storage');
                $f_path = '/web/document/'.$model->file_path->baseName . '.' . $model->file_path->extension;
                $model->file_path->saveAs($storage.$f_path);
                if(empty($model->doc_name)){
                    $model->doc_name = $model->file_path->baseName;              
                }
                $model->file_path = $model->file_path->name;
            }
            if(empty($model->file_path)){
                $model->file_path = $old_file_path;
            }
            $model->attributes = Yii::$app->request->post(); 
            //print_r($model->attributes);die;
            foreach($model->attributes as $key => $data){
                if(!empty($data)){
                    $updateData[$key] = $data;
                }
            }
            $updateData['updated_at']=time();
            //print_r($updateData);die;
            $model->update($updateData);
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'category'=>$cat_list,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Document();        
        if(!empty($id)){
            $model->deleteById($id);           
            return $this->redirect(['index']);            
        }
    }

    public function actionIndex()
    {
        $model = new Buildings();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('buildings')
        ->where(['status' => 1])
        ->all();
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['address','city','state','zip','legal_name','building_nickname','status'],
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
