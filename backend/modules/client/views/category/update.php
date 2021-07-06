<?php

/**
 * @var $this       yii\web\View
 * @var $model      common\models\ArticleCategory
 * @var $categories common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Data Category',
    ]) . ' ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Data Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

?>

<?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
    'templete_arr' => $templete_arr,
    'formdataProvider' => $formdataProvider
]) ?>
