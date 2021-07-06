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

$this->title = Yii::t('backend', $id != 0 ? 'Update' : 'Add');
$this->params['breadcrumbs'][] = ['label' => 'Leaderboaard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'rank');?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'agent_name');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'commitment');?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'in_contract');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'contract_volume');?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'closed_deals');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'closed_volume');?>
                    </div>
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'c_set_score');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?=$form->field($model, 'zillow_reviews');?>
                    </div>
                </div>     

                <div class="card-footer">
                    <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>                  
                </div>
            </div>
        </div>
    <?php ActiveForm::end() ?>
    </div>
</div>
