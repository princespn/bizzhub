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
$this->title = 'Leaderboard';
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
$paths =  Yii::getAlias('@web').'/frontend/web/img/'; 
?>
<div class="content-wrapper" style="min-height: 902.8px;">
   <div class="dashboard_right_detail">
      <div class="table-style-leadrboardouter">
         <div class="table-style-leadrboard">
               <div class="top-leading">
                  <h6>Top 3 Leading</h6>
               </div>
               <div class="dropdown dropdown-landing">
                  <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Weekly  <i class="fa fa-sort-down"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Another action</a></li>
                  </ul>
               </div>
            </div>
         <div class="leder-table1 table-responsive" >
            
            <table width="100%" ><?php
            foreach($top3Agent as $takey => $topAgent){
               $agentImage = '@web/img/default_user.png';
               if(!empty($topAgent['agent_image'])){
                  $agentImage = $topAgent['agent_image_base_url'].$topAgent['agent_image'];
               }
               if($takey == 0){ ?>
                  <tbody class="section222">
                     <tr class="backgroung-purple"  >
                        <td class="img-rank1" width="10%">
                           <div class="img-rank">
                              <?=Html::img('@web/img/leaderboard/gold_medal_icon.png')?>
                           </div>
                        </td>
                        <td width="15%" class="numbers-table1" >
                           <div class="img-rak-owner">
                              <?=Html::img($agentImage)?>
                              <h6><?=$topAgent['agent_name']?></h6>
                           </div>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['active_contracts']?></h5>
                           <p class="number-p">Active Contracts</p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=$topAgent['closed_deals']?></h5>
                           <p class="number-p"> Close deals</p>
                        </td >
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['contract_volume']?></h5>
                           <p class="number-p">Contracts valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['closed_volume']?></h5>
                           <p class="number-p">Closed valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['c_set_score']);?></h5>
                           <p class="number-p">C-set </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['pick_up'])?></h5>
                           <p class="number-p">Pick-Up </p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/star.png')?><?=json_decode($topAgent['zillow_reviews'])?></h5>
                           <p class="number-p">Reviews </p>
                        </td>
                     </tr>
                  </tbody><?php
               }else if($takey == 1){?>
                  <tbody class="section222">
                     <tr class="backgroung-yellow" >
                        <td class="img-rank1" width="10%">
                           <div class="img-rank">
                              <?=Html::img('@web/img/leaderboard/silver_medal_icon.png')?>
                           </div>
                        </td>
                        <td width="15%" class="numbers-table1" >
                           <div class="img-rak-owner">
                              <?=Html::img($agentImage)?>
                              <h6><?=$topAgent['agent_name']?></h6>
                           </div>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['active_contracts']?></h5>
                           <p class="number-p">Active Contracts</p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=$topAgent['closed_deals']?></h5>
                           <p class="number-p"> Close deals</p>
                        </td >
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['contract_volume']?></h5>
                           <p class="number-p">Contracts valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['closed_volume']?></h5>
                           <p class="number-p">Closed valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table">
                              <?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['c_set_score'])?></h5>
                           <p class="number-p">C-set </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['pick_up'])?></h5>
                           <p class="number-p">Pick-Up </p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/star.png')?><?=json_decode($topAgent['zillow_reviews'])?></h5>
                           <p class="number-p">Reviews </p>
                        </td>
                     </tr>
                  </tbody><?php
               }else if($takey == 2){ ?>
                  <tbody class="section222">
                     <tr class="backgroung-skyblue" >
                        <td class="img-rank1" width="10%">
                           <div class="img-rank">
                              <?=Html::img('@web/img/leaderboard/bronze_medal_icon.png')?>
                           </div>
                        </td>
                        <td width="15%" class="numbers-table1" >
                           <div class="img-rak-owner">
                              <?=Html::img($agentImage)?>
                              <h6><?=$topAgent['agent_name']?></h6>
                           </div>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['active_contracts']?></h5>
                           <p class="number-p">Active Contracts</p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=$topAgent['contract_volume']?></h5>
                           <p class="number-p"> Close deals</p>
                        </td >
                        <td >
                           <h5 class="numbers-table">$530k</h5>
                           <p class="number-p">Contracts valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=$topAgent['closed_volume']?></h5>
                           <p class="number-p">Closed valume </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['c_set_score'])?></h5>
                           <p class="number-p">C-set </p>
                        </td>
                        <td >
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($topAgent['pick_up'])?></h5>
                           <p class="number-p">Pick-Up </p>
                        </td>
                        <td>
                           <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/star.png')?><?=json_decode($topAgent['zillow_reviews'])?></h5>
                           <p class="number-p">Reviews </p>
                        </td>
                     </tr>
                  </tbody><?php
               }
             } ?>
            </table>
         </div>
            <div class="leder-table2 mt-5 table-responsive">
            <table class="" width="100%">
            
            <div class="table-style-leadrboard2">
               <div class="top-leading">
                  <h6>Other agent</h6>
               </div>
               
            </div><?php
            foreach($lbData as $takey => $agentData){
               $agentImage = "@web/img/default_user.png";
               if(!empty($agentData['agent_image'])){
                  $agentImage = $agentData['agent_image_base_url'].$agentData['agent_image'];
               }?>
               <tbody class="section22">
                  <tr class="background-white" >
                     <td class=" ranktd" width="10%">
                        <h5 class="numbers-table"><?=json_decode($agentData['rank'])?></h5>
                        <p class="number-p">Rank</p>
                     </td>
                     <td width="20%" class="" >
                        <div class="img-row-td">
                           <?=Html::img($agentImage)?>
                           <h6><?=$agentData['agent_name']?></h6>
                        </div>
                     </td>
                     <td >
                        <h5 class="numbers-table"><?=$agentData['active_contracts']?></h5>
                        <p class="number-p">Active Contracts</p>
                     </td>
                     <td>
                        <h5 class="numbers-table"><?=$agentData['closed_deals']?></h5>
                        <p class="number-p"> Close deals</p>
                     </td >
                     <td >
                        <h5 class="numbers-table"><?=$agentData['contract_volume']?></h5>
                        <p class="number-p">Contracts valume </p>
                     </td>
                     <td >
                        <h5 class="numbers-table"><?=$agentData['closed_volume']?></h5>
                        <p class="number-p">Closed valume </p>
                     </td>
                     <td >
                        <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($agentData['c_set_score'])?></h5>
                        <p class="number-p">C-set </p>
                     </td>
                     <td >
                        <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/Component 104 – 1.png')?><?=json_decode($agentData['pick_up'])?></h5>
                        <p class="number-p">Pick-Up </p>
                     </td>
                     <td>
                        <h5 class="numbers-table"><?=Html::img('@web/img/leaderboard/star.png')?><?=json_decode($agentData['zillow_reviews'])?></h5>
                        <p class="number-p">Reviews </p>
                     </td>
                  </tr>
               </tbody><?php
            } ?>
            </table>
            </div>
            <div class="pangination-style"><?php
               $totalCount = $pages->totalCount;
               $showThisPage = count($lbData);
               //echo $showThisPage;die; ?>   
               <div class="Showing-data ">
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
         
      </div>
   </div>
</div>
<script>
    //$(".nav-pagitnation ul").addClass("justify-content-end");
   $('.owl-demo').owlCarousel({
        items: 1,
        itemsDesktop : [1199, 1],
        itemsDesktopSmall : [991, 1],
        itemsTablet : [768, 3],
        itemsTabletSmall : [600, 1],
        itemsMobile : [479, 1],
        navigation : true,
        pagination : false,
        navigationText : ["",""],
   });
   $( "#search-form-submit" ).click(function() {
      $("#pro-search-form").submit();
   });
</script>


