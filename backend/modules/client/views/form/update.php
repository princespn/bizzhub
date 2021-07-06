<?php

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var common\models\ArticleCategory[] $categories
 */
$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Form',
    ]) . ' ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Form'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

?>

<?php echo $this->render('_form', [
    'model' => $model,
    'formField' => $formField,
    'templete_array' => $templete_array,
    'category_array' => $category_array,
    'fieldsataProvider' => $fieldsataProvider,
]) ?>
