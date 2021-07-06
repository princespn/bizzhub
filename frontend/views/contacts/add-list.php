<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;


$this->title = Yii::t('frontend', 'Add New Contact');
?>
<div class="content-wrapper" style="min-height: 902.8px;">
    <div class="dashboard_right_detail">
<?php /*if (Yii::$app->session->hasFlash('success')): ?>
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
<?php endif;*/ ?>

 <div class="setting-page">
    
        <!-- <h1><?php echo Html::encode($this->title) ?></h1> -->
        <?php $form = ActiveForm::begin(['id' => 'contact-form','class'=>'contact-form']); ?>
        <div class="setting-form"> 
        <div class="list-head">
		      <h3 class="setting-title mt-0">Add New Contacts</h3>
		    </div>
              <div class="exclusive-list">
                <div class="contact-form">                          
                  <div class="form-row">
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'list_name') ?>
                    </div>
                    <div class="col-md-6">
                      <?php echo $form->field($model, 'list_key') ?>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php $type=['1'=>'Active','2'=>'In Active'] ?>
                      <?= $form->field($model, 'status')->dropDownList($type,['class'=>'form-control']) ?>
                    </div>
                  </div>
                  <div class="form-row"><?php /*
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
                    </div>*/ ?>
                  </div>
          <div class="form-group">
   
              <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contacts']) ?>
          </div>
          <?php ActiveForm::end(); ?>
                      </div>
           
        </div>
      </div>
    </div>
                      </div>           
  
<script type="text/javascript">
  jQuery(document).ready(function($){
    $('.contact-form .add-items').click(function(){
        var n = $('.text-items').length + 1;
        //alert(n);
        var box_html = $('<div class="text-items"><label for="item' + n + '">Item <span class="items-number">' + n + '</span></label> <input type="text" class="form-control" name="other[]" value="" id="item' + n + '" /> <a href="#" class="remove-items">Remove</a></div>');
        box_html.hide();
        $('.contact-form div.text-items:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });

    $('.contact-form').on('click', '.remove-items', function(){
    //$(this).parent().css( 'background-color', '#FF6C6C' );
    if($('.text-items').length > 1){
        $(this).parent().fadeOut('slow', function() {
            $(this).remove();
            $('.items-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
    }
    return false;
});
});
</script>