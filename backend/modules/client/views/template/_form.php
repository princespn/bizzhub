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
use common\models\ClientDataCategory;
use yii\grid\GridView;
use kartik\file\FileInput;


// echo Url::toRoute('/')

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var common\models\ArticleCategory[] $categories
 */

$http = Yii::$app->params['http'];
$client_instruction_url = Yii::$app->params['client_instruction_url'];
$url = Url::base($http);
$video_url = $url.'/../storage/'.$client_instruction_url;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> 
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]) ?>
    <div class="card">
        <div class="card-body"><?php /*
            <div class="add_btn">
                <a href="javascript:void(0)" class="add_field" id="add_field">Add Field</a>
            </div> */?>
            <?php echo $form->errorSummary($model) ?>
            <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'content')->widget(
                \yii\imperavi\Widget::class,
                [
                    'plugins' => ['fullscreen', 'fontcolor'],
                    'options' => [
                        'minHeight' => 200,
                        'maxHeight' => 200,
                        'buttonSource' => true,
                        'convertDivs' => false,
                        'removeEmptyTags' => true,
                    ],
                ]
            ) ?>

            <?php echo $form->field($model, 'status')->checkbox() ?>


            <?php
            if (Yii::$app->controller->action->id=="create") {
               echo FileInput::widget([
                    'model' => $model,
                    'attribute' => 'videoFile',
                    'options'=>[
                        'multiple'=>false,
                        'accept'=>'video/*'
                    ],

                ]);
            }else{
                echo FileInput::widget([
                    'model' => $model,
                    'attribute' => 'videoFile',
                    'options'=>[
                        'multiple'=>false,
                        'accept'=>'video/*'
                    ],
                    'pluginOptions' => [
                    'initialPreview'=>$video_url.$model->videoFile,
                    'overwriteInitial'=>true,
                    'showUpload' =>true,
                    'allowedFileExtensions'=>['mp4'],
                    'initialPreviewAsData'=>true,
                    'initialPreviewFileType'=> 'video',
                    'initialPreviewConfig'=> [
                        ['filetype'=> "video/mp4"]
                    ],
                ],

                ]);
            }
                ?> 
            
        <div class="card-footer">
            <?php echo Html::submitButton(
                $model->isNewRecord? FAS::icon('save').' '.Yii::t('backend', 'Create'):FAS::icon('save').' '. Yii::t('backend', 'Save Changes'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
        </div>
         <?php /*<h1>Category</h1>
         <div class="gridview table-responsive">
         <table id="sort" class="grid" class="table text-nowrap table-striped table-bordered mb-0 table-sm">
                <thead>
                    <tr><th class="index">ID</th><th>Name</th><th>Status</th><th>cat_order</th></tr>
                </thead>
                <tbody>
            <?php foreach($category as $cat_value){
                $id = $cat_value->attributes['id'];
                $name = $cat_value->attributes['name'];
                $status = $cat_value->attributes['status'];
                $cat_order = $cat_value->attributes['cat_order'];
             ?>            
                
                    <tr><td class="index"><?=$id?></td><td><?=$name?></td><td><?=$status?></td><td><?=$cat_order?></td></tr>
                <?php
            } ?>
            </tbody>
        </table>
    </div> */ ?>
        
    </div>    
<?php ActiveForm::end() ?>
<?php if(!$model->isNewRecord){ ?>
<h2><?=ucfirst($model->name)?> Templete Categories</h2>    
<div class="card-body p-0">
        <?php echo GridView::widget([
            'id'=>'templete-category-list',
            'class'=>'templete-category-list',
            'dataProvider' => $catdataProvider,
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
                    'options' => ['style' => 'width: 5%'],
                    'enableSorting' => false
                ],
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'enableSorting' => false
                ],
                [
                    'attribute' => 'cat_order',
                    'format' => 'raw',
                    'enableSorting' => false
                ],
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'options' => ['style' => 'width: 10%'],
                    'enum' => ClientDataCategory::statuses(),
                    'filter' => ClientDataCategory::statuses(),
                    'enableSorting' => false
                ],
            ],
        ]); ?>
    </div>
    <div class="card-footer">
        <?php echo getDataProviderSummary($catdataProvider) ?>
    </div>
<?php } ?>
<script>

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
        $('#templete-category-list tbody tr').each(function () {
            id += $(this).find("td:first").text()+',';
        });       
        id = id.replace(/,\s*$/, "");
        $.ajax({
            url: '<?php echo Url::toRoute('template/category-order-update'); ?>',
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

    $("#templete-category-list tbody").sortable({
        helper: fixHelper,
        stop: updateIndex
    }).disableSelection();
</script> 
