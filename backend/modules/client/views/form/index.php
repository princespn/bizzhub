<?php

use common\grid\EnumColumn;
use common\models\ClientTemplate;
//use common\models\ArticleCategory;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\ArticleSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Form');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
         <?php if (Yii::$app->user->can('createForm')) {
                   ?>
        <?php echo Html::a(FAS::icon('user-plus').' '.Yii::t('backend', 'Add New {modelClass}', [
            'modelClass' => 'Form',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>
    </div>

    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => ['gridview', 'table-responsive'],
            ],
            'tableOptions' => [
                'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0', 'table-sm'],
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => ['style' => 'width: 5%'],
                ],
                [
                    'attribute' => 'name',
                    'value' => function ($model) {
                        return Html::a(Html::encode($model->name), ['update', 'id' => $model->id]);
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'templete_id',
                    'value' =>function ($model) {
                           return  $model->find_templete_by_id($model->templete_id);
                        },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'cat_id',
                    'value' =>function ($model) {
                           return  $model->find_cagegory_by_id($model->cat_id);
                        },
                    'format' => 'raw',
                ],
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'options' => ['style' => 'width: 10%'],
                    'enum' => ClientTemplate::statuses(),
                    'filter' => ClientTemplate::statuses(),
                ],            
                [
                    'class' => \common\widgets\ActionColumn::class,
                    'options' => ['style' => 'width: 5%'],
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>

    <div class="card-footer">
        <?php echo getDataProviderSummary($dataProvider) ?>
    </div>
</div>


