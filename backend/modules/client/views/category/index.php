<?php

use common\grid\EnumColumn;
use common\models\ClientDataCategory;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this         yii\web\View
 * @var $searchModel  backend\modules\content\models\search\ArticleCategorySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        ArticleCategory
 * @var $categories   common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Data Categories');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
    'templete_arr' => $templete_arr,
]) ?>

<div class="card">
    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
                   // 'options' => ['style' => 'width: 5%'],
                    'format' => 'raw',
                ],
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'options' => ['style' => 'width: 10%'],
                    'enum' => ClientDataCategory::statuses(),
                    'filter' => ClientDataCategory::statuses(),
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

