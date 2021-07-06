<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\ClientData;
use common\models\ClientForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ClientData */

$this->title = 'File View';
$this->params['breadcrumbs'][] = ['label' => 'Client Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

 $ClientDataa=ClientData::find()->where(['form_id'=>$_REQUEST['form_id']])->All(); 

?>
<div class="client-data-view">
    <p>
        <?php /* Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])*/?>
    </p>

    <?php /* DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'field_id',
            'value:ntext',
            'form_id',
            'user_id',
            'created_at',
            'updated_at',
        ],
    ]) */?>
    <?= DetailView::widget([
    'model'      => $model,
    'attributes' => [
       // 'id',
        // [
        //     'label'  => 'Field',
        //     'value'  => $model->getField($model->field_id),
        // ],
        // [
        //     'label'  => 'Value',
        //     'format' => 'html',
        //     'value'  => $model->getValueView($model->value),
        // ],
        [
            'label'  => 'Form Name',
            'value'  => $model->getFormName($model->form_id),
        ],
        [
            'label'  => 'User Name',
            'value'  => User::find()->where(['id'=>$model->user_id])->one()->username,
        ],
        // [
        //     'label'  => 'Created Date',
        //     'value'  => date('Y-m-d H:m:s a',$model->created_at),
        // ],
        // [
        //     'label'  => 'Updated Date',
        //     'value'  => date('Y-m-d H:m:s a',$model->updated_at),
        // ],
    ],
]) ?>
<h4>Details</h4>
<table class="table table-striped table-bordered detail-view">
    <tr>
        <th>Field Name</th>
        <th>Value</th>
    </tr><?php 
    foreach ($ClientDataa as $key => $value) {
        $ClientFormData=ClientForm::find()->where(['id'=>$value['field_id']])->One();
        if (preg_match('/(\.jpg|\.png|\.bmp|\.jpeg|\.pdf)$/i', $value['value'])) {
            $http = Yii::$app->params['http'];
            $client_attatch_path = Yii::$app->params['client_attatch_path'];
            $url = Url::base($http);
            $field_value = '<a href="'.$url.'/../'.'storage/web/client_attachments/'.$value['value'].'" target="_blank">'.$value['value'].'</a>';
        }else{
            $val = json_decode($value['value']);
            if (is_array($val)) 
            { 
                $field_value = implode(', ', $val);
            }else{
                $field_value = $value['value'];
            }

        }

        ?>
        <tr>
            <td><?=$ClientFormData['value'];?></td>
            <td><?=$field_value;?></td>
        </tr>
    <?php } ?>
</table> 
</div>
<?php 
/* foreach ($ClientDataa as $key => $value) {
  $ClientFormData=ClientForm::find()->where(['id'=>$value['field_id']])->One();
   ?>
 <div class="form-row">
 <div class="col-sm-6"><?php echo $ClientFormData['value']; ?></div>
 <div class="col-sm-6"><?php echo $value['value']; ?><br></div>
</div>      
 <?php  } */?>

