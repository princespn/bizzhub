<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;


$this->title = Yii::t('frontend', 'Add New Contact');
?>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-lg-8">
        <h1><?php echo Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(['id' => 'contact-form','class'=>'contact-form']); ?>
          <div class="col-md-6-left">
              <div class="exclusive-list">
                <div class="contact-box">                          
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php echo $form->field($model, 'first_name') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php echo $form->field($model, 'last_name') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      
                      <?php //echo $form->field($model, 'agent_id') ?>

                      <?php
                      echo $form->field($model, 'agent_id')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);

                       /*echo Select2::widget([
                          'name' => 'agent_id',
                          'value' => 'agent_id',
                          'data' => $agent_array,
                          'options' => ['multiple' => true, 'placeholder' => 'Select Agent ...'],
                          'pluginOptions' => [
                              'allowClear' => true
                          ],
                      ]); */?>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-md-6-right">
              <div class="exclusive-list">
                <div class="contact-box">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php echo $form->field($model, 'email')->input('email') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php echo $form->field($model, 'phone') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php echo $form->field($model, 'list') ?>
                    </div>
                  </div>                          
                </div>
              </div>
          </div>
          <div class="form-group">
              <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact']) ?>
          </div>
          <?php ActiveForm::end(); ?>
      </div>
    </div>
