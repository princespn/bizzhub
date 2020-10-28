<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
//$this->registerCssFile("@web/css/front/style.css");
    $this->registerCssFile("@web/css/font-awesome.css");
    $this->registerCssFile("@web/css/style.css"); 
    $this->registerCssFile("@web/css/responsive.css");     
    $this->registerCssFile("@web/css/bootstrap.min.css");
    
//////////////js
    $this->registerJsFile('@web/js/jquery.min.js');
    $this->registerJsFile('@web/js/bootstrap.min.js');
    $this->registerJsFile('@web/js/popper.min.js');
    /////end
$this->beginContent('@frontend/views/layouts/base.php')
?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="">

    <?php echo Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?php if(Yii::$app->session->hasFlash('alert')):?>
        <?php echo \yii\bootstrap4\Alert::widget([
            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
        ])?>
    <?php endif; ?>

    <!-- Example of your ads placing -->
    <?php echo \common\widgets\DbText::widget([
        'key' => 'ads-example'
    ]) ?>

    <?php echo $content ?>
</div>
<?php $this->endContent() ?>