<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ContactListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">
  <?php $form = ActiveForm::begin([
      'action' => ['index'],
      'method' => 'get',
  ]); ?>
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-4">
          <?=$form->field($model, 'name');?>
        </div>
        <div class="form-group col-md-4">
          <?=$form->field($model, 'email');?>
        </div>
        <div class="form-group col-md-4">
          <?=$form->field($model, 'phone');?>
        </div>
      </div>
      <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a("Reset", Url::toRoute(['/contacts']), ['class' => 'btn btn-primary']) ?>
      </div>
    </div>
  </div>     
  <?php ActiveForm::end(); ?>
</div>