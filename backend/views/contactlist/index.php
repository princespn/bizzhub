<?php
use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\Pjax;
use common\models\User;
use common\models\ContactList;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use app\models\Branch;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentbookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact List');
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .dropdown-menu > li > a {   
    padding: 10px 20px  !important;
     font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;;
    font-size: 14px !important;

    }

</style>
<div class="wrapper">
    

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  <?php if (Yii::$app->user->can('createContactlist')) {
                  
                   ?>
                    <span class="pull-left">
                           <?= Html::a(Yii::t('app', 'Add Contact List'), ['create'], ['class' => 'btn btn-success']) ?>
                    </span>  
                     <?php } ?>                
                </header>
                <br>
                <div class="panel-body">
    <?php //Pjax::begin();
//print_r($models);die;
     ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'list_name',
            //'user_id',

            [
            'label' => 'User',
            'attribute' => 'user_id', 
            'encodeLabel' => false,
            // 'filter' =>$agent_array,
               'filterInputOptions' => [
                        'class' => 'form-control form-control-lg', 
                       // 'id' => null
                    ],
            'headerOptions' => ['style'=>'width:15%;'],
            'format' => 'raw',
            'value' => function ($data){  
                                  
                      if($data->user_id!=""){
                      /* return $AgencyCod=User::find()
                                            ->select(['username'])->Where(['id'=>$data->user_id])
                                           ->one()->username;*/
                      return ContactList::getUsername($data->user_id);                     
                   }
                   },   
            ],

            //'status',

             [
            'label' => 'Status',
            'attribute' => 'status', 
            'encodeLabel' => false,
             'filter' =>['1'=>"Active",'2'=>"Inactive"],
               'filterInputOptions' => [
                        'class' => 'form-control form-control-lg', 
                       // 'id' => null
                    ],
            'headerOptions' => ['style'=>'width:15%;'],
            'format' => 'raw',
           'value' => function ($data){
            if($data->status=="1"){ 
                 return "Active";
            }else{
                 return "Inactive";
            }
             },   
            ],



            'createddate',
            //'updateddate',
            //'createdby',
            //'updatedby',

              ['class' => 'yii\grid\ActionColumn',
                 'template' => '{edit} {delete}',
                 'header'=>'Actions',
                    'buttons' => [
                        'edit' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-edit" aria-hidden="true"></i>', ['contactlist/update','id'=>$model['id']], ['title' => Yii::t('app', 'contacts-data-edit'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fa fa-trash"></i>', ['contactlist/delete','id'=>$model['id']], [
                                    'title' => Yii::t('app', 'contacts-data-delete'),
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
