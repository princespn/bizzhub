<?php
use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\Pjax;
use common\models\User;
use common\models\ContactList;
use common\models\Contacts;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;
use kartik\daterange\DateRangePicker;
use app\models\Branch;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentbookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = Yii::t('app', 'Contacts');
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
  <?php  //echo $this->render('_search', ['model' => $model]); ?> 
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  <?php if (Yii::$app->user->can('addContact')) {
                  
                   ?>
                    <span class="pull-left">
                           <?= Html::a(Yii::t('app', 'Add Contacts'), ['add'], ['class' => 'btn btn-success']) ?>
                    </span> 
                    <?php } ?>             
                </header>
                <br>
                <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $model]); ?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'name',
                'email',
                'phone',
                /*[
                  'label' => 'Contact List',
                  'headerOptions' => ['style'=>'width:15%;'],
                  'filter' =>Select2::widget([
                  'model'=>$searchModel,      
                  'attribute'=>'list',
                  'data' => ArrayHelper::map(ContactList::find()->all(), 'id', 'list_name'),

                  'options' => ['placeholder' => 'Select List'],
                  'pluginOptions' => [
                  'allowClear' => true
                    ],
                  ]),
                  'value' => function ($data){  
                    if($data->list!=""){
                     /*return $AgencyCod=User::find()
                                          ->select(['username'])                                           
                                         ->Where(['id'=>$data->agent_id])
                                        
                                         ->one()->username;*/
                     /* return Contacts::getListname($data->list);                   
                    }
                  },
              ], */
              /*[
                'label' => 'Status',
                'attribute' => 'status', 
                'encodeLabel' => false,
                 'filter' =>['1'=>"Active",'2'=>"Inactive"],
                   'filterInputOptions' => [
                            'class' => 'form-control form-control-lg', 
                           // 'id' => null
                        ],
                'headerOptions' => ['style'=>'width:10%;'],
                'format' => 'raw',
                 'value' => function ($data){
                  if($data->status=="1"){ 
                       return "Active";
                  }else{
                       return "Inactive";
                  }
                },   
              ],*/
              ['class' => 'yii\grid\ActionColumn',
                 'template' => '{view}{edit}',
                 'header'=>'Actions',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a ( '<i class="fa fa-street-view" aria-hidden="true"></i> ', ['contacts/view','id'=>$model['id']], ['title' => Yii::t('app', 'contacts-data-view'),
                            ]);
                        },
                        'edit' => function ($url, $model) {
                            return Html::a ( ' <i class="fa fa-edit" aria-hidden="true"></i>', ['contacts/update','id'=>$model['id'],'ismongo'=>!empty($model['mongo_status'])?1:0], ['title' => Yii::t('app', 'contacts-data-edit'),'onClick'=>'updateList('.$model['id'].')'
                            ]);                            
                        },
                    ],
                ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
  </div>
  </div>
                
            </section>
        </div>
    </div>
</div>
