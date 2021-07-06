<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use common\models\UserProfile;
use common\models\User;
use yii\bootstrap4\LinkPager;
$this->title = 'Listings';
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
$paths =  Yii::getAlias('@web').'/frontend/web/img/'; 
?>
<div class="content-wrapper" style="min-height: 902.8px;">
  <div class="dashboard_right_detail">
     <div class="listing-page">
        <div class="button-tab-outer">
           <div class="tab-section-listing">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                 <li role="presentation" class="active"><a href="#alllisting" aria-controls="profile" role="tab" data-toggle="tab">All Listing</a></li><?php /*
                 <li role="presentation"><a href="#active" aria-controls="messages" role="tab" data-toggle="tab">Active</a></li>
                 <li role="presentation"><a href="#inactive" aria-controls="messages" role="tab" data-toggle="tab">Inactive</a></li>
                 <li role="presentation" ><a href="#upcomming" aria-controls="home" role="tab" data-toggle="tab">Upcomming</a></li>*/ ?>
              </ul>
           </div>
           <div class="tab-btn-section">
              <ul><?php /*
                 <li>
                    <button class="btn btn-blueee">
                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 448 448" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g>
                             <path xmlns="http://www.w3.org/2000/svg" d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0" fill="#000000" data-original="#000000" style=""></path>
                          </g>
                       </svg>
                       Add a Listing
                    </button>
                 </li>
                 <li>
                    <button class="btn btn-blueee light-blue">
                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g transform="matrix(-1,-1.2246467991473532e-16,1.2246467991473532e-16,-1,512,512)">
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <path d="M507.296,4.704c-3.36-3.36-8.032-5.056-12.768-4.64L370.08,11.392c-6.176,0.576-11.488,4.672-13.6,10.496    s-0.672,12.384,3.712,16.768l33.952,33.952L224.448,242.272c-6.24,6.24-6.24,16.384,0,22.624l22.624,22.624    c6.272,6.272,16.384,6.272,22.656,0.032l169.696-169.696l33.952,33.952c4.384,4.384,10.912,5.824,16.768,3.744    c2.24-0.832,4.224-2.112,5.856-3.744c2.592-2.592,4.288-6.048,4.608-9.888l11.328-124.448    C512.352,12.736,510.656,8.064,507.296,4.704z" fill="#000000" data-original="#000000" style="" class=""></path>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <path d="M448,192v256H64V64h256V0H32C14.304,0,0,14.304,0,32v448c0,17.664,14.304,32,32,32h448c17.664,0,32-14.336,32-32V192H448z    " fill="#000000" data-original="#000000" style="" class=""></path>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                          </g>
                       </svg>
                       Import Listings
                    </button>
                 </li> */ ?>
                 <li>
                 <?php $form = ActiveForm::begin(['id' => 'pro-search-form']); ?>
                    <div class="listing-search">
                       <input autocomplete="off" type="search" id="query" name="q" placeholder="Search...">
                       <?=Html::img('@web/img/resources/Group 4551.png',['id'=>'search-form-submit'])?>
                    </div>
                    <?php ActiveForm::end(); ?>
                 </li>
                 <li >
                    <button class="btn btn-blueee whiteee" >
                       <span>2</span>
                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g>
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <path d="M490.667,405.333h-56.811C424.619,374.592,396.373,352,362.667,352s-61.931,22.592-71.189,53.333H21.333    C9.557,405.333,0,414.891,0,426.667S9.557,448,21.333,448h270.144c9.237,30.741,37.483,53.333,71.189,53.333    s61.931-22.592,71.189-53.333h56.811c11.797,0,21.333-9.557,21.333-21.333S502.464,405.333,490.667,405.333z M362.667,458.667    c-17.643,0-32-14.357-32-32s14.357-32,32-32s32,14.357,32,32S380.309,458.667,362.667,458.667z" fill="#000000" data-original="#000000" style="" class=""></path>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <path d="M490.667,64h-56.811c-9.259-30.741-37.483-53.333-71.189-53.333S300.736,33.259,291.477,64H21.333    C9.557,64,0,73.557,0,85.333s9.557,21.333,21.333,21.333h270.144C300.736,137.408,328.96,160,362.667,160    s61.931-22.592,71.189-53.333h56.811c11.797,0,21.333-9.557,21.333-21.333S502.464,64,490.667,64z M362.667,117.333    c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32s32,14.357,32,32C394.667,102.976,380.309,117.333,362.667,117.333z" fill="#000000" data-original="#000000" style="" class=""></path>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <path d="M490.667,234.667H220.523c-9.259-30.741-37.483-53.333-71.189-53.333s-61.931,22.592-71.189,53.333H21.333    C9.557,234.667,0,244.224,0,256c0,11.776,9.557,21.333,21.333,21.333h56.811c9.259,30.741,37.483,53.333,71.189,53.333    s61.931-22.592,71.189-53.333h270.144c11.797,0,21.333-9.557,21.333-21.333C512,244.224,502.464,234.667,490.667,234.667z     M149.333,288c-17.643,0-32-14.357-32-32s14.357-32,32-32c17.643,0,32,14.357,32,32S166.976,288,149.333,288z" fill="#000000" data-original="#000000" style="" class=""></path>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                          </g>
                       </svg>
                    </button>
                 </li>
                 <li class="div-none-none">
                    <button class="btn btn-blueee whiteee">
                    <a href="<?=$base_url.'/home/index?v=list'?>">
                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g>
                             <path xmlns="http://www.w3.org/2000/svg" d="m362.667969 0h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" fill="#000000" data-original="#000000" style="" class=""></path>
                             <path xmlns="http://www.w3.org/2000/svg" d="m362.667969 128h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" fill="#000000" data-original="#000000" style="" class=""></path>
                             <path xmlns="http://www.w3.org/2000/svg" d="m362.667969 256h-341.335938c-11.753906 0-21.332031 9.578125-21.332031 21.332031v42.667969c0 11.753906 9.578125 21.332031 21.332031 21.332031h341.335938c11.753906 0 21.332031-9.578125 21.332031-21.332031v-42.667969c0-11.753906-9.578125-21.332031-21.332031-21.332031zm0 0" fill="#000000" data-original="#000000" style="" class=""></path>
                          </g>
                       </svg>
                       </a>
                    </button>
                 </li>
                 <li>
                    <button class="btn btn-blueee whiteee">
                    <a href="<?=$base_url.'/home/index?v=grid'?>">
                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                          <g>
                             <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                   <g>
                                      <path d="M187.628,0H43.707C19.607,0,0,19.607,0,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921     c24.1,0,43.707-19.607,43.707-43.707V43.707C231.335,19.607,211.728,0,187.628,0z" fill="#000000" data-original="#000000" style="" class=""></path>
                                      <path d="M468.293,0H324.372c-24.1,0-43.707,19.607-43.707,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921     c24.1,0,43.707-19.607,43.707-43.707V43.707C512,19.607,492.393,0,468.293,0z" fill="#000000" data-original="#000000" style="" class=""></path>
                                      <path d="M187.628,280.665H43.707C19.607,280.665,0,300.272,0,324.372v143.921C0,492.393,19.607,512,43.707,512h143.921     c24.1,0,43.707-19.607,43.707-43.707V324.372C231.335,300.272,211.728,280.665,187.628,280.665z" fill="#000000" data-original="#000000" style="" class=""></path>
                                      <path d="M468.293,280.665H324.372c-24.1,0-43.707,19.607-43.707,43.707v143.921c0,24.1,19.607,43.707,43.707,43.707h143.921     c24.1,0,43.707-19.607,43.707-43.707V324.372C512,300.272,492.393,280.665,468.293,280.665z" fill="#000000" data-original="#000000" style="" class=""></path>
                                   </g>
                                </g>
                             </g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                             <g xmlns="http://www.w3.org/2000/svg"></g>
                          </g>
                       </svg>
                       </a>
                    </button>
                 </li>
              </ul>
           </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content tabs div-none-none">
           <div role="tabpanel" class="tab-pane in active" id="alllisting">
              <div class="alll-listing">
                 <ul><?php
                  foreach($retsData as $key => $property){ ?>
                    <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo"><?php 
                              foreach($property['images'] as $images){ ?>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                        <?=Html::img($base_url.'/storage/web/rets/propery_image/large/'.$images['path'])?>
                                         <div class="text-active">
                                            <a href="#">Active</a>
                                         </div>
                                      </div>
                                   </div>
                                </div><?php 
                                } ?>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5><?=$property['address_with_unit']?></h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      <?=!empty($property['place_name'])?$property['place_name']:''?>
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1"><?=!empty($property['property_type'])?$property['property_type']:''?></button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      <?=!empty($property['num_bedrooms'])?$property['num_bedrooms'].' Bed':''?>
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      <?=!empty($property['num_baths'])?$property['num_baths'].' Bath':''?> 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         <?=!empty($property['vacant'])?'Vacant':'<del>Vacant</del>'?>
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         <?=!empty($property['rets_keys'])?'Keys':'<del>Keys</del>'?>                      
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         <?=!empty($property['building_pets'])?'Pets':'<del>Pets</del>'?>
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile"><?php
                                $agent_image ="";
                                 if(!empty($property['agent_image'])){
                                    $agent_image = $property['agent_image_base_url'].$property['agent_image'];
                                 } ?>
                                    <?=Html::img($agent_image)?>
                                   <div class="textlisting-profile">
                                      <p>Agent</p><?php
                                      $first_name = !empty($property['first_name'])?$property['first_name']:'';
                                      $last_name = !empty($property['last_name'])?$property['last_name']:'';?>
                                      <h6><?=$first_name.' '.$last_name?></h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6><?=!empty($property['hoa_fee'])?'$'.$property['hoa_fee']:'No'?></h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6><?=!empty($property['assessment_no'])?'$'.$property['assessment_no']:'No'?></h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6><?=!empty($property['maximum_financing_percent'])?$property['maximum_financing_percent'].'%':'No'?></h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <?php if(!empty($property['listing_price'])){
                                        if($property['listing_price'] > 1000){
                                          $lpk = $property['listing_price'] / 1000;
                                          $lp = $lpk.'K';
                                        }else{
                                          $lp = $property['listing_price'];
                                        }
                                        $listing_price = $lp;
                                      }else{
                                        $listing_price = 'No';
                                      }?>
                                      <h6><?=$listing_price?></h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                  <a href="<?=!empty($property['virtual_tour_url'])?$property['virtual_tour_url']:'javascript:void(0)'?>" target="_blank">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                    </a>
                                   </div>
                                   <div class="video-block">
                                    <a href="<?=!empty($property['video_url'])?$property['video_url']:'javascript:void(0)'?>" target="_blank">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                    </a>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li><?php 
                  } ?>
                 </ul>
              </div>
              <div class="pangination-style">
                <div class="Showing-data ">
                  <?php
                  $totalCount = $pages->totalCount;
                  $showThisPage = count($retsData);
                   ?>
                  <p>Showing <?=$showThisPage?> from <?=$totalCount?> data </p>
                </div><?php 
              echo LinkPager::widget([
                  'pagination' => $pages,
                  'prevPageLabel' => '<span aria-hidden="true">«</span>&nbsp;&nbsp;Previous',
                  'nextPageLabel' => 'Next&nbsp;&nbsp;<span aria-hidden="true">»</span>',
                  'maxButtonCount' => 4,
                  'options' => ['class' => 'nav-pagitnation'],
              ]); ?>
              </div>
           </div>
           <div role="tabpanel" class="tab-pane" id="active">
               <div class="aactive-listing alll-listing">
                 <ul>
                  <?php
                  foreach($retsData as $key => $property){
                   ?>
                    <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo"><?php 
                              foreach($property['images'] as $images){ ?>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                        <?=Html::img($base_url.'/storage/web/rets/propery_image/large/'.$images['path'])?>
                                         <div class="text-active">
                                            <a href="#">Active</a>
                                         </div>
                                      </div>
                                   </div>
                                </div><?php 
                                } ?>                                
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5><?=$property['address_with_unit']?></h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      <?=!empty($property['PlaceName'])?$property['PlaceName']:''?>
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1"><?=!empty($property['property_type'])?$property['property_type']:''?></button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      <?=!empty($property['num_bedrooms'])?$property['num_bedrooms'].' Bed':''?> 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      <?=!empty($property['num_baths'])?$property['num_baths'].' Bath':''?> 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                  <?=Html::img('@web/img/userpriofile1.png')?>
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6><?=!empty($property['assessment_no'])?'$'.$property['assessment_no']:'No'?></h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6><?=!empty($property['maximum_financing_percent'])?'$'.$property['maximum_financing_percent']:'No'?></h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6><?=!empty($property['listing_price'])?'$'.$property['listing_price']:'No'?></h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                    <a href="<?=!empty($property['virtual_tour_url'])?$property['virtual_tour_url']:'javascript:void(0)'?>" target="_blank">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                    </a>
                                   </div>
                                   <div class="video-block">
                                    <a href="<?=!empty($property['video_url'])?$property['video_url']:'javascript:void(0)'?>"  target="_blank">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                    </a>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li><?php 
                    } ?>
                 </ul>
              </div>
           </div>
           <div role="tabpanel" class="tab-pane " id="inactive">
               <div class="inactive-listing alll-listing">
                 <ul>
                    <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Active</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                        <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-inactive">
                                            <a href="#">Inactive</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>


                 </ul>
              </div>
           </div>
           <div role="tabpanel" class="tab-pane " id="upcomming">
              <div class="upcomming-listing alll-listing">
                 <ul>
                    <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                      <li>
                       <div class="outer-div-listing">
                          <div class="div-listing-left">
                             <div class="owl-demo">
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                         <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                                <div class="item">
                                   <div class="testimonial-carousel">
                                      <div class="client-img">
                                         <img src="images/slider3.jpg">
                                          <div class="text-upcooming">
                                            <a href="#">Upcomming</a>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <div class="div-listing-right">
                             <div class="items-1-listing">
                                <div class="items-1-listing-left">
                                   <h5>21-47  33rd St. 1f</h5>
                                   <div class="location-item">
                                      <h6>
                                      <span class="">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg">
                                                  <g>
                                                     <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                  </g>
                                               </g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                               <g xmlns="http://www.w3.org/2000/svg"></g>
                                            </g>
                                         </svg>
                                      </span>
                                      Washington Heights
                                      <h6>
                                   </div>
                                   <div class="button-co-op">
                                      <button class="btn button-co-op1">Co-op</button>
                                   </div>
                                </div>
                                <div class="dropdown img-dropdwon">
                                   <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?=Html::img('@web/img/resources/Group 4546.png')?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-2-listing">
                                <div class="button-group">
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                      1 Bed 
                                   </button>
                                   <button class="btn bn-bath">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <g>
                                                  <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               </g>
                                            </g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                            <g xmlns="http://www.w3.org/2000/svg"></g>
                                         </g>
                                      </svg>
                                      1 Bath 
                                   </button>
                                </div>
                                <div class="vacent-keys">
                                   <ul>
                                      <li class="active">
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Vacant
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         Keys
                                      </li>
                                      <li >
                                         <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                               <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                            </g>
                                         </svg>
                                         pets
                                      </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="items-3-listing">
                                <div class="listing-profile">
                                   <img src="images/userpriofile1.png">
                                   <div class="textlisting-profile">
                                      <p>Agent</p>
                                      <h6>Mathew Charless</h6>
                                   </div>
                                </div>
                                <div class="mantaincess-finance">
                                   <div class="mantaincess-1">
                                      <p>Maintenamce</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Assessment</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Financing</p>
                                      <h6>$982</h6>
                                   </div>
                                   <div class="mantaincess-1">
                                      <p>Price</p>
                                      <h6>$982</h6>
                                   </div>
                                </div>
                                <div class="listing-icon-videp">
                                   <div class="block-surface">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                         </g>
                                      </svg>
                                   </div>
                                   <div class="video-block">
                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                         <g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                            </g>
                                         </g>
                                      </svg>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
                <div class="tab-content tabs div-block-block">
            <div role="tabpanel" class="tab-pane fade in active" id="alllisting">
               <div class="alll-listing  gridsytem">
                  <ul>
                     <?php
                        foreach($retsData as $key => $property){ ?>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <?php 
                                    foreach($property['images'] as $images){ ?>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <?=Html::img($base_url.'/storage/web/rets/propery_image/large/'.$images['path'])?>
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                                   <div class="you-tube-link">
                                             <div class="listing-icon-videp1">
                                                <a href="" >
                                                </a>
                                                <div class="block-surface">
                                                   <a href="<?=!empty($property['virtual_tour_url'])?$property['virtual_tour_url']:'javascript:void(0)'?>" target="_blank">
                                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511.973 511.973" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                         <g>
                                                            <path xmlns="http://www.w3.org/2000/svg" d="m255.989 0-221.693 127.993v255.985l221.693 127.994 221.688-127.994v-255.985zm176.683 136.651-176.683 101.965-176.688-101.965 176.688-102.01zm-368.376 25.977 176.693 101.969v204.074l-176.693-102.013zm206.693 306.043v-204.074l176.688-101.968v204.03z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                         </g>
                                                      </svg>
                                                   </a>
                                                </div>
                                                <div class="video-block">
                                                   <a href="<?=!empty($property['video_url'])?$property['video_url']:'javascript:void(0)'?>" target="_blank">
                                                      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                         <g>
                                                            <g xmlns="http://www.w3.org/2000/svg">
                                                               <path d="m338.95 243.28-120-75c-4.625-2.89-10.453-3.043-15.222-.4-4.77 2.643-7.729 7.667-7.729 13.12v150c0 5.453 2.959 10.476 7.729 13.12 2.266 1.256 4.77 1.88 7.271 1.88 2.763 0 5.522-.763 7.95-2.28l120-75c4.386-2.741 7.05-7.548 7.05-12.72s-2.663-9.979-7.049-12.72zm-112.95 60.656v-95.873l76.698 47.937z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                               <path d="m437 61h-362c-41.355 0-75 33.645-75 75v240c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-240c0-41.355-33.645-75-75-75zm45 315c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-240c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                            </g>
                                                         </g>
                                                      </svg>
                                                   </a>
                                                </div>
                                             </div>
                                             <?php if(!empty($property['listing_price'])){
                                                      if($property['listing_price'] > 1000){
                                                         $lpk = $property['listing_price'] / 1000;
                                                         $lp = $lpk.'K';
                                                      }else{
                                                         $lp = $property['listing_price'];
                                                      }
                                                      $listing_price = $lp;
                                                   }else{
                                                      $listing_price = 'No';
                                                   }?>
                                             <h6><?=$listing_price?></h6>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    } ?>                                 
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       <?=$property['address_with_unit']?> <span>- <?=!empty($property['property_type'])?$property['property_type']:''?></span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       <?=!empty($property['num_bedrooms'])?$property['num_bedrooms'].' Bed':''?> 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       <?=!empty($property['num_baths'])?$property['num_baths'].' Bath':''?>  
                                    </button>
                                 </div>
                                 <div onclick="showProDetail(<?=$property['id']?>)" class="detail_view_arrow"><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="gv-pro-detail-<?=$property['id']?> gv-pr-hide">
                                 <div class="vacent-keys">
                                    <ul>
                                       <li class="active">
                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                             <g>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             </g>
                                          </svg>
                                          <?=!empty($property['vacant'])?'Vacant':'<del>Vacant</del>'?>
                                       </li>
                                       <li>
                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                             <g>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             </g>
                                          </svg>
                                          <?=!empty($property['rets_keys'])?'Keys':'<del>Keys</del>'?>
                                       </li>
                                       <li>
                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                             <g>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             </g>
                                          </svg>
                                          <?=!empty($property['building_pets'])?'Pets':'<del>Pets</del>'?>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="items-3-listing">
                                    <div class="mantaincess-finance">
                                       <div class="mantaincess-1">
                                          <p>Agent:</p>
                                          <?php
                                             $first_name = !empty($property['first_name'])?$property['first_name']:'';
                                             $last_name = !empty($property['last_name'])?$property['last_name']:'';?>
                                          <h6><?=$first_name.' '.$last_name?></h6>
                                       </div>
                                       <div class="mantaincess-1">
                                          <p>Maintenamce</p>
                                          <h6><?=!empty($property['hoa_fee'])?'$'.$property['hoa_fee']:'No'?></h6>
                                       </div>
                                    </div>
                                    <div class="mantaincess-finance">
                                       <div class="mantaincess-1">
                                          <p>Assessment</p>
                                          <h6><?=!empty($property['assessment_no'])?'$'.$property['assessment_no']:'No'?></h6>
                                       </div>
                                       <div class="mantaincess-1">
                                          <p>Financing</p>
                                          <h6><?=!empty($property['maximum_financing_percent'])?$property['maximum_financing_percent'].'%':'No'?></h6>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="showlesssss" onclick="hideProDetail(<?=$property['id']?>)" >Show less</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <?php
                        }?>
                  </ul>
               </div>
               <div class="pangination-style">
                  <?php
                     $totalCount = $pages->totalCount;
                     $showThisPage = count($retsData); ?>
                  <div class="Showing-data ">
                     <p>Showing <?=$showThisPage?> from <?=$totalCount?> data </p>
                  </div>
                  <?php 
                     echo LinkPager::widget([
                        'pagination' => $pages,
                        'prevPageLabel' => '<span aria-hidden="true">«</span>&nbsp;&nbsp;Previous',
                        'nextPageLabel' => 'Next&nbsp;&nbsp;<span aria-hidden="true">»</span>',
                        'maxButtonCount' => 4,
                        'options' => ['class' => 'nav-pagitnation'],
                     ]); ?>
               </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="active">
               <div class="alll-listing aactive-listing  gridsytem">
                  <ul>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                 
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="inactive">
               <div class="inactive-listing  alll-listing  gridsytem">
                  <ul>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="upcomming">
               <div class="alll-listing upcomming-listing gridsytem">
                  <ul>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="outer-div-listing">
                           <div class="div-listing-left">
                              <div class="owl-demo">
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="item">
                                    <div class="testimonial-carousel">
                                       <div class="client-img">
                                          <img src="images/slider3.jpg">
                                          <div class="text-active">
                                             <a href="#">Active</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="div-listing-right">
                              <div class="items-1-listing">
                                 <div class="items-1-listing-left">
                                    <h5>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M425.951,89.021C386.864,32.451,324.917,0,256.006,0S125.148,32.451,86.061,89.021    c-38.895,56.284-47.876,127.541-24.072,190.496c6.367,17.192,16.488,33.895,30.01,49.547l150.378,176.634    c3.401,3.998,8.384,6.302,13.629,6.302c5.245,0,10.228-2.303,13.629-6.302l150.336-176.586    c13.582-15.742,23.69-32.427,30.004-49.481C473.827,216.562,464.846,145.305,425.951,89.021z M416.451,267.093    c-4.869,13.158-12.818,26.167-23.613,38.68c-0.03,0.03-0.06,0.06-0.084,0.096L256.006,466.487L119.174,305.768    c-10.789-12.502-18.738-25.51-23.655-38.794c-19.686-52.065-12.215-110.981,19.991-157.592    c32.307-46.76,83.519-73.578,140.496-73.578c56.976,0,108.182,26.817,140.49,73.578    C428.708,155.993,436.185,214.909,416.451,267.093z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M256.006,106.219c-55.276,0-100.252,44.97-100.252,100.252s44.97,100.252,100.252,100.252s100.252-44.97,100.252-100.252    C356.258,151.195,311.282,106.219,256.006,106.219z M256.006,270.918c-35.536,0-64.448-28.912-64.448-64.448    c0-35.536,28.912-64.448,64.448-64.448c35.536,0,64.448,28.912,64.448,64.448S291.542,270.918,256.006,270.918z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       21-47  33rd St. 1f <span>- Congo</span>
                                    </h5>
                                 </div>
                              </div>
                              <div class="items-2-listing">
                                 <div class="button-group">
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <path id="XMLID_891_" d="m124.007 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.78c0-2.5-2.026-4.526-4.526-4.526z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_890_" d="m302.432 131.898c-2.5 0-4.527 2.027-4.527 4.527v28.779h94.615v-28.779c0-2.5-2.026-4.526-4.526-4.526h-85.562z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_889_" d="m89.18 164.906v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h23.211v-28.483c0-19.203 15.623-34.826 34.826-34.826h85.562c19.203 0 34.826 15.623 34.826 34.826v28.483h24.115c4.704 0 9.298.477 13.74 1.381v-92.936c0-19.998-16.212-36.21-36.209-36.21h-336.93c-19.998 0-36.209 16.212-36.209 36.21v92.936c4.441-.903 9.036-1.381 13.74-1.381z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_888_" d="m493.227 258.811h-474.454c-10.368 0-18.773 8.405-18.773 18.773v123.045c0 10.368 8.405 18.773 18.773 18.773h474.454c10.368 0 18.773-8.405 18.773-18.773v-123.045c0-10.368-8.405-18.773-18.773-18.773z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_887_" d="m446.934 195.206h-381.869c-19.504 0-35.612 14.5-38.158 33.306h458.185c-2.546-18.806-18.654-33.306-38.158-33.306z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_886_" d="m18.762 449.701v10.009c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.008h-30.289c-.004-.001-.007-.001-.011-.001z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                <path id="XMLID_885_" d="m462.938 449.701v10.008c0 8.367 6.783 15.15 15.15 15.15s15.15-6.783 15.15-15.15v-10.009c-.004 0-.007 0-.011 0h-30.289z" fill="#000000" data-original="#000000" style="" class=""></path>
                                             </g>
                                          </g>
                                       </svg>
                                       1 Bed 
                                    </button>
                                    <button class="btn bn-bath">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M480,255.051H32c-17.643,0-32,14.357-32,32c0,17.643,14.357,32,32,32h448c17.643,0,32-14.357,32-32    C512,269.408,497.643,255.051,480,255.051z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M482.944,298.123c-5.781-1.621-11.584,1.664-13.184,7.339l-0.832,2.923H43.093l-0.853-2.923    c-1.6-5.675-7.445-8.917-13.184-7.339c-5.675,1.621-8.939,7.531-7.317,13.184l29.397,102.912    c9.109,31.893,38.635,54.165,71.787,54.165h266.133c33.173,0,62.677-22.272,71.787-54.165l29.397-102.912    C491.883,305.653,488.597,299.744,482.944,298.123z M122.944,425.717c-14.208,0-26.88-9.536-30.763-23.211l-13.845-48.512    c-1.621-5.675,1.664-11.563,7.317-13.184c5.717-1.621,11.584,1.685,13.184,7.339l13.845,48.512    c1.323,4.544,5.525,7.744,10.261,7.744c5.888,0,10.667,4.779,10.667,10.667C133.611,420.96,128.832,425.717,122.944,425.717z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M143.424,448.16c-5.269-2.581-11.648-0.512-14.315,4.779l-21.333,42.667c-2.624,5.269-0.491,11.669,4.779,14.315    c1.557,0.768,3.179,1.131,4.779,1.131c3.904,0,7.659-2.155,9.536-5.909l21.333-42.667    C150.827,457.205,148.693,450.805,143.424,448.16z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M404.224,495.627l-21.333-42.667c-2.645-5.291-9.045-7.403-14.315-4.779c-5.269,2.645-7.403,9.045-4.779,14.315    l21.333,42.667c1.877,3.733,5.632,5.888,9.536,5.888c1.6,0,3.221-0.363,4.779-1.109    C404.715,507.296,406.848,500.896,404.224,495.627z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M428.48,0.949c-10.88,0-21.12,4.245-28.821,11.947l-33.856,33.856c-4.16,4.16-4.16,10.923,0,15.083    c4.16,4.16,10.923,4.16,15.083,0L414.741,28c3.648-3.669,8.533-5.696,13.845-5.696c10.709,0,19.413,8.704,19.413,19.413v224    c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.688-10.688v-224C469.355,19.232,451.093,0.949,428.48,0.949z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M391.552,57.419l-21.333-21.333c-2.432-2.432-5.824-3.563-9.28-2.987l-53.333,8.747c-3.925,0.64-7.147,3.413-8.405,7.168    c-1.259,3.755-0.299,7.936,2.475,10.773l64,65.92c2.027,2.112,4.821,3.243,7.637,3.243c1.003,0,2.027-0.149,3.029-0.448    c3.797-1.109,6.677-4.245,7.445-8.128l10.667-53.333C395.157,63.563,394.069,59.957,391.552,57.419z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M252.864,130.187c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C257.024,141.109,257.024,134.347,252.864,130.187z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M295.531,172.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.115l21.333-21.333    C299.691,183.776,299.691,177.013,295.531,172.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                   <path d="M316.864,108.853c-4.16-4.16-10.923-4.16-15.083,0l-21.333,21.333c-4.16,4.16-4.16,10.923,0,15.083    c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.115l21.333-21.333C321.024,119.776,321.024,113.013,316.864,108.853z" fill="#000000" data-original="#000000" style="" class=""></path>
                                                </g>
                                             </g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                             <g xmlns="http://www.w3.org/2000/svg"></g>
                                          </g>
                                       </svg>
                                       1 Bath 
                                    </button>
                                 </div>
                                 <div class=""><i class="fa fa-angle-up"></i></div>
                              </div>
                              <div class="vacent-keys">
                                 <ul>
                                    <li class="active">
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Vacant
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       Keys
                                    </li>
                                    <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                          <g>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m192 384c105.863281 0 192-86.128906 192-192 0-18.273438-2.550781-36.28125-7.601562-53.527344-2.488282-8.480468-11.34375-13.351562-19.847657-10.863281-8.488281 2.480469-13.34375 11.367187-10.863281 19.847656 4.183594 14.328125 6.3125 29.320313 6.3125 44.542969 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c32.0625 0 62.910156 9.375 89.207031 27.105469 7.320313 4.941406 17.273438 3 22.207031-4.320313 4.9375-7.328125 3.011719-17.273437-4.316406-22.210937-31.601562-21.308594-68.632812-32.574219-107.097656-32.574219-105.863281 0-192 86.128906-192 192s86.136719 192 192 192zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                             <path xmlns="http://www.w3.org/2000/svg" d="m356.6875 36.6875-164.6875 164.679688-52.6875-52.679688c-6.25-6.246094-16.375-6.246094-22.625 0-6.246094 6.25-6.246094 16.375 0 22.625l64 64c3.128906 3.128906 7.214844 4.6875 11.3125 4.6875s8.183594-1.558594 11.3125-4.6875l176-176c6.246094-6.25 6.246094-16.375 0-22.625-6.25-6.246094-16.375-6.246094-22.625 0zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                          </g>
                                       </svg>
                                       pets
                                    </li>
                                 </ul>
                              </div>
                              <div class="items-3-listing">
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Agent:</p>
                                       <h6>Mathew Charless</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                                 <div class="mantaincess-finance">
                                    <div class="mantaincess-1">
                                       <p>Maintenamce</p>
                                       <h6>$982</h6>
                                    </div>
                                    <div class="mantaincess-1">
                                       <p>Assessment</p>
                                       <h6>$982</h6>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>



     </div>
     <?php /*
        <div class="pangination-style">
           <div class="Showing-data ">
              <p>Showing 12 from 160 data </p>
           </div>
           <nav class="nav-pagitnation" aria-label="Page navigation example">
              <div class="page-item ">
                 <a class="page-link previurs-btn" href="#"> <span aria-hidden="true">«</span>Previous</a>
              </div>
              <ul class="pagination justify-content-end">
                 <li class="page-item active"><a class="page-link" href="#">1</a></li>
                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
              </ul>
              <div class="page-item">
                 <a class="page-link next-btnn" href="#">Next   <span aria-hidden="true">»</span></a>
              </div>
           </nav>
        </div>*/ ?>
  </div>
</div><script>
   //$(".nav-pagitnation ul").addClass("justify-content-end");
   $('.owl-demo').owlCarousel({
       items: 1,
       itemsDesktop : [1199, 1],
       itemsDesktopSmall : [991, 1],
       itemsTablet : [768, 1],
       itemsTabletSmall : [600, 1],
       itemsMobile : [479, 1],
       navigation : true,
       pagination : false,
       navigationText : ["",""],
   });

   $('.gv-pr-hide').hide();
   function showProDetail(id){
     $('.gv-pro-detail-'+id).toggle('slow');
   }
   function hideProDetail(id){
     $('.gv-pro-detail-'+id).hide('slow');
   }
   $( "#search-form-submit" ).click(function() {
     $("#pro-search-form").submit();
   });
</script>

