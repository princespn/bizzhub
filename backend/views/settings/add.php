<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Buildings;
use yii\helpers\Url;
use kartik\select2\Select2;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend', ($model->isNewRecord)?'Add Setting':'Update Setting');
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $form->field($model, 'input_type')->dropDownList($inputArray,['class'=>'form-control', 'prompt'=>'Select Inpit Type']) ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'input_key');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'display_name');?>
                    </div>                   
                </div><?php 
                if($model->input_type == 'text'){ ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <?=$form->field($model, 'value');?>
                        </div>                   
                    </div><?php 
                }else if($model->input_type == 'checkbox'){ ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <?= $form->field($model, "value")->checkbox(); ?>
                        </div>                   
                    </div><?php 
                }else if($model->input_type == 'textarea'){ ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <?= $form->field($model, 'value')->textarea(['rows' => '6']) ?>
                        </div>                   
                    </div><?php 
                }?>
            </div>     
            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', ($model->isNewRecord)?'Add':'Update'), ['class' => 'btn btn-primary']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
