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



$this->title = Yii::t('backend', 'Leaderboard');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card"> 
    <div class="card-header">
        <?php echo Html::a(FAS::icon('fa fa-upload').' '.Yii::t('backend', 'Import', [
            'modelClass' => 'Leaderboard',
        ]), ['import'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'rank',
                    'options' => ['style' => 'width: 2%'],
                ],
                [
                    'attribute' => 'agent_name',
                    'value' => function ($model) {
                        return Html::a(Html::encode($model['agent_name']), ['update', 'id' => $model['id']]);
                    },
                    'format' => 'raw',
                ],
                'commitment',
                'in_contract',
                'contract_volume',
                'closed_deals',
                'closed_volume',
                'c_set_score',
                'zillow_reviews',
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                ],
                ['class' => 'yii\grid\ActionColumn',
                 'template' => '{edit} {delete}',
                 'header'=>'Actions',
                    'buttons' => [
                        'edit' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['leaderboard/update','id'=>$model['id']], ['title' => Yii::t('app', 'document-edit'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash"></i>', ['leaderboard/delete','id'=>$model['id']], [
                                    'title' => Yii::t('app', 'leaderboard-delete'),
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

