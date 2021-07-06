<?php
use common\models\User;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>
<div class="user-form">
    <?php $form = ActiveForm::begin() ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->field($model, 'username') ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'password')->passwordInput() ?>
                <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>   
                <?=$form->field($model, 'profileselector')->widget(Select2::classname(), [
                            'data' => $profileSelector,
                            'options' => ['multiple' => true,'placeholder' => 'Select Profile Selector', 'class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]); ?>

                <?=$form->field($model, 'successmanager')->widget(Select2::classname(), [
                            'data' => $successManager,
                            'options' => ['multiple' => true,'placeholder' => 'Select Success Manager','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>

                <?=$form->field($model, 'agent')->widget(Select2::classname(), [
                            'data' => $agent,
                            'options' => ['multiple' => true,'placeholder' => 'Select Real State Agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?> 

                <?=$form->field($model, 'attorney')->widget(Select2::classname(), [
                            'data' => $attorney,
                            'options' => ['multiple' => true,'placeholder' => 'Select Real State Attorney','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?> 
               <?=$form->field($model, 'mortgageLender')->widget(Select2::classname(), [
                            'data' => $mortgageLender,
                            'options' => ['multiple' => true,'placeholder' => 'Select Mortgage Lender','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?> 

                <?php echo $form->field($model, 'roles')->checkboxList($roles,['onchange' =>
 'myFunction(this)']) ?>          
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end() ?>
</div>
<style type="text/css">
  .select2-search__field{
    width: 100% !important;
  }
</style>
<script>
<?php
if(!empty($model->roles['client'])){ ?>
  $(".field-userform-profileselector").show();
  $(".field-userform-successmanager").show();
  $(".field-userform-agent").show();
  $(".field-userform-attorney").show();
  $(".field-userform-mortgageLender").show();
  <?php 
}else{ ?>
  $(".field-userform-profileselector").hide();
  $(".field-userform-successmanager").hide();
  $(".field-userform-attorney").hide();
  $(".field-userform-mortgageLender").hide();
  $(".field-userform-agent").hide();<?php  
}?>  
function myFunction(e) {
    if ($('#i3').is(":checked")== true){
      $(".field-userform-profileselector").show();
      $(".field-userform-attorney").show();
      $(".field-userform-mortgageLender").show();
      $(".field-userform-successmanager").show();
      $(".field-userform-agent").show();
    } else {
      $(".field-userform-profileselector").hide();
       $(".field-userform-attorney").hide();
        $(".field-userform-mortgageLender").hide();
      $(".field-userform-successmanager").hide();
      $(".field-userform-agent").hide();
    }
}
</script>