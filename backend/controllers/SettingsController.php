<?php
namespace backend\controllers;
use common\models\Settings;
use common\models\SettingSearch;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;

/**
 * Settings controller
 */
class SettingsController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all setting models.
     * @return mixed
     */
    

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }
    public function actionAdd()
    {
        $model = new Settings();
        $inputArray = ['text' =>'Text Input','checkbox'=>'Checkbox Input','textarea'=>'Textarea Input'];
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
        }  
                 
        return $this->render('add', [
            'model'=>$model,
            'inputArray'=>$inputArray,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = new Settings();
        $inputArray = ['text' =>'Text Input','checkbox'=>'Checkbox Input','textarea'=>'Textarea Input'];
        $model= $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
        }  
                 
        return $this->render('add', [
            'model'=>$model,
            'inputArray'=>$inputArray,
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        //echo $id;die;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Settings::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

       
}
