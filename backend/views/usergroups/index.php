<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\UsergroupsSearch;
use backend\modules\rbac\models\RbacAuthItem;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseordersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backend Permission';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-heading">
    <h4>
       <!--  <?= $this->title; ?> -->
    </h4>
</div>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">
                    <?php  
                    $EmptyModel = UsergroupsSearch::find()->count();
                    if ($EmptyModel > 0) { ?>
                	<?= GridView::widget([
							'dataProvider' => $dataProvider,
							'filterModel' => $searchModel,
							'rowOptions'   => function ($model, $key, $index, $grid) {
								return ['data-id' => $model->name, 'class'=> 'grid_row'];
							},
							'columns' => [
								['header' => 'No',
									'class' => 'yii\grid\SerialColumn'],

						'name:ntext:Name',



							],
						]); ?>
                        <?php }  else { ?>
                               <span colspan="8">You have no user groups. You can start adding user group by clicking on
                                <a href="<?= Yii::$app->urlManager->createUrl('usergroups/new');?>">New User Group</a></span>
                                <?php } ?>
                  </div>



          </section>
        </div>
    </div>
    
</div>

<?php
$this->registerJs("

    $('tbody td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this && id != undefined)
            location.href = '" . Url::to(['usergroups/update']) . "?name=' + id;
    });

",$this::POS_READY);





