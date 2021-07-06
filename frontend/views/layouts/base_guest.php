<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

//use yii\bootstrap4\Nav;
//use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

$this->beginContent('@frontend/views/layouts/_clear_guest.php');
//echo Yii::$app->homeUrl;die;
//print_r(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));die;
$admin_visible = $client_visible = 0;
if(Yii::$app->user->can('admin') || Yii::$app->user->can('agent')){
    $admin_visible = 1;
} else{
    $client_visible = 1;
}
?>
<div class="wrapper" style="height: auto; min-height: 100%;">
    <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo">
           <!-- mini logo for sidebar mini 50x50 pixels -->
           <span class="logo-mini"><?=Html::img('@web/img/dark-logo.png')?></span>
           <!-- logo for regular state and mobile devices -->
           <span class="logo-lg"><?=Html::img('@web/img/logo_new.png')?></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php /*<nav class="navbar navbar-static-top">
           <!-- Sidebar toggle button-->
           <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
           <!-- <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span> -->
           <span><i class="fa fa-bars"></i></span>
           </a>
           <div class="main-title-eading">
              <h1>Setting</h1>
           </div>

           <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                 <!-- Notifications: style can be found in dropdown.less -->
                 <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                        <?=Html::img('@web/img/navigation/Component 132 – 49.png')?>
                        <span class="label label-warning">10</span>
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
                       <li class="footer"><a href="#">View all</a></li>
                    </ul>
                 </li>
                 <!-- User Account: style can be found in dropdown.less -->
                 <li class="dropdown user user-menu">
                    <a href="#" class=" profil-demo dropdown-toggle" data-toggle="dropdown">
                       <div class="hidden-xs">
                          <p>Jordar nilsen</p>
                          <span>Agent</span>
                       </div>
                        <?=Html::img('@web/img/navigation/Group 4563.png',['class'=>'user-image','alt'=>'User Image'])?>
                       <!--  <i class="fa fa-sort-down"></i> -->
                    </a>
                    <ul class="dropdown-menu">
                       <!-- User image -->
                        <li class="user-header">
                            <?=Html::img('@web/img/user_img.png',['class'=>'img-circle','alt'=>'User Image'])?>
                          <p>
                             Alexander Pierce - Web Developer
                             <small>Member since Nov. 2012</small>
                          </p>
                       </li>
                       <!-- Menu Body -->
                       <li class="user-body">
                          <div class="row">
                             <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                             </div>
                             <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                             </div>
                             <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                             </div>
                          </div>
                          <!-- /.row -->
                       </li>
                       <!-- Menu Footer-->
                       <li class="user-footer">
                          <div class="pull-left">
                             <a href="#" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          <div class="pull-right">
                             <a href="#" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                       </li>
                    </ul>
                 </li>
                 <!-- Control Sidebar Toggle Button -->
              </ul>
           </div>*/ ?>
        </nav>
    </header>
<?php 
//$this->beginContent('@frontend/views/layouts/sidebar.php'); ?>
<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>
<?php $this->endContent() ?>
</div>
<script >
(function() {
     $('#bootstrap, #foundation').sortable({
       placeholder: 'placeholder',
       connectWith: '.widget-container',
       handle: '.widget-body-table',
       cursor: 'move'
     });
     
     }).call(this);
  </script> 
  <script>
     $('.header').affix({offset: {top: 10} });
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


<style type="text/css">
  .site-login.mt-5 .row{
margin: 0px!important;
  }
  .main-header .logo {
    -webkit-transition: width .3s ease-in-out;
    -o-transition: width .3s ease-in-out;
    transition: width .3s ease-in-out;
    display: block;
    float: none;
    min-height: 70px;
    font-size: 20px;
    line-height: 60px;
    text-align: center;
    width: 260px;
    padding: 15px 15px;
    font-weight: 300;
    overflow: hidden;
    text-align: center;
    margin: auto;
}
.form-control label, .form-control{
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.form-group label{
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
}
.form-group{
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
}</style>