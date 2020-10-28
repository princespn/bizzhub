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
            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('frontend', 'Documents'), 'url' => ['#', 'slug'=>'about']],
            ['label' => Yii::t('frontend', 'Resources'), 'url' => ['#']],
            ['label' => Yii::t('frontend', 'Training'), 'url' => ['#']],
            ['label' => Yii::t('frontend', 'Contacts'), 'url' => ['/contacts']],
            ['label' => Yii::t('frontend', 'Settings'), 'url' => ['#']],
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
<?php /*
<header class="sticky">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
          <?=Html::a(Html::img('@web/img/logo.png'), 'javascript:void(0)', ['class'=>'navbar-brand']);?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <ul class="navbar-nav right-nav  ml-auto">
              <li class="nav-item">
                <?=Html::a('Home', Yii::$app->homeUrl, ['class'=>'nav-link']);?>
              </li>
              <li class="nav-item">
                <?=Html::a('Documents', 'javascript:void(0)', ['class'=>'nav-link']);?>
              </li>

              <li class="nav-item">
                <?=Html::a('Resources', 'javascript:void(0)', ['class'=>'nav-link']);?>
              </li>
              <li class="nav-item">
                <?=Html::a('Training', 'javascript:void(0)', ['class'=>'nav-link']);?>
              </li>
              <li class="nav-item">
                <?=Html::a('Contacts', Url::to(['contacts/index']), ['class'=>'nav-link']);?>
              </li>
              <li class="nav-item">
                <?=Html::a('Settings', 'javascript:void(0)', ['class'=>'nav-link']);?>
              </li>
            </ul>
            <div class="dropdown user-dropdown">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">     <?php echo Html::img('@web/img/user.png'); ?>
              </button>
              <div class="dropdown-menu">
                <?=Html::a('Link 1', 'javascript:void(0)', ['class'=>'dropdown-item']);?>
                <?=Html::a('Link 2', 'javascript:void(0)', ['class'=>'dropdown-item']);?>
                <?=Html::a('Link 3', 'javascript:void(0)', ['class'=>'dropdown-item']);?>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
*/ ?>

<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <?php /*<div class="d-flex flex-row justify-content-between">
            <div>&copy; My Company <?php echo date('Y') ?></div>
            <div><?php echo Yii::powered() ?></div>
        </div>*/ ?>
    </div>
</footer>
<?php $this->endContent() ?>