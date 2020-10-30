<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;


$this->title = Yii::t('frontend', 'Add New Contact');
?>
<div class="container mt-5">

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="fa fa-exclamation-circle"></i>Error!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
  <div class="row justify-content-center">
      <div class="col-lg-8">
      		<div class="list-head">
		      <h2>Add New Contacts</h2>
		    </div>
        <!-- <h1><?php echo Html::encode($this->title) ?></h1> -->
        <?php $form = ActiveForm::begin(['id' => 'contact-form','class'=>'contact-form']); ?>
              <div class="exclusive-list">
                <div class="contact-form">                          
                  <div class="form-row">
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'first_name') ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'last_name') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      
                      <?php //echo $form->field($model, 'agent_id') ?>

                      <?php
                      echo $form->field($model, 'agent_id')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);?>
                    </div>
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'email')->input('email') ?>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'phone') ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'list') ?>
                    </div>
                  </div>
          <div class="form-group">
              <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn submit-btn', 'name' => 'contacts']) ?>
          </div>
          <?php ActiveForm::end(); ?>

           </div>
        </div>
      </div>
    </div>
