<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientData */

// $this->title = 'Create Client Data';
// $this->params['breadcrumbs'][] = ['label' => 'Client Datas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-data-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
