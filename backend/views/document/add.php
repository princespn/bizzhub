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
<?=$form->field($model, 'file_path')->widget(FileInput::classname(), [
                'options' => ['multiple' => false, 'class' => 'form-control'],
                'pluginOptions' => ['previewFileType' => false, 'showUpload' => false, 'showPreview' => false, 'showRemove' => true, 'allowedFileExtensions' => ['pdf']]
            ]);?>
<?php

echo $form->field($model, 'category')->dropDownList($category,['prompt' => ' -- Select Category --']) ?> 

<?php echo $form->field($model, 'status')->checkbox() ?>            

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
