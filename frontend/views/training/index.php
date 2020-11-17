<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap4\Modal;

$this->title = Yii::$app->name.' Training';
?>

<div class="container">
    <div class="row">
        <?php 
        foreach ($trainingData as $key => $value) { ?>
            <div class="col-md-6">
            <div class="level-0">
                <div class="lele-boxxx">
                    <h4><?=ucfirst($value['title'])?></h4>
                </div>
                <div class="text-boxx"><?=substr($value['description'], 0, 300)?></div>
                <div style="text-align: center; margin-bottom: 30px;">
                    <?= Html::a('Open', $value['external_link'], ['class'=>'btn--boxxxx', 'target'=>'blank']) ?>
                </div>
            </div>
        </div><?php
        } ?>        
    </div>
</div>