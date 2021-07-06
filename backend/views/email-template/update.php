<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactList */

$this->title = Yii::t('backend', 'Update Email Template');
$this->params['breadcrumbs'][] = ['label' => 'Email Template List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-list-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
