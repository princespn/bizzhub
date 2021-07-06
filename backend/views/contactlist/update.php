<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactList */

$this->title = Yii::t('backend', 'Update ');
$this->params['breadcrumbs'][] = ['label' => 'Contacts List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-list-update">
    <?= $this->render('_form', [
        'model' => $model,
        'agent_array'=>$agent_array,
        'id'=>0
    ]) ?>

</div>
