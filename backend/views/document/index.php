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
$model->category = [1,3,5]; //pre-selected values list
$categories = [1=>'test',2=>'test2',3=>'test3',4=>'test4',5=>'test5'];
echo $form->field($model, 'category')->dropDownList($categories,['prompt' => ' -- Select Category --']) ?>            

<div class="form-group">
    <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
    
</div>

<?php ActiveForm::end() ?>
