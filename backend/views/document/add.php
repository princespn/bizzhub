<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Document;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?php /*$form->field($model, 'file_path')->widget(FileInput::classname(), [
                'options' => ['multiple' => false, 'class' => 'form-control'],
                'pluginOptions' => ['previewFileType' => false, 'showUpload' => false, 'showPreview' => false, 'showRemove' => true, 'allowedFileExtensions' => ['pdf']]
            ]);*/ ?>
             <?= $form->field($model, 'file_path')->fileInput() ?>
<?php
echo $form->field($model, 'doc_name'); 
echo $form->field($model, 'category')->dropDownList($category,['prompt' => ' -- Select Category --']) ?> 

<?php echo $form->field($model, 'status')->dropDownList(Document::statuses()) ?>         

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
