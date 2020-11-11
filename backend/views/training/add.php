<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Training;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?php
echo $form->field($model, 'title');
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
) ;
echo $form->field($model, 'external_link');
echo $form->field($model, 'item_order')->textInput(['type' => 'number']);
//echo $form->field($model, 'item_order');

 ?>         

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
