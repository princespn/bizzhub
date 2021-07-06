<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Buildings;
use yii\helpers\Url;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend',  'Import');
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$limit = Yii::$app->params['contact_limit'];
$offset = Yii::$app->params['contact_offset'];
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<div class="buildings-create">    
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body"> 
                <h4>Import with Follow Up Boss API</h4>
                <div class="form-row">                    
                    <div class="form-group col-md-6">
                        <label for="limit" class="label">Limit</label>
                        <input type="number" name="limit" id="limit" class="form-control" required value="0">
                        <span>Please do not enter more than 100</span>
                    </div>                    
                    <div class="form-group col-md-6">
                        <label for="offset" class="label">Offset</label>
                        <input type="number" name="offset" id="offset" class="form-control" required value="0">
                    </div>
                </div>
            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Import'), ['class' => 'btn btn-primary', 'value'=>'api', 'name' => 'import']) ?>                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>


    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body"> 
                <h4>Import with MongoDB</h4>
            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', 'Import'), ['class' => 'btn btn-primary', 'value'=>'mongo', 'name' => 'import']) ?>                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>