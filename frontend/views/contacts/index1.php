<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
//use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="">
        <?php /*echo \common\widgets\DbCarousel::widget([
            'key' => 'index',
            'assetManager' => Yii::$app->getAssetManager(),
            'options' => [
                'class' => 'slide', // enables slide effect
            ],
        ]) */?>
        <?= Html::a('Add', ['/contact/add'], ['class'=>'btn sub-btn pull-right']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'first_name',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'last_name',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'email',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'phone',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'updated_date',
                    'format' => ['date', 'php:Y-m-d']
                ],
                [
                    'attribute' => 'created_date',
                    'format' => ['date', 'php:Y-m-d']
                ],
                
                /*'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{view}{update}{delete}',
                'buttons' => [                   
                   'Update' => function ($url, $model) {
                       $url = Url::to(['controller/update', 'id' => $model->id]);
                       return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                   },
                ]*/
                
            ],

        ]) ?>

    </div>
</div>
