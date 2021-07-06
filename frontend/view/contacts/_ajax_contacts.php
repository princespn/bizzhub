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
use frontend\models\Contacts;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

 
                        
    ?>

<div class="list-head">
  <h2>Contacts</h2>
</div> 


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
                    'attribute' => 'name',
                    'format' => 'text'
                ],
                /*[
                    'attribute' => 'last_name',
                    'format' => 'text'
                ],*/
                [
                    'attribute' => 'email',
                    'format' => 'text'
                ],
                [
                    'attribute' => 'phone',
                    'format' => 'text'
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
                            if(empty($model['mongo_status'])){
                                return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['contacts/edit','id'=>$model['id']], ['title' => Yii::t('app', 'contacts-edit'),
                                ]);
                            }
                        },
                        'delete' => function ($url, $model) {
                            if(empty($model['mongo_status'])){
                                return Html::a('<i class="fa fa-trash"></i>', ['contacts/delete','id'=>$model['id']], [
                                        'title' => Yii::t('app', 'contacts-delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                            'data-method'  => 'post',
                                ]);
                            }
                        }
                    ],
                ],
                
            ],

        ]); ?>
        <?php Pjax::end(); ?>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>