<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usergroups */

//$this->title = 'New User Role';
//$this->params['breadcrumbs'][] = ['label' => 'User Roles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-heading">
    <h4>
      <!--   <?= $this->title; ?> -->
    </h4>
</div>


<div id="main">
<?= $this->render('_form', [
            'model' => $model
        ]) ?>
</div>
