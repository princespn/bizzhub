
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use common\models\ClientForm;
use common\models\ClientDataForm;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
$UserData=ArrayHelper::map(User::find()->select(['id','username'])->all(),'id','username'); 
$FieldData=ArrayHelper::map(ClientForm::find()->select(['id','value'])->all(),'id','value'); 
$FormData=ArrayHelper::map(ClientDataForm::find()->select(['id','name'])->all(),'id','name'); 
?>
<style type="text/css">
.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    /* font-family: "Glyphicons Halflings"; */
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
<div class="order-search">
    <?php $form = ActiveForm::begin([
        'action' => ['/client/clientdata'],
        'method' => 'get',
    ]); ?>
<div class="row">
<div class="col-md-6">   
<div class="form-group">
 <label for="textfield" class="control-label  ">User Name</label>                           
<?php
echo $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' =>$UserData,
    'value'=>$model->user_id,
    'options' => ['placeholder' => 'Select User...'],
    'pluginOptions' => [
    ],
])->label(false); ?>
</div> 
</div>

<div class="col-md-6">
<div class="col-md-12">   
<div class="form-group">
 <label for="textfield" class="control-label  ">Form</label>                           
<?php
echo $form->field($model, 'form_id')->widget(Select2::classname(), [
    'data' =>$FormData,
    'value'=>$model->form_id,
    'options' => ['placeholder' => 'Select Form...'],
    'pluginOptions' => [
    ],
])->label(false); ?>
</div>             
</div>
</div>

<!-- <div class="col-md-4"> 
<div class="col-md-12">   
<div class="form-group">
 <label for="textfield" class="control-label  ">Field</label>                           
<?php
echo $form->field($model, 'field_id')->widget(Select2::classname(), [
    'data' =>$FieldData,
    'value'=>$model->field_id,
    'options' => ['placeholder' => 'Select Field...'],
    'pluginOptions' => [
    ],
])->label(false); ?>
</div>             
</div>
</div> -->


<div class="col-md-6">
    <div class="form-group" style="text-align: right;">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a("Reset", Url::toRoute(['/client/clientdata']), ['class' => 'btn btn-primary']) ?>
    </div>
  </div>

  <?php ActiveForm::end(); ?>


</div>
</div>
