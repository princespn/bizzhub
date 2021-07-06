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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> 
<?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    //'enableAjaxValidation' => true,
]) ?>
    <div class="card">
        <div class="card-body">
            <div class="add_btn">
                <a href="javascript:void(0)" class="add_field" id="add_field">Add Field</a>
            </div>
            <?php echo $form->errorSummary($model) ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <?php echo $form->field($model, 'content')->widget(
                        \yii\imperavi\Widget::class,
                        [
                            'plugins' => ['fullscreen', 'fontcolor'],
                            'options' => [
                                'minHeight' => 100,
                                'maxHeight' => 100,
                                'buttonSource' => true,
                                'convertDivs' => false,
                                'removeEmptyTags' => true,
                            ],
                        ]
                    ) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <?php echo $form->field($model, 'templete_id')->dropDownList($templete_array,['prompt'=>'Select Templete']); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $form->field($model, 'cat_id')->dropDownList($category_array,['prompt'=>'Select Templete']); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $form->field($model, 'status')->dropDownList(ClientDataForm::statuses());?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $form->field($model, 'form_order')->textInput(['type' => 'number']) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2.9">
                    <?php echo $form->field($model, 'unopened_image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                            'maxFileSize' => 5000000, // 5 MiB,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]
                    ) ?>
                </div>
                <div class="form-group col-md-2.9">
                    <?php echo $form->field($model, 'opened_image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                            'maxFileSize' => 5000000, // 5 MiB,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]
                    ) ?>
                </div>
                <div class="form-group col-md-2.9">
                    <?php echo $form->field($model, 'received_image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                            'maxFileSize' => 5000000, // 5 MiB,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]
                    ) ?>
                </div>
                <div class="form-group col-md-2.9">
                    <?php echo $form->field($model, 'review_image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                            'maxFileSize' => 5000000, // 5 MiB,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]
                    ) ?>
                </div>
                <div class="form-group col-md-2.9">
                    <?php echo $form->field($model, 'complete_image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                            'maxFileSize' => 5000000, // 5 MiB,
                            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        ]
                    ) ?>
                </div>
            </div>   
        <div class="card-footer">
            <?php echo Html::submitButton(
                $model->isNewRecord? FAS::icon('save').' '.Yii::t('backend', 'Create'):FAS::icon('save').' '. Yii::t('backend', 'Save Changes'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
        </div>  
        
    </div>    
<?php ActiveForm::end() ?>
<?php if(!$model->isNewRecord){ ?>
<div class="card-body">    
    <h1><?=ucfirst($model->name)?> Form Feilds</h1>    
        <div class="card-body p-0">
            <?php echo GridView::widget([
                'id'=>'form-field-list',
                'dataProvider' => $fieldsataProvider,
                'filterModel' => null,
                //'rowCssClassExpression'=>'"items[]_{$data->id}"',
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'columns' => [
                    [
                        'attribute' => 'id',
                        'format' => 'raw',
                        'enableSorting' => false
                    ],
                    [
                        'attribute' => 'value',
                        'format' => 'raw',
                        'enableSorting' => false
                    ],
                    [
                        'attribute' => 'type',
                        'format' => 'raw',
                        'enableSorting' => false
                    ],
                    [
                        'attribute' => 'field_order',
                        'format' => 'raw',
                        'enableSorting' => false
                    ],
                    [
                        'class' => EnumColumn::class,
                        'attribute' => 'status',
                        'options' => ['style' => 'width: 10%'],
                        'enum' => ClientForm::statuses(),
                        'filter' => ClientForm::statuses(),
                    ],
                    [
                            'class' => \common\widgets\ActionColumn::class,
                            'options' => ['style' => 'width: 5%'],
                            'header' => 'Action',
                            'template' => '{update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        return \yii\helpers\Html::a('<i class="fa-fw fas fa-edit" aria-hidden=""></i>','javascript:void(0);', [
                                                'title' => Yii::t('yii', 'Update'),
                                                'data-pjax' => '0',
                                                'class' => 'btn btn-warning btn-xs',
                                                'onclick'=>'editField('.$model['id'].')'
                                            ]);
                                    },
                                    'delete' => function ($url, $formField) {
                                        return \yii\helpers\Html::a('<i class="fa-fw fas fa-trash" aria-hidden=""></i>',
                                            (new yii\grid\ActionColumn())->createUrl('form/field-delete', $formField, $formField['id'], 1), [
                                                'title' => Yii::t('yii', 'Delete'),
                                                'data-method' => 'post',
                                                'data-pjax' => '0',
                                                'data-confirm' => 'Are you sure you want to delete this item?',
                                                'class' => 'btn btn-danger btn-xs'
                                            ]);
                                    },
                                ]
                        ],
                ],
            ]); ?>
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($fieldsataProvider) ?>
        </div>
        <?php } ?>
    </div>

<?php 
Modal::begin([
    'title'=>'<h4>Add field</h4>',
    'id'=>'add_field_models',
    'size'=>'modal-lg',
 ]); ?>
<div id='add_field_models_content'>
    <div class="card">
        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
            'id'=>'add_field_form'
        ]) ?>
            <div class="card-body">
                <?php
                $type = Yii::$app->params['field_type'];
                 ?>
                 <div class="error"></div>
                <?php echo $form->field($formField, 'value')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($formField, 'status')->dropDownList(ClientForm::statuses()); ?>
                <?php echo $form->field($formField, 'type')->dropDownList($type); ?>
                <div class="row">
                <?php echo $form->field($formField, 'field_options[]')->textInput(['maxlength' => true]) ?>   
                 <button class="btn add-btn add_more"><i class="fas fa-plus"></i></button>  
                
               </div>
                <div class="more_option">
                    
                </div> 
                 <?php echo $form->field($formField, 'field_order')->textInput(['type' => 'number']) ?>    
                 <?php echo $form->field($formField, 'content')->textarea(['rows' => '5']) ?> 

                <?php echo $form->field($formField, 'form_id')->hiddenInput(['value'=> $model->id])->label(false); ?>

                <div class="card-footer">
                    <?php echo Html::submitButton(FAS::icon('save').' '.Yii::t('backend', 'Create'),['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>
    </div>
</div>

<?php
Modal::end();
?>
<div class="edit_field" id="edit_field">
    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        //model show
        $('.add_field').click(function () {
            $('#add_field_models').modal('show')
                .find('#add_field_models_content');
        });
        
 
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
    $('.field-clientform-field_options').hide();
    $('.add_more').hide();
    <?php
    if(!empty($formField->field_options)){ ?>
        $('.field-clientform-field_options').show();
        $('.add_more').show();     
    <?php }?>
    $('#clientform-type').change(function(){
        if($(this).val() == 'dropdown' || $(this).val() == 'radio' || $(this).val() == 'checkbox'){
            $('.field-clientform-field_options').show();
            $('.add_more').show();
        }else{
            $('.field-clientform-field_options').hide();
            $('.add_more').hide();
        }
    })    

    $("#add_field_form").on("submit", function(){
       var form =$("#add_field_form").serialize();
       //alert(form);
        $.ajax({
            url: '<?php echo Url::toRoute('form/add-field'); ?>',
            type: 'POST',
            data: form,
            beforeSend: function() {
              $(".loading_img_div").show();
            },
            success: function (data) {
                if(data == 1){
                    $("#add_field_models").modal('hide'); //hide popup 
                    location.reload();
                }else{
                    alert("ERROR in Field Add");
                }

                 
            },
            error: function () {
                alert("ERROR in Field Add");
            }
        });
    })
    function errarFunction(item, index){
        document.getElementById("error").innerHTML += index + ":" + item + "<br>";
    }
    function editField(field_id){
        $.ajax({
            url: '<?php echo Url::toRoute('form/edit-field'); ?>',
            type: 'POST',
            dataType: "json",
            data: {field_id : field_id},
            beforeSend: function() {
              $(".loading_img_div").show();
            },
            success: function (data) {
                 $("#edit_field").html(data); //hide popup 
            },
            error: function () {
                alert("ERROR");
            }
        });
    }

    //drag drop
    var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            console.log(ui);
            return ui;
        };
    updateIndex = function(e, ui) {
        var postData = [];
        var id = id2 = '';
        $('#form-field-list tbody tr').each(function () {
            id += $(this).find("td:first").text()+',';
        });       
        id = id.replace(/,\s*$/, "");
        $.ajax({
            url: '<?php echo Url::toRoute('form/form-field-order-update'); ?>',
            type: 'POST',
            data: {id:id},
            beforeSend: function() {
              $(".loading_img_div").show();
            },
            success: function (data) {
                 if(data == 1){
                    window.location.reload();
                 } 
            },
            error: function () {
                alert("ERROR in upload");
            }
        });
    };

    $("#form-field-list tbody").sortable({
        helper: fixHelper,
        stop: updateIndex
    }).disableSelection();
</script>

<style type="text/css">
    .add_btn {
    margin-bottom: 10px;
    display: flex;
    justify-content: flex-end;
}
.add_btn a#add_field {
    background: #007bff;
    color: #fff;
    padding: 5px;
    border-radius: 3px;
    width: auto;
}
#project-grid tbody tr{
    cursor: move;
}
/*.field-clientform-field_options, .add_more{
    display: none;
}*/
.form-group.field-clientform-field_options{
    width: 92%!important;
    padding-left: 8px;
    padding-right: 8px
}
button.btn.add-btn.add_more {
    background: green;
    color: #fff;
    height: 38px;
    /* line-height: 23px; */
    margin-top: 33px;
    margin-left: 4px;
    width: 7%;
}

.remove-btn {
   
    color: #fff;
    /* height: 38px; */
    /* line-height: 23px; */
    /* margin-top: 13px; */
    /* margin-left: 4px; */
    width: 7%;
    margin-top: 0px;
    /* line-height: 37px; */
    margin-left: 11px;
    background: red;
    text-align: center;
    /* display: flex; */
    /* align-items: center; */
    border-radius: .25rem;
    padding: 10px 17px;
}
.remove-btn a{ background: red;height: 38px;
    color: #fff; 
    padding: 8px 10px; border-radius: .25rem;
    text-align: center;
}
.form-group.input-box.input-box-1{
    width: 100%;
    display:flex;
}
</style>