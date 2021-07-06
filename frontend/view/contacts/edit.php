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
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
  <div class="row justify-content-center">
      <div class="col-lg-8">
      		<div class="list-head">
		      <h2>Edit New Contacts</h2>
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
                      $model->list = explode(",", $model->list);
                      //print_r($model->list);die;
                      echo $form->field($model, 'list')->widget(Select2::classname(), [
                            'name'=>'list',
                            'data' => $list_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select list','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                       ?>
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
                      <?php //echo $form->field($model, 'list') ?>
                    </div>
                  </div>
                  <?php 
                  if(!empty($model->other)){
                    $model->other = json_decode($model->other);
                    $count = 1;
                    //print_r($model->other);die;
                    foreach($model->other as $other){ ?>
                      <div class="text-items">
                          <label for="item<?= $count ?>">Item <span class="items-number"><?= $count ?></span></label>
                          <input class="form-control" type="text" name="other[]" value="<?=$other ?>" id="item<?= $count ?>" /><br>
                          <a href="#" class="remove-items">Remove</a>
                      </div><?php
                      $count++;
                    }
                  }else{ ?>
                    <div class="text-items"></div><?php
                  }
                  ?>                  
                  <?= Html::button('Add More', ['class'=>'glyphicon glyphicon-plus btn btn-default btn-sm add-items']) ?>
          <div class="form-group">
              <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn submit-btn', 'name' => 'contacts']) ?>
          </div>
          <?php ActiveForm::end(); ?>

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
