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
<div class="site-index mt-5">
    <div class="container">
        <div class="list-head">
          <h2>Contacts List</h2>
        </div>
        <div class="contact-list-sec">
        <?php /*echo \common\widgets\DbCarousel::widget([
            'key' => 'index',
            'assetManager' => Yii::$app->getAssetManager(),
            'options' => [
                'class' => 'slide', // enables slide effect
            ],
        ]) */?>
        <?= Html::a('Add', ['/contacts/add'], ['class'=>'btn sub-btn pull-right add-btn']) ?>
        <?php
        Pjax::begin(['id'=>'contats_id']); 
        echo  GridView::widget([
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
                    'attribute' => 'agent_id',
                    'filter' => false,
                    'format' => 'raw',
                    'value' => 'agent_id',
                ],
                /*[
                    'attribute' => 'created_date',
                    'format' => ['date', 'php:Y-m-d']
                ],*/
                ['class' => 'yii\grid\ActionColumn',
                 'template' => '{edit} {delete}',
                 'header'=>'Actions',
                    'buttons' => [
                        'edit' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['contacts/edit','id'=>$model['id']], ['title' => Yii::t('app', 'contacts-edit'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash"></i>', ['contacts/delete','id'=>$model['id']], [
                                    'title' => Yii::t('app', 'contacts-delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'data-method'  => 'post',
                            ]);
                        }
                    ],
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

        ]); ?>
        <?php Pjax::end(); ?>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>

      </div>
    </div>
</div>
