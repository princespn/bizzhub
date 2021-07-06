<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Training;
use yii\web\JsExpression;
use trntv\filekit\widget\Upload;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend', $id != 0 ? 'update' : 'add');
$this->params['breadcrumbs'][] = ['label' => 'Training', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="row">
    <div class="form-group col-md-12"><?php
        echo $form->field($model, 'title'); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12"><?php
        echo $form->field($model, 'description')->widget(
            \yii\imperavi\Widget::class,
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video'],
                'options' => [
                    'minHeight' => 200,
                    'maxHeight' => 200,
                    'buttonSource' => true,
                    'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
                ],
            ]
        ) ;?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <?php echo $form->field($model, 'external_link');?>
    </div>
    <div class="form-group col-md-6">
        <?php echo $form->field($model, 'item_order')->textInput(['type' => 'number']);?>
    </div>
</div>

<div class="form-group col-md-4">
    <?php echo $form->field($model, 'image')->widget(
        Upload::class,
        [
            'url' => ['/file/storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB,
            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
        ]
    ) ?>
</div>      

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
