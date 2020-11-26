<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Buildings;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend', $id != 0 ? 'Update' : 'Add');
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                	<div class="form-group col-md-12">
                	<?=$form->field($model, 'address');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'city');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'state');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'zip');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'legal_name');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'building_nickname');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'perchwell_link');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'purchase_application')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'offering_plan')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'amendments')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'sublet_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'covid_19_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'sublet_application')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'rental_application')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'bulk_rate_offering')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'renovations')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'by_laws')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'lease_agreement')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'move_in_out')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'regulatory_agreement')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'flip_tax_policy')->fileInput();?>
                	</div>	
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'pet_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'terrace_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'storage_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2019')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2018')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2017')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2016')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2015')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2014')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2015')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'operating_budget')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'fitness_center_policy')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'credit_report_form')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'credit_report_form')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'annual_meeting_notes')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'handbook')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'subscription_agreement')->fileInput();?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'refinance_application')->fileInput();?>
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