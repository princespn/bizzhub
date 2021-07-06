<?php
use common\models\ClientForm;
use trntv\filekit\widget\Upload;
use kartik\datetime\DateTimePicker;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use common\grid\EnumColumn;
use common\models\ClientDataForm;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var common\models\ArticleCategory[] $categories
 */
//$this->registerJsFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
?>
<?php
//echo $formField->form_id;die; 
Modal::begin([
    'title'=>'<h4>Edit field</h4>',
    'id'=>'edit_field_models',
    'size'=>'modal-lg',
 ]); ?>
<div id='edit_field_models_content'>
    <div class="card">
        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
            'id'=>'edit_field_form'
        ]) ?>
            <div class="card-body">
                <?php
                //print_r($formField->field_options);die;
                $type = Yii::$app->params['field_type'];
                 ?>
                <?php echo $form->field($formField, 'value')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($formField, 'status')->dropDownList(ClientForm::statuses()); ?>
                <?php echo $form->field($formField, 'type')->dropDownList($type); ?>          
                <?php
                $more_selected = '';
                if(!empty($formField->field_options)){
                    $formField->field_options = json_decode($formField->field_options);
                    foreach ($formField->field_options as $key => $value) {
                        if($key == 0){ ?>
                            <div class="row">
                                <?php echo $form->field($formField, 'field_options[]')->textInput(['maxlength' => true,'value'=>$value]) ?>   
                                 <button class="btn add-btn add_more"><i class="fas fa-plus"></i></button>                            
                            </div><?php 
                        }else{
                            $more_selected .= '<div class="form-group input-box input-box-1">
                                        <input type="text" class="form-control" name="ClientForm[field_options][]" value="'.$value.'"/>                              
                                        <a href="#" class="remove-lnk remove-btn"><i class="fa fa-minus"></i></a>           
                                    </div>';
                        }
                        
                    } 
                    if(!empty($formField->field_options)){ ?>
                        <div class="more_option"><?=$more_selected?></div><?php
                    }                    
                }else{ ?>
                    <div class="row">
                        <?php echo $form->field($formField, 'field_options[]')->textInput(['maxlength' => true]) ?>   
                         <button class="btn add-btn add_more"><i class="fas fa-plus"></i></button>                            
                    </div>
                    <div class="more_option">
                        
                    </div>
                <?php } ?>
                <?php echo $form->field($formField, 'content')->textarea(['rows' => '5']) ?>
                <?php echo $form->field($formField, 'form_id')->hiddenInput(['value'=> $formField->form_id])->label(false); ?>
                <?php echo $form->field($formField, 'id')->hiddenInput(['value'=> $formField->id])->label(false); ?>
                <div class="card-footer">
                    <?php echo Html::Button(FAS::icon('save').' '.Yii::t('backend', 'Update'),['class' => 'btn btn-primary submit_btn']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>
    </div>
</div>

<?php
Modal::end();
?>


<script type="text/javascript">
    $('.field-clientform-field_options').hide();
    $('.add_more').hide();
    <?php
    if(!empty($formField->field_options)){ ?>
        $('.field-clientform-field_options').show();
        $('.add_more').show();     
    <?php }?>    
    $('#edit_field_form #clientform-type').change(function(){
        if($(this).val() == 'dropdown' || $(this).val() == 'radio' || $(this).val() == 'radio'){
            $('.field-clientform-field_options').show();
            $('.add_more').show();
        }else{
            $('.field-clientform-field_options').hide();
            $('.add_more').hide();
        }
    }) 



    $(document).ready(function(){
        $('#edit_field_models').modal('show')
                .find('#edit_field_models_content');
        // allowed maximum input fields
        var max_input = 20;
     
        // initialize the counter for textbox
        var x = 1;
     
        // handle click event on Add More button
        $('.add-btn').click(function (e) {
          e.preventDefault();
          if (x < max_input) { // validate the condition
            x++; // increment the counter
            $('.more_option').append(`
              <div class="form-group input-box input-box-1">
                <input type="text" class="form-control" name="ClientForm[field_options][]"/>                              
                <a href="#" class="remove-lnk remove-btn"><i class="fa fa-minus"></i></a>           
              </div>

            `); // add input field
          }
        });
     
        // handle click event of the remove link
        $('.wrapper').on("click", ".remove-lnk", function (e) {
          e.preventDefault();
          $(this).parent('div').remove();  // remove input field
          x--; // decrement the counter
        })        
    });

    $(".submit_btn").on("click", function(){
       var form =$("#edit_field_form").serialize();
       //alert(form);
        $.ajax({
            url: '<?php echo Url::toRoute('form/update-field'); ?>',
            type: 'POST',
            data: form,
            beforeSend: function() {
              $(".loading_img_div").show();
            },
            success: function (data) {
                 $("#edit_field_models").modal('hide'); //hide popup 
                 location.reload();
            },
            error: function () {
                alert("ERROR");
            }
        });
    })

   /* function editField(field_id){
        $.ajax({
            url: '<?php echo Url::toRoute('form/edit-field'); ?>',
            type: 'POST',
            data: {field_id : field_id},
            beforeSend: function() {
              $(".loading_img_div").show();
            },
            success: function (data) {
                 $("#add_field_models").modal('hide'); //hide popup 
            },
            error: function () {
                alert("ERROR");
            }
        });
    }*/
</script>

