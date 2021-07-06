<?php

namespace backend\controllers;

use backend\models\Document;
use common\models\DocumentCategory;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\Url;
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


public function behaviors()
        {       
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add','update','delete','category','add-category'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listDocument'],
                    ],
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['createDocument'],
                    ],

                    [
                        'actions' => ['category'],
                        'allow' => true,
                        'roles' => ['listDocumentcategory'],
                    ],

                    [
                        'actions' => ['add-category'],
                        'allow' => true,
                        'roles' => ['createDocumentcategory'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateDocument'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteDocument'],
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
        $model = new Document();
        $model->scenario = "add";
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
            $f_path = '/web/document/'.$model->file_path->baseName . '.' . $model->file_path->extension;
            $model->file_path->saveAs($storage.$f_path);

                $fPath = Yii::$app->params['document_path_image'];
                if(!is_dir($fPath)) {
                    mkdir($fPath, 0777, true);
                }  
                $Imagefilename=$model->file_path->baseName;
                $converted_images = '/web/document/image/'.$model->file_path->baseName;
                $Converted_path_Multi=$storage.$converted_images;
            
                $Converted_path=$storage.$converted_images.'.png';
                if(extension_loaded('imagick')){
                    $imagick = new \Imagick();
                    $imagick->readImage($storage.$f_path);
                    $pages = (int)$imagick->getNumberImages();
                    if ($pages < 3) {
                       $resolution = 600; 
                     } else {
                      $resolution = floor(sqrt(1000000/$pages)); 
                     }
                     $imagick->setResolution($resolution, $resolution);
                    #How to combine a multi-page pdf file into a single long image:
                    // $imagick->resetIterator();
                    // $ima = $imagick->appendImages(true);
                    // $ima->setImageFormat("png");
                    // $ima->writeImages($Converted_path, true);
                    // $model->file_image =$Imagefilename.'.png';

                     # How to combine a multi-page pdf file into a pagewise multi image:
                         foreach($imagick as $i=>$imagick) { 
                      $imagick->writeImage($Converted_path_Multi. " page ". ($i+1) ." of ".  $pages.".png"); 
                        if($i==0){
                        $model->file_image =$Imagefilename. " page ". ($i+1) ." of ".  $pages.".png";
                        }
                       }
                  }

            if(empty($model->doc_name)){
                $model->doc_name = $model->file_path->baseName;              
            }
            $model->file_path = $model->file_path->name;
            $model->attributes = Yii::$app->request->post();  
            $rows = (new \yii\db\Query())
                    ->select(['id', 'doc_name'])
                    ->from('document')
                    ->where(['doc_name' => $model->attributes['doc_name']])
                    ->One();
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This document is already added.");
                return $this->redirect(['add']);
            }else{    
                $model->save();
                return $this->redirect(['index']);
                Yii::$app->session->setFlash('success', "Document saved successfull.");
            }

            $model->save();

            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'category'=>$cat_list,
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
                $storage = \Yii::getAlias('@storage');
                $f_path = '/web/document/'.$model->file_path->baseName . '.' . $model->file_path->extension;
                $model->file_path->saveAs($storage.$f_path);

                $fPath = Yii::$app->params['document_path_image'];
                if(!is_dir($fPath)) {
                    mkdir($fPath, 0777, true);
                }   
                $Imagefilename=$model->file_path->baseName;
                $converted_images = '/web/document/image/'.$model->file_path->baseName;
                $Converted_path_Multi=$storage.$converted_images;
            
                $Converted_path=$storage.$converted_images.'.png';
                if(extension_loaded('imagick')){
                    $imagick = new \Imagick();
                    $imagick->readImage($storage.$f_path);
                    $pages = (int)$imagick->getNumberImages();
                    if ($pages < 3) {
                       $resolution = 600; 
                     } else {
                      $resolution = floor(sqrt(1000000/$pages)); 
                     }
                     $imagick->setResolution($resolution, $resolution);
                    #How to combine a multi-page pdf file into a single long image:
                    // $imagick->resetIterator();
                    // $ima = $imagick->appendImages(true);
                    // $ima->setImageFormat("png");
                    // $ima->writeImages($Converted_path, true);
                    // $model->file_image =$Imagefilename.'.png';

                     # How to combine a multi-page pdf file into a pagewise multi image:
                         foreach($imagick as $i=>$imagick) { 
                      $imagick->writeImage($Converted_path_Multi. " page ". ($i+1) ." of ".  $pages.".png"); 
                        if($i==0){
                        $model->file_image =$Imagefilename. " page ". ($i+1) ." of ".  $pages.".png";

                        }
                       }
                  }

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
        $model = new Document();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('document')
        //->where(['status' => 1])
        ->all();
        $category = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['status' => 1])
                    ->All();
        foreach($category as $c_id){
            $category_id_arr[$c_id['id']]=$c_id['title'];
        } 
        foreach($rows as $key => $data){
            $documentData[$key] = $data;
            $documentData[$key]['category_name'] = $category_id_arr[$data['category']];
        }            
        $cat_list=[];  
        $provider = new ArrayDataProvider([
            'allModels' => $documentData,
            'sort' => [
                'attributes' => ['doc_name','category_name'],
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
                $model->save();
                return $this->redirect(['category']);
                Yii::$app->session->setFlash('success', "Category saved successfull.");
        }
        return $this->render('add_category', [
            'model'=>$model,
        ]);
    }

    public function actionCatUpdate($id)
    {
        $model = new DocumentCategory();
        $model = $this->findCatModel($id);
        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                //$model->attributes= Yii::$app->request->post();
                //print_r($model);die;
                $model->save();
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
            $this->findCatModel($id)->delete();          
            return $this->redirect(['category']);            
        }
    }

    protected function findCatModel($id)
    {
        if (($model = DocumentCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
