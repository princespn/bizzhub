<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usergroups */

//print_r($model->name);die;
$this->title = 'Update '.$model->name.' Permission';
$this->params['breadcrumbs'][] = ['label' => 'User Roles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div id="main">
	<?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
