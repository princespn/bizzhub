<?php
use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\Pjax;
use common\models\User;
use common\models\ContactList;
use common\models\Contacts;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use app\models\Branch;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentbookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-left">
                           <?= Html::a(Yii::t('app', 'Add Setting'), ['add'], ['class' => 'btn btn-success']) ?>
                    </span>              
                </header>
                <br>
                <div class="panel-body">
    <?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'display_name',
                'input_key',
                'input_type',
                'value',              
              ['class' => 'yii\grid\ActionColumn',
                 'template' => '{edit} {delete}',
                 'header'=>'Actions',
                    'buttons' => [
                        'edit' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['settings/update','id'=>$model['id']], ['title' => Yii::t('app', 'setting-data-edit'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash"></i>', ['settings/delete','id'=>$model['id']], [
                                    'title' => Yii::t('app', 'setting-data-delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'buildings-method'  => 'post',
                            ]);
                        }
                    ],
                ],
        ],
    ]); ?>

    <?php //Pjax::end(); ?>
  </div>
  </div>
                
            </section>
        </div>
    </div>
</div>
