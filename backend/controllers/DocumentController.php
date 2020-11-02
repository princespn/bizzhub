<?php

namespace backend\controllers;

use backend\models\DocumentCategory;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

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
    public function actionIndex()
    {
        $model = new Document();
        return $this->render('index', [
            'model'=>$model,
        ]);
    }

    public function actionAddCategory()
    {
        $model = new DocumentCategory();
        return $this->render('add_category', [
            'model'=>$model,
        ]);
    }
}
