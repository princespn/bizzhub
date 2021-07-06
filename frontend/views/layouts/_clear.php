<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Yii::$app->name ?> | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
</head>
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
	<?php $this->beginBody() ?>
	    <?php echo $content ?>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
