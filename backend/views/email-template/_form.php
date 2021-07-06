<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */

//$agent_array=User::find()->select(['username'])->One();
//echo $agent_array;
?>

<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'template_name');?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'template_key');?>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'subject');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?php $type=['1'=>'Active','2'=>'In Active'] ?>
                        <?= $form->field($model, 'status')->dropDownList($type,['class'=>'form-control']) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?php echo $form->field($model, 'header')->widget(
                            \yii\imperavi\Widget::class,
                            [
                                'plugins' => ['fullscreen', 'fontcolor'],
                                'options' => [
                                    'minHeight' => 100,
                                    'maxHeight' => 100,
                                    'buttonSource' => true,
                                    'convertDivs' => false,
                                    'removeEmptyTags' => true,
                                ],
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?php echo $form->field($model, 'content')->widget(
                            \yii\imperavi\Widget::class,
                            [
                                'plugins' => ['fullscreen', 'fontcolor'],
                                'options' => [
                                    'minHeight' => 400,
                                    'maxHeight' => 400,
                                    'buttonSource' => true,
                                    'convertDivs' => false,
                                    'removeEmptyTags' => true,
                                ],
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?php echo $form->field($model, 'footer')->widget(
                            \yii\imperavi\Widget::class,
                            [
                                'plugins' => ['fullscreen', 'fontcolor'],
                                'options' => [
                                    'minHeight' => 200,
                                    'maxHeight' => 200,
                                    'buttonSource' => true,
                                    'convertDivs' => false,
                                    'removeEmptyTags' => true,
                                ],
                            ]
                        ) ?>
                    </div>
                </div>
            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', (!$model->isNewRecord)  ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
