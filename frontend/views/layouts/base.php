<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<header class="sticky">
  <div class="container-fluid">
    <?php NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.png'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ['navbar navbar-expand-lg'],
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => ['navbar-nav', 'justify-content-end', 'ml-auto']],
        'items' => [
            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/home']],
            ['label' => Yii::t('frontend', 'Documents'), 'url' =>['/document']],
            ['label' => Yii::t('frontend', 'Resources'), 'url' => 'javascript:void(0)'],
            ['label' => Yii::t('frontend', 'Training'), 'url' => ['/training']],
            ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/contacts']],
            ['label' => Yii::t('frontend', 'Settings'), 'url' => 'javascript:void(0)'],
            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                'visible'=>!Yii::$app->user->isGuest,
                'items'=>[
                    [
                        'label' => Yii::t('frontend', 'Settings'),
                        'url' => ['/user/default/index']
                    ],
                    [
                        'label' => Yii::t('frontend', 'Backend'),
                        'url' => Yii::getAlias('@backendUrl'),
                        'visible'=>Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/user/sign-in/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ],
            /*[
                'label'=>Yii::t('frontend', 'Language'),
                'items'=>array_map(function ($code) {
                    return [
                        'label' => Yii::$app->params['availableLocales'][$code],
                        'url' => ['/site/set-locale', 'locale'=>$code],
                        'active' => Yii::$app->language === $code
                    ];
                }, array_keys(Yii::$app->params['availableLocales']))
            ]*/
        ]
    ]); ?>
    <?php NavBar::end(); ?>
  </div>
</header> 

<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>
<script type="text/javascript">
$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});
</script>
<footer class="footer mt-auto py-3">
    <div class="container">
        <?php /*
        <div class="d-flex flex-row justify-content-between">
            <div>&copy; My Company <?php echo date('Y') ?></div>
            <div><?php echo Yii::powered() ?></div>
        </div> */ ?>
    </div>
</footer>
<?php $this->endContent() ?>