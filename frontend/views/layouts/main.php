<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\ArrayHelper;
use yii\bootstrap4\Breadcrumbs;
//$this->registerCssFile("@web/css/front/style.css");
    $this->registerCssFile("@web/css/font-awesome.css");

   
    //$this->registerCssFile("@web/css/style.css");
    $this->registerCssFile("@web/css/style01.css");  
    $this->registerCssFile("@web/css/bootstrap.min.css");
    $this->registerCssFile("@web/css/owl.carousel.min.css");
    $this->registerCssFile("@web/css/owl.theme.css");
    $this->registerCssFile("@web/css/AdminLTE.css");
    $this->registerCssFile("@web/css/_all-skins.css");
     $this->registerCssFile("@web/css/responsive.css");
    
//////////////js
    $this->registerJsFile('@web/js/jquery.min.js',['position' => $this::POS_HEAD]);
    $this->registerJsFile('@web/js/bootstrap.min.js',['position' => $this::POS_HEAD]);
    $this->registerJsFile('@web/js/adminlte.js',['position' => $this::POS_HEAD]);
    //$this->registerJsFile('@web/js/demo.js',['position' => $this::POS_HEAD]);
    $this->registerJsFile('@web/js/jquery-ui.min.js',['position' => $this::POS_HEAD]);
    $this->registerJsFile('@web/js/owl.carousel.min.js',['position' => $this::POS_HEAD]);
    $this->registerJsFile('@web/js/jquery-1.11.3.js');
    /////end
$this->beginContent('@frontend/views/layouts/base.php')
?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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