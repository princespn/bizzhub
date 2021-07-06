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

$this->title = Yii::t('backend', $id != 0 ? 'Update' : 'Add');
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                	<div class="form-group col-md-6">
                	<?=$form->field($model, 'first_name');?>
                	</div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'last_name');?>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'email');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'phone');?>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-6"><?php 
                        echo $form->field($model, 'list')->widget(Select2::classname(), [
                            'data' => $contactList,
                            'options' => ['multiple' => true,'placeholder' => 'Select Contact List','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?> 
                    </div>
                    <div class="form-group col-md-6">
                        <?php $type=['1'=>'Active','2'=>'In Active'] ?>
                        <?= $form->field($model, 'status')->dropDownList($type,['class'=>'form-control']) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'location');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'company');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <?php echo $form->field($model,'bio')->widget(\yii\imperavi\Widget::class,
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'facebook');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'twitter');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'linkedIn');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'stage');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'price');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'address');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'city');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'state');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'zip');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'country');?>
                    </div>
                </div>

            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
