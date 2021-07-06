
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;



$this->title = Yii::t('backend', 'Create Email Template');
$this->params['breadcrumbs'][] = ['label' => 'Email Template', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--body wrapper start-->
<div class="wrapper">
      <section class="panel">       
            <div class="tab-content padding tab-content-inline tab-content-bottom">
                <div class="tab-pane active" id="personaldetails">
                    <?= $this->render('_form', [ 'model' => $model, 'id'=>0]) ?>

                </div>                                
            </div>
              </section>
        </div>
</div>
<!--body wrapper end-->