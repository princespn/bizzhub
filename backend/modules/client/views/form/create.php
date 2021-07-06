<?php

/**
 * @var $this       yii\web\View
 * @var $model      common\models\Article
 * @var $categories common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Form',
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Form'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo $this->render('_form', [
    'model' => $model,
    'formField' => $formField,
    'templete_array' => $templete_array,
    'category_array' => $category_array
]) ?>
