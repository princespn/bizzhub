<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Buildings;
use yii\helpers\Url;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend', $id != 0 ? 'Update' : 'Add');
$this->params['breadcrumbs'][] = ['label' => 'Rets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                	<div class="form-group col-md-6">
                	<?=$form->field($model, 'address');?>
                	</div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'address_with_unit');?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <?php echo $form->field($model, 'description')->widget(
                \yii\imperavi\Widget::class,
                [
                    'plugins' => ['fullscreen', 'fontcolor', 'video'],
                    'options' => [
                        'minHeight' => 400,
                        'maxHeight' => 400,
                        'buttonSource' => true,
                        'convertDivs' => false,
                        'removeEmptyTags' => true,
                        'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
                    ],
                ]
            ) ?>
                    </div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-3">
                	<?=$form->field($model, 'city');?>
                	</div>
                	<div class="form-group col-md-3">
                	<?=$form->field($model, 'state');?>
                	</div>
                	<div class="form-group col-md-3">
                	<?=$form->field($model, 'zip');?>
                	</div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'approval_status');?>
                    </div>
                </div>

                <div class="form-row">                    
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'brokerage_id');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'brokerage_name');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'brokerage_url');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'brokerage_website');?>
                    </div>
                </div>
                <div class="form-row">                    
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'building_id');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'listing_price');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'hoa_fee');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'num_bedrooms');?>
                    </div>
                </div>
                <div class="form-row">                    
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'property_type');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'vacant');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'rets_keys');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'assessment_no');?>
                    </div>
                </div>
                <div class="form-row">                    
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'building_pets');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'maximum_financing_percent');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'agent1_id');?>
                    </div>
                    <div class="form-group col-md-3">
                    <?=$form->field($model, 'video_url');?>
                    </div>
                </div>
                <div class="form-row">                    
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'external_link1');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'external_link2');?>
                    </div>                    
                </div>
            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="loading_img_div">
        <?= Html::img('@web/img/loading-image.gif', ['id' => 'loading-image']) ?>
    </div>
</div>
<style type="text/css">
   .loading_img_div{
    text-align: center;
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.5);
    z-index: 9999;
   } 
   #loading-image {
    text-align: center;
    margin: 25% auto 0;
    width: 70px;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function uploadfile(input){
        //var a = input.files[0]; 
        //var fd = new FormData($('#w0')[0]);
        //console.log(input.name);
        var fd = new FormData();
        var files = $('#'+input.id)[0].files;
        var input2 = $("#"+input.id);
        var imgname = files[0]['name'];
        var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
        if(ext=='jpg' || ext=='jpeg' || ext=='png' || ext=='gif' || ext=='PNG' || ext=='JPG' || ext=='JPEG' || ext=='pdf')
        {
            fd.append('file',files[0]);
            fd.append('id',input.id);
            $.ajax({
                url: '<?php echo Url::toRoute('buildings/ajax-file-upload'); ?>',
                type: 'POST',
                cache: false,
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function() {
                  $(".loading_img_div").show();
                },
                success: function (data) {
                    var json_obj = $.parseJSON(data);
                    document.getElementById("buildings-hidden_"+json_obj['field_name']).value = json_obj['file_name'];
                    $(".loading_img_div").hide();
                },
                error: function () {
                    alert("ERROR in upload");
                }
            });
        }else{
            input = input2.val('').clone(true);
            alert('Sorry Only you can uplaod JPEG|JPG|PNG|GIF|PDF file type ');
        }
    }
</script>