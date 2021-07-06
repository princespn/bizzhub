<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use yii\helpers\Url;
use common\models\ClientForm;
use common\models\ClientDataForm;
use common\models\ClientData;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::t('app', 'Branches');
//$this->params['breadcrumbs'][] = $this->title;
//print_r($model);die;
?>
<div class="wrapper">
    <div class="row">
        <div class="col-12  panel">                           
            <?php  echo $this->render('_searchclientdata', ['model' => $searchModel]); ?>
        </div>
        <div class="col-sm-12">
            <section class="panel">
                <br>
                <div class="panel-body">


    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             // 'id',
            //'field_id',
            // [
            //   'label' => 'Field',
            //   'encodeLabel' => false,
            //   'contentOptions' => [ 'style' => 'text-align:center' ],
            //   'attribute' => 'field_id', 
            //   'format' => 'raw',               
            //   'value' => function ($data){  
            //     if($data->field_id!=""){
            //       $UserData= ClientForm::find()->where(['id'=>$data->field_id])->one();
            //       return $UserData['value'];
            //     }
            //   },
            // ],

            // [
            //   //'label' => 'value',
            //   //'encodeLabel' => false,
            //   //'contentOptions' => [ 'style' => 'text-align:center' ],
            //   'attribute' => 'value', 
            //   'format' => 'raw',               
            //   'value' => function ($model){  
            //     if($model->value!=""){
            //       return $model->getValue($model->value);
            //     }
            //   },
            // ],

            //'value:ntext',
           // 'form_id',
            [
              'label' => 'Folder Status',
              'encodeLabel' => false,
              'contentOptions' => [ 'style' => '' ],
              'attribute' => 'folder_status', 
              'format' => 'raw',               
              'value' => function ($data){  
                if($data->folder_status!=""){
                  $status_image= ClientData::getFolderStatusImage($data->folder_status,$data->form_id);
                  return $status_image;
                }
              },
            ],
            [
              'label' => 'Form Name',
              'encodeLabel' => false,
              'contentOptions' => [ 'style' => '' ],
              'attribute' => 'form_id', 
              'format' => 'raw',               
              'value' => function ($data){  
                if($data->form_id!=""){
                  $UserData= ClientDataForm::find()->where(['id'=>$data->form_id])->one();
                  return $UserData['name'];
                }
              },
            ],
            //'user_id',
            [
              'label' => 'User Name',
              'encodeLabel' => false,
              'contentOptions' => [ 'style' => '' ],
              'attribute' => 'user_id', 
              'format' => 'raw',               
              'value' => function ($data){  
                if($data->user_id!=""){
                  $UserData= User::find()->where(['id'=>$data->user_id])->one();
                  return $UserData['username'];
                }
              },
            ],
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
              'template' => '{View}',
              'buttons' => [
                 'View' => function ($url, $model) {
                     $url = Url::to(['clientdata/view', 'id' => $model->id,'form_id' => $model->form_id]);
                    return Html::a('<i class="fas fa-eye"></i>', $url, ['title' => 'View']);
                 },
              ]
          ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>
                
                </div>
                
            </section>
        </div>
    </div>
</div>

