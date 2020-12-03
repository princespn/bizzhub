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
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                	<div class="form-group col-md-12">
                	<?=$form->field($model, 'address');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'city');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'state');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'zip');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'legal_name');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'building_nickname');?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'perchwell_link');?>
                	</div>
                </div>

                <div class="form-row">
                	<div class="form-group col-md-4"><?php
                    //if(empty($model->purchase_application)){
                        echo $form->field($model, 'purchase_application')->fileInput(['onchange'=>'uploadfile(this)']);
                    /*}else{
                        echo Html::a(
                            Yii::t('app', 'Remove Image'), 
                            Url::toRoute(['buildings/delete-img']),
                            ['class' => 'btn btn-danger']
                        );
                    }*/ ?>
                	
                    <?= $form->field($model, 'hidden_purchase_application')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'offering_plan')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_offering_plan')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'amendments')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_amendments')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                    <div class="form-group col-md-4">
                    <?=$form->field($model, 'house_rules')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_house_rules')->hiddenInput(['value'=>''])->label(false); ?>
                    </div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'sublet_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_sublet_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'covid_19_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_covid_19_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'sublet_application')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_sublet_application')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'rental_application')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_rental_application')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'bulk_rate_offering')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_bulk_rate_offering')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'renovations')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_renovations')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'by_laws')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_by_laws')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'lease_agreement')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_lease_agreement')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'move_in_out')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_move_in_out')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'regulatory_agreement')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_regulatory_agreement')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'flip_tax_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_flip_tax_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>	
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'pet_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_pet_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'terrace_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_terrace_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'storage_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_storage_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2019')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2019')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2018')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2018')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2017')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2017')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2016')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2016')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2015')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2015')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'financials_2014')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_financials_2014')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'operating_budget')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_operating_budget')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'fitness_center_policy')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_fitness_center_policy')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'credit_report_form')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_credit_report_form')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'annual_meeting_notes')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_annual_meeting_notes')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'handbook')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_handbook')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'subscription_agreement')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_subscription_agreement')->hiddenInput(['value'=>''])->label(false); ?>
                	</div>
                	<div class="form-group col-md-4">
                	<?=$form->field($model, 'refinance_application')->fileInput(['onchange'=>'uploadfile(this)']);?>
                    <?= $form->field($model, 'hidden_refinance_application')->hiddenInput(['value'=>''])->label(false); ?>
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