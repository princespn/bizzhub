<?php
use trntv\filekit\widget\Upload;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
/**
 * @var $this       yii\web\View
 * @var $model      common\models\Article
 * @var $categories common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'CSV {modelClass}', [
    'modelClass' => 'Import',
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Leaderboard'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



 $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>

 	<div>
		<?= $form->field($model, 'csv_file')->fileInput() ?>
	</div>
		<hr>
		<div>
		<?php  echo Html::submitButton('Upload CSV',array("class"=>"")); ?>
	</div>

      <?php ActiveForm::end(); ?>
