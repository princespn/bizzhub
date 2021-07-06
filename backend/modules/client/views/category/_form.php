<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;
use common\models\ClientDataCategory;
use yii\grid\GridView;
use yii\helpers\Url;
use common\grid\EnumColumn;

/**
 * @var yii\web\View $this
 * @var common\models\ArticleCategory $model
 * @var common\models\ArticleCategory[] $categories
 */

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> 
<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">
                <?php echo Yii::t('backend', 'Create a new category') ?>
            </h3>
        </div>
        <div class="card-body">
            <?php echo $form->errorSummary($model) ?>
            <?php echo $form->field($model, 'name')->textInput(['maxlength' => 512]) ?>
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
            <?php echo $form->field($model, 'templete_id')->dropDownList($templete_arr,['prompt'=>'Select Templete']); ?>
            <?php echo $form->field($model, 'status')->dropDownList(ClientDataCategory::statuses());?>
            <?php echo $form->field($model, 'cat_order')->textInput(['type' => 'number']) ?>
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
<div class="card card-success">
    <div class="card-body">    
        <h2><?=ucfirst($model->name)?> Category Forms</h2>    
        <div class="card-body p-0">
                <?php echo GridView::widget([
                    'id'=>'category-form-grid',
                    'dataProvider' => $formdataProvider,
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
                            'attribute' => 'form_order',
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
                <?php echo getDataProviderSummary($formdataProvider) ?>
            </div>
        <?php } ?>
    </div>
</div>

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
        $('#category-form-grid tbody tr').each(function () {
            id += $(this).find("td:first").text()+',';
        });       
        id = id.replace(/,\s*$/, "");
        $.ajax({
            url: '<?php echo Url::toRoute('category/form-order-update'); ?>',
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

    $("#category-form-grid tbody").sortable({
        helper: fixHelper,
        stop: updateIndex
    }).disableSelection();
</script>
