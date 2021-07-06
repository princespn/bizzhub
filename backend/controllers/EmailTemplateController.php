<?php

namespace backend\controllers;

use common\models\EmailTemplate;
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
class EmailTemplateController extends Controller
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
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new EmailTemplate();
        //$model->scenario = "create";           
        if (!empty(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Email Template saved successfull.");
        }           
        return $this->render('create', [
            'model'=>$model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Email Template update successfull.");
        }           
        return $this->render('update', [
            'model'=>$model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $model = new EmailTemplate();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('email_template')
        //->where(['status' => 1])
        ->all();
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
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

    

    /**
     * Finds the ContactList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmailTemplate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
