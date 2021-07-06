<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

//use yii\bootstrap4\Nav;
//use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\TimelineEvent;
use yii\db\ActiveRecord;
use yii\db\Query;

$this->beginContent('@frontend/views/layouts/_clear.php');
//print_r(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));die;
$admin_visible = $client_visible = 0;
if(Yii::$app->user->can('admin') || Yii::$app->user->can('agent')){
    $admin_visible = 1;
} else{
    $client_visible = 1;
}
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
?>
<div class="wrapper" style="height: auto; min-height: 100%;">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?=Url::toRoute('home/index', true);?>" class="logo">
           <!-- mini logo for sidebar mini 50x50 pixels -->
           <span class="logo-mini"><?=Html::img('@web/img/dark-logo.png')?></span>
           <!-- logo for regular state and mobile devices -->
           <span class="logo-lg"><?=Html::img('@web/img/logo_new.png')?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
           <!-- Sidebar toggle button-->
           <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
           <!-- <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span> -->
           <span><i class="fa fa-bars"></i></span>
           </a>
           <div class="main-title-eading">
              <h1><?=$this->title?></h1>
           </div>
           <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                 <!-- Notifications: style can be found in dropdown.less -->
                 <li class="dropdown notifications-menu">
                    <a href="#" class=" " data-toggle="dropdown">
                        <?=Html::img('@web/img/navigation/Component 132 – 49.png')?>
                        <span class="label label-warning"><?=TimelineEvent::find()->today()->count()?></span>
                    </a>
                    <ul class="dropdown-menu">
                       <li class="header">You have 10 notifications</li>
                       <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                             <li>
                                <a href="#">
                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                             </li>

                          </ul>
                       </li>
                       <li class="footer"><a href="#">View all <i class="ti-angle-right"></i></a></li>
                    </ul>
                 </li>
                 <!-- User Account: style can be found in dropdown.less -->
                 <li class="dropdown user user-menu">
                    <a href="#" class=" profil-demo dropdown-toggle" data-toggle="dropdown">
                       <div class="hidden-xs">
                          <?=Html::tag('p', Yii::$app->user->identity->publicIdentity)?>
                          <span>Agent</span>
                       </div>
                       <?=Html::img(Yii::$app->user->identity->userProfile->getAvatar('/img/anonymous.png'), ['class' => ['user-image'], 'alt' => 'User imagesss'])?>
                       <!--  <i class="fa fa-sort-down"></i> -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <?=Html::img(Yii::$app->user->identity->userProfile->getAvatar('/img/anonymous.png'), ['class' => ['img-circle', 'elevation-2', 'bg-white'], 'alt' => 'User image'])?>
                            <p>
                                <?=Yii::$app->user->identity->publicIdentity.'
                                <small>'.Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at).'</small>'?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <?=Html::a(Yii::t('frontend', 'Profile'), ['/user/default/index'], ['class' => 'btn btn-default btn-flat'])?>
                            </div>
                            <div class="float-right">
                                <?=Html::a(Yii::t('frontend', 'Logout'), ['/user/sign-in/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post'])?>
                            </div>
                        </li>
                    </ul>
                 </li>
                 <!-- Control Sidebar Toggle Button -->
              </ul>
           </div>
        </nav>
    </header>
<?php $this->beginContent('@frontend/views/layouts/sidebar.php'); ?>
<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>
<?php $this->endContent() ?>
</div>
  <script>
     //$('.header').affix({offset: {top: 10} });
  </script>
  <script>
     $(document).ready(function () {
       $('.navbar .dropdown').hover(function () {
         $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
     }, function () {
         $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
     });
     });
     
</script>