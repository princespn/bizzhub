<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

?>

<?php $form = ActiveForm::begin() ?>
<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'body')->widget(
    \yii\imperavi\Widget::class,
    [
        'plugins' => ['fullscreen', 'fontcolor', 'video'],
        'options' => [
            'minHeight' => 400,
            'maxHeight' => 400,
            'buttonSource' => true,
            'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
        ],
    ]
) ?>        
<?php echo $form->field($model, 'status')->checkbox() ?>       

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
