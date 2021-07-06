<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
?>
<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
       <ul class="sidebar-menu tree" data-widget="tree">
          <h4>Main Menu</h4>
          <li class="">
             <a href="<?=$base_url.'/home/index'?>">
              <i class="fa fa-bolt"></i>
                <span class="hovershow">Listing</span>
             </a>
          </li>
          <li class="">
             <a href="contact.html">
             <i class="fa fa-phone-alt"></i>



                <span class="hovershow">Contact</span>
                <span class="bg-success btn-multicolor">240</span>
             </a>
          </li>
          <li class="">
             <a href="<?=$base_url.'/leaderboard/index'?>">
              <i class="fa fa-signal"></i>
                <span class="hovershow">Leaderboard</span>
                <span class="bg-danger btn-multicolor">New</span>
             </a>
          </li>
          <li class="">
             <a href="<?=$base_url.'/training/index'?>">
              <i class="fa fa-graduation-cap"></i>
                <span>Training</span>
             </a>
          </li>
          <li class="">
             <a href="<?=$base_url.'/document/index'?>">
             <i class="fas fa-file-alt"></i>
                <span class="hovershow">Documnets</span>
             </a>
          </li>
          <li class="">
             <a href="resouces.html">
              
<i class="fas fa-coins"></i>

                <span class="hovershow">Resources</span>
             </a>
          </li>
          <li class="">
             <a href="setting.html">
              <i class="fas fa-cog"></i>

                <span class="hovershow">Setting</span>
                <span class="bg-warning btn-multicolor"> !</span>
             </a>
          </li>
          <li class="tech-support">
             <a href="tech-support.html" class="tech-support11">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-headset fa-w-16 fa-3x">
                   <path fill="currentColor" d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z" class=""></path>
                </svg>
                <div class="text-content">
                   <h6>Tech Support</h6>
                   <p>Help & Support 24/7</p>
                </div>
             </a>
          </li>          
       </ul>
    </section>
 </aside>
 <?php echo $content ?>
<?php $this->endContent() ?>