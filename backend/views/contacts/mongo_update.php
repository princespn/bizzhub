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
                    <div class="form-group col-md-12"><?php 
                        echo $form->field($model, 'list')->widget(Select2::classname(), [
                            'data' => $contactList,
                            'options' => ['multiple' => true,'placeholder' => 'Select Contact List','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?> 
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
