<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use trntv\filekit\widget\Upload;
$user_id = Yii::$app->user->id;
 ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="personal-boxx-w">
  <div class="viewed-boxx">
    <?php //print_r($form);die; ?>
    <h2><?php echo $form_value->name;?></h2>
   <?php
    $statusDatafolder=Yii::$app->params['Status_type'];
    $status = 1;
    if(!empty($form_field_arr)){
     foreach($form_field_arr[$form_value->id] as $fields){   
          $status = !empty($formfolderDataStatusArr[$form_value->id][$fields->id])?$formfolderDataStatusArr[$form_value->id][$fields->id]:1;           
        }
    }
    ?>
    <h4><?php echo $statusDatafolder[$status];?></h4> 
    <?php echo $form_value->content;?>
  </div>
  <div class="client-form-section">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'client-form-form-'.$form_value->id, 'class'=>'client-form']);
    if(!empty($form_field_arr[$form_value->id])){ ?>
      <div class="accordion-main-boxx">
        <div id="accordion" class="accordion">
          <div class="card mb-0"><?php
          foreach($form_field_arr[$form_value->id] as $fields){   
          $field_value = !empty($formData[$form_value->id][$fields->id])?$formData[$form_value->id][$fields->id]:'';
          $status = !empty($formDataStatusArr[$form_value->id][$fields->id])?$formDataStatusArr[$form_value->id][$fields->id]:'';
          $statusData=Yii::$app->params['Status_type'];
          if(in_array($fields->type, ['text','number','button'])){ ?>          
            <div class="card-header collapsed" onclick="showformdata(<?=$fields->id?>)"  data-toggle="collapse" href="#collapse-<?=$fields->id?>">
              <label><?=$fields->value?></label>
              <a  class="card-title field-status-<?=$fields->id?>">
               <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
              </a>
            </div>
            <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
               <div class="row"> 
                <div class="col-md-12"> 
                  <input type="<?=$fields->type?>" class="form-control" id="<?=$fields->fkey?>" name="clientData[<?=$form_value->id?>][<?=$fields->id?>]" value="<?=$field_value?>">                    
                </div>
                <div class="col-md-12">
                  <div class="about-boxx">
                   <label><?php echo "About  "?><?=$fields->value?></label>
                    <P><?php echo $fields->content;?></P>
                  </div>
                </div>
               </div>
            </div>
          <?php 
        }else if($fields->type == 'file'){ ?>
          <div class="card-header collapsed status_image_" onclick="showformdata(<?=$fields->id?>)" data-toggle="collapse" href="#collapse-<?=$fields->id?>">
             <label><?=$fields->value?></label>
            <a class="card-title field-status-<?=$fields->id?>">
              <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
            </a>
          
          </div>
          <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
             <div class="row"> 
              <div class="col-md-6"> 
                <div class="drag-boxx">
                  <input type="<?=$fields->type?>" class="form-control" id="<?=$fields->fkey?>" name="clientData[<?=$form_value->id?>][<?=$fields->id?>]" value="<?=$field_value?>" onchange="readURL(this)"> 
                  <label for="file"><span class="message_select_drop_<?=$fields->fkey?>"><strong>Choose a file</strong><span class="box_dragndrop"> or drag it here</span></span><span class="selected_file_message_<?=$fields->fkey?>">File Selected</span>.</label>
                </div>
              </div>
              <div class="col-md-6"> 
                  <div class="drag-boxx color-chan">
                  <P><strong>CLICK</strong> here if you did not </P>
                   <P>receive a W2 in 2018 </P>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="about-boxx">
                 <label><?php echo "About  "?><?=$fields->value?></label>
                  <P><?php echo $fields->content;?></P>
                </div>
              </div>
             </div>
          </div><?php
        }else if($fields->type == 'textarea'){ ?>
          <div class="card-header collapsed" onclick="showformdata(<?=$fields->id?>)" data-toggle="collapse" href="#collapse-<?=$fields->id?>">
            <label><?=$fields->value?></label>
            <a class="card-title field-status-<?=$fields->id?>">
             <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
            </a>
          </div>
          <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
             <div class="row"> 
              <div class="col-md-12"> 
                    <textarea class="form-control" name="clientData[<?=$form_value->id?>][<?=$fields->id?>]"><?=$field_value?></textarea> 
                 
              </div>
              <div class="col-md-12">
                <div class="about-boxx">
                 <label><?php echo "About  "?><?=$fields->value?></label>
                  <P><?php echo $fields->content;?></P>
                </div>
              </div>
             </div>
          </div><?php
        }else if(!empty($fields->field_options) && ($fields->type == 'radio')){
          $options = json_decode($fields->field_options); ?>
          <div class="card-header collapsed" onclick="showformdata(<?=$fields->id?>)" data-toggle="collapse" href="#collapse-<?=$fields->id?>">
            <label><?=$fields->value?></label>
            <a class="card-title field-status-<?=$fields->id?>">
             <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
            </a>
          </div>
          <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
             <div class="row"> 
              <div class="col-md-12">                 
                <p>Please select <?=$fields->value?></p><?php
                foreach($options as $o_value){ ?>
                  <input type="<?=$fields->type?>" id="<?=$o_value?>" name="clientData[<?=$form_value->id?>][<?=$fields->id?>]" value="<?=$o_value?>" <?php echo ($o_value== $field_value) ?  "checked" : "" ;  ?>>
                  <label for="<?=$o_value?>"><?=$o_value?></label><?php 
                } ?>                 
              </div>
              <div class="col-md-12">
                <div class="about-boxx">
                 <label><?php echo "About  "?><?=$fields->value?></label>
                  <P><?php echo $fields->content;?></P>
                </div>
              </div>
             </div>
          </div><?php
        }else if(!empty($fields->field_options) && ($fields->type == 'checkbox')){
          $options = json_decode($fields->field_options); ?>
          <div class="card-header collapsed" onclick="showformdata(<?=$fields->id?>)" data-toggle="collapse" href="#collapse-<?=$fields->id?>">
             <label><?=$fields->value?></label>
            <a class="card-title field-status-<?=$fields->id?>">
            <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
            </a>
              
          </div>
          <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
             <div class="row"> 
              <div class="col-md-12">                
                <p>Please select <?=$fields->value?></p><?php
                $dboption = json_decode($field_value);
                foreach($options as $o_value){ ?>
                  <input type="<?=$fields->type?>" id="<?=$o_value?>" name="clientData[<?=$form_value->id?>][<?=$fields->id?>][]" value="<?=$o_value?>" <?php echo (!empty($dboption) && (in_array($o_value, $dboption))? 'checked' : '');?>>
                  <label for="<?=$o_value?>"><?=$o_value?></label><?php 
                } ?>                 
              </div>
              <div class="col-md-12">
                <div class="about-boxx">
                 <label><?php echo "About  "?><?=$fields->value?></label>
                  <P><?php echo $fields->content;?></P>
                </div>
              </div>
             </div>
          </div><?php
        }else if(!empty($fields->field_options) && ($fields->type == 'dropdown')){
          $options = json_decode($fields->field_options); ?>
          <div class="card-header collapsed" onclick="showformdata(<?=$fields->id?>)" data-toggle="collapse" href="#collapse-<?=$fields->id?>">
             <label><?=$fields->value?></label>
            <a class="card-title field-status-<?=$fields->id?>">
            <P class="card-cp"><?=!empty($status)?$statusData[$status]:'Unopened'?></P>
            </a>
              
          </div>
          <div id="collapse-<?=$fields->id?>" class="card-body collapse" data-parent="#accordion" >
             <div class="row"> 
              <div class="col-md-12"> 
                <p>Please select <?=$fields->value?></p>
                <select id="<?=$fields->fkey?>" class="form-control" name="clientData[<?=$form_value->id?>][<?=$fields->id?>]"><?php
                foreach($options as $o_value){ ?>
                  <option value="<?=$o_value?>" <?php if($o_value == $field_value): ?> selected="selected"<?php endif; ?>><?=$o_value?></option><?php 
                } ?>
                </select>
              </div>
              <div class="col-md-12">
                <div class="about-boxx">
                 <label><?php echo "About  "?><?=$fields->value?></label>
                  <P><?php echo $fields->content;?></P>
                </div>
              </div>
             </div>
          </div><?php
        } 
      } ?>
      <input type="hidden" name="user_id" value="<?=$user_id?>"><?php
    }else{?>
      <p>This form has no fields</p>
    <?php } ?> 
          <div class="form-row">
            <div class="form-group col-md-12 text-center mt-4"> 
              <?= Html::Button('Submit', ['class' => 'btn btn-primary', 'onClick'=>'addClientData('.$form_value->id.')', 'disabled' => empty($form_field_arr[$form_value->id])?true:false]) ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php ActiveForm::end(); ?>
  </div>  
</div>
<script type="text/javascript">
      function addClientData(form_id){
    var myData = new FormData($('#client-form-form-'+form_id)[0]);
    //alert(myData);
    $.ajax({
        url: '<?php echo Url::toRoute('client-home/ajax-client-data'); ?>',
        type: 'POST',
        //cache: false,
        data: myData,
        processData: false,
        contentType: false,
        //dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          if(data == 1){
            $('#client-form-'+form_id).modal('hide');
            location.reload();
          }
        },
        error: function () {
            alert("ERROR in upload");
        }
    });
}

function readURL(e){
  $(".message_select_drop_"+e.id).hide();
  $(".selected_file_message_"+e.id).show();
}


  function showformdata(fields_id){
    $.ajax({
        url: '<?php echo Url::toRoute('client-home/ajax-form-display-views'); ?>',
        type: 'POST',
        data: {fields_id},
        dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          //obj = JSON.parse(data);
          $(".field-status-"+fields_id).html(data);
          //changeFolderStatus(form_id,2);
        },
        error: function () {
            alert("ERROR IN FORM OPEN");
        }
    });
  }
</script>