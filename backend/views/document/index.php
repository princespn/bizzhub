<?php
use common\grid\EnumColumn;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Document;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */



$this->title = Yii::t('backend', 'Document');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <?php echo Html::a(FAS::icon('user-plus').' '.Yii::t('backend', 'Add New Document', [
            'modelClass' => 'Document',
        ]), ['add'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
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
                ],
                'doc_name',
                'file_path',
                'category_name',
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'enum' => Document::statuses(),
                    'filter' => Document::statuses()
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                ],
                
                // 'updated_at',

                
                ['class' => 'yii\grid\ActionColumn',
                 'template' => '{edit} {delete}',
                 'header'=>'Actions',
                    'buttons' => [
                        'edit' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['document/update','id'=>$model['id']], ['title' => Yii::t('app', 'document-edit'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash"></i>', ['document/delete','id'=>$model['id']], [
                                    'title' => Yii::t('app', 'document-delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'data-method'  => 'post',
                            ]);
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>

    <div class="card-footer">
        <?php echo getDataProviderSummary($dataProvider) ?>
    </div>
</div>

