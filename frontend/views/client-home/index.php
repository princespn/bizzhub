<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\helpers\Json;
use yii\bootstrap4\Progress;
$this->title = Yii::$app->name;
$user_id = Yii::$app->user->id;
?>
<div class="site-index">
    <div class="">
      <section>
        <div class="container container-xl">
          <div class="file-manager-main">
            <div class="row">
              <div class="col-md-3">
                  <div class="file-manager-boxx-top">
                    <div class="file-manager">
                      <h2>File Manager</h2>
                      <p>Tutorial</p>
                  </div><?php //print_r($category);die;
                  $param_input = Yii::$app->params['input_type'];
                  foreach($category as $cat_value){ ?>
                    <div class="Financial-boxx">
                        <h4><?=$cat_value->name?></h4>
                        <ul><?php
                        if(!empty($form_data_arr[$cat_value->id])){
                        foreach($form_data_arr[$cat_value->id] as $form_value){
                          $folder_status = !empty($folderStatusArr[$form_value->id])?$folderStatusArr[$form_value->id]:1;
                          switch ($folder_status) {
                              case 1:
                                  $image_path = $form_value->unopened_image['base_url'].'/'.$form_value->unopened_image['path'];
                                  break;
                              case 2:
                                  $image_path = $form_value->opened_image['base_url'].'/'.$form_value->opened_image['path'];
                                  break;
                              case 3:
                                  $image_path = $form_value->review_image['base_url'].'/'.$form_value->review_image['path'];
                                  break;
                              case 4:
                                  $image_path = $form_value->complete_image['base_url'].'/'.$form_value->complete_image['path'];
                                  break;
                              case 5:
                                  $image_path = $form_value->received_image['base_url'].'/'.$form_value->received_image['path'];
                                  break;    
                              default:
                                  $image_path = $form_value->unopened_image['base_url'].'/'.$form_value->unopened_image['path'];
                          }
                         ?>
                          <li>
                            <div class="status_image_<?=$form_value->id?>">
                              <?=Html::img($image_path);?> 
                            </div>
                            <p><a href="javascript:void(0)" onclick="showform(<?=$form_value->id?>)"><?=$form_value->name?></a></p>
                          </li>                          
                          <?php 
                        }
                        } ?>
                      </ul>
                    </div><?php
                  } ?>
                </div>
              </div>






              <div class="col-md-6">
                <?php if (Yii::$app->session->hasFlash('success')): ?>
                  <div class="alert alert-success alert-dismissable">
                       <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                       <h4><i class="icon fa fa-check"></i>Saved!</h4>
                       <?= Yii::$app->session->getFlash('success') ?>
                  </div>
              <?php endif; ?>

              <?php if (Yii::$app->session->hasFlash('error')): ?>
                  <div class="alert alert-danger alert-dismissable">
                       <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                       <h4><i class="icon fa fa-check"></i>Saved!</h4>
                       <?= Yii::$app->session->getFlash('error') ?>
                  </div>
              <?php endif; ?>
                <div class="personal-boxx-top" onclick="displayblockmyfunction()">
                 <div class="center-boxx-do">
                   <div class="use-the" style="display: none;">
                      <p>Use the bar on your left to
                        keep your files organized</p>
                        <div class="aarow-boxx-left">
                          <?=Html::img('@web/img/aarow-3.png');?>
                        </div>
                  </div>
                  <div class="check-out" style="display: none;">
                       <p>Check out your total progress,
                        switch profiles, and find
                        key contacts on your left.</p>
                    <div class="aarow-boxx-right">
                      <?=Html::img('@web/img/aarow-2.png');?>
                    </div>
                </div>
                 </div>
                <div class="personal-boxx">
                  <?php 
                  foreach($templeteaa as $templete_value){
                        $FileName=$templete->videoFile;
                     }
                    //  paths =  Yii::getAlias('@web');
                    //  $filepath = $paths . '/img/'.$FileName; 
                      $paths =  Yii::getAlias('@web');
                      $filepath = $paths . '/storage/web/client_instruction/'.$FileName; 
                  ?>
                  <video class="myvedio"  id="myVideo" width="480" height="210" style="display: none;">
                    <source src="<?= $filepath?>" type="video/mp4">
                  </video>
                   <div class="myimage">
                      <?=Html::img('@web/img/home-1.jpg');?>
                   </div>
                  <h1>Welcome to your personal<br>
                    transaction dashboard!</h1>
                    <div class="icons-colors" style="display: none;">
                        <div class="aarow-boxx-left-to">
                          <?=Html::img('@web/img/aarow-1.png');?>
                    </div>
                      <P>Icons colors display your progress</P>
                      <div class="unopened-boxx">
                        <ul>
                          <li>
                            <?=Html::img('@web/img/Bank_Accounts_Unopened.png');?>
                            <p>Unopened</p>
                          </li>
                          <li>
                            <?=Html::img('@web/img/Verification_Viewed.png');?>
                            <p>Viewed</p>
                          </li>
                          <li>
                            <?=Html::img('@web/img/Gifts_Review.png');?>
                            <p>Needs Review</p>
                          </li>
                          <li>
                            <?=Html::img('@web/img/Personal_Loans_Complete.png');?>
                            <p>Completed</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
              </div>
            </div>



              <div class="col-md-3">
                <div>
                  <style type="text/css"></style>
                   <div class="application-status ">
                        <h4>Application Status</h4>
                        <ul>
                        <li class="application-boxx status-boxxx">
                          <div class="col-md-4">
                            <div class="row d-flex justify-content-center">
                              <div class="col-md-12">
                                  <div class="progress blue"> <span class="progress-left">  <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                      <div class="progress-value">90%</div>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <p class="address-box">[[123 Address #1]]</p>
                            <span>[[New York, NY 10040]]</span>
                          </div>                   
                        </li>
                      </ul>
                    </div>
                    <div class="application-status status-boxxx"><?php 
                    if(!empty($profileSelector)){ ?>
                        <h4>Profile Selector</h4><?php
                        $firstname ='';
                        foreach($profileSelector as $ps_value){ ?>
                          <div class="Profile"><?php 
                            if(!empty($ps_value['avatar_path'])){ ?>
                              <div class="p_s_profile_image">
                                <?=Html::img($ps_value['avatar_base_url'].'/'.$ps_value['avatar_path']);?>
                              </div><?php 
                            }else{
                              if(!empty($ps_value['firstname'])){
                                $first_char = mb_substr($ps_value['firstname'], 0, 1).($ps_value['lastname'])?mb_substr($ps_value['lastname'], 0, 1):"";
                              }else{
                                  $first_char = mb_substr($ps_value['username'], 0, 1);
                              }
                            ?>
                              <div class="p_s_profile_image"><?php echo strtoupper($first_char) ?></div><?php 
                            } 
                            if(!empty($ps_value['firstname'])){
                              $firstname = ucfirst($ps_value['firstname']);
                            }else{
                                $firstname = ucfirst($ps_value['username']);
                            }
                            if(!empty($ps_value['email'])){
                              $email = ucfirst($ps_value['email']);
                            }else{
                                $email ="";
                            }
                            ?>
                            <P>
                            </P>[[<?=$firstname?>]</P>  
                          </div><?php 
                        } 
                      }?>                        
                    </div>



                     <div class="application-status status-boxxx"><?php 
                     if(!empty($successManager)){ ?>
                        <h4>Your Success Manager</h4><?php 
                        foreach($successManager as $s_value){ ?>
                          <div class="success-manager"><?php
                          if(!empty($s_value['avatar_path'])){ ?>
                              <div class="p_s_profile_image">
                                <?=Html::img($s_value['avatar_base_url'].'/'.$s_value['avatar_path']);?>
                              </div><?php 
                            }else{
                              if(!empty($s_value['firstname'])){
                                $first_char = mb_substr($s_value['firstname'], 0, 1).($s_value['lastname'])?mb_substr($s_value['lastname'], 0, 1):"";
                              }else{
                                  $first_char = mb_substr($s_value['username'], 0, 1);
                              }
                            ?>
                              <div class="p_s_profile_image"><?php echo strtoupper($first_char) ?></div><?php 
                            } 
                            if(!empty($s_value['firstname'])){
                              $fullname = ucfirst($s_value['firstname']).' '.ucfirst($s_value['lastname']);
                            }else{
                                $fullname = ucfirst($s_value['username']);
                            }
                            if(!empty($s_value['email'])){
                              $email = ucfirst($s_value['email']);
                            }else{
                                $email ="";
                            }
                            if(!empty($s_value['phone'])){
                              $phone = ucfirst($s_value['phone']);
                            }else{
                                $phone ="(###) ###-####";
                            }
                            ?>
                            <div class="user_detail">
                              <p><?php echo $fullname; ?></p>
                              <p><?php echo $phone; ?></p>
                              <p><?php echo $email; ?></p>
                            </div>
                          </div><?php 
                        }
                     } ?>
                    </div>

                     <div class="application-status status-boxxx"><?php 
                     if(!empty($agent)){ ?>
                        <h4>Your Real Estate Agent</h4><?php 
                        foreach($agent as $a_value){ ?>
                          <div class="success-manager"><?php
                          if(!empty($a_value['avatar_path'])){ ?>
                              <div class="p_s_profile_image">
                                <?=Html::img($a_value['avatar_base_url'].'/'.$a_value['avatar_path']);?>
                              </div><?php 
                            }else{
                              if(!empty($a_value['firstname'])){
                                $first_char = mb_substr($a_value['firstname'], 0, 1).($a_value['lastname'])?mb_substr($a_value['lastname'], 0, 1):"";
                              }else{
                                  $first_char = mb_substr($a_value['username'], 0, 1);
                              }
                            ?>
                              <div class="p_s_profile_image"><?php echo strtoupper($first_char) ?></div><?php 
                            } 
                            if(!empty($a_value['firstname'])){
                              $fullname = ucfirst($a_value['firstname']).' '.ucfirst($a_value['lastname']);
                            }else{
                                $fullname = ucfirst($a_value['username']);
                            }
                            if(!empty($a_value['email'])){
                              $email = ucfirst($a_value['email']);
                            }else{
                                $email ="";
                            }
                            if(!empty($a_value['phone'])){
                              $phone = ucfirst($a_value['phone']);
                            }else{
                                $phone ="(###) ###-####";
                            }?>
                            <div class="user_detail">
                              <p><?php echo $fullname; ?></p>
                              <p><?php echo $phone; ?></p>
                              <p><?php echo $email;?></p>
                            </div>
                          </div><?php 
                        }
                     } ?>
                    </div>


                     <div class="application-status status-boxxx"><?php 
                     if(!empty($attorney)){ ?>
                        <h4>Your Real Estate Attorney</h4><?php 
                        foreach($attorney as $at_value){ ?>
                          <div class="success-manager"><?php
                          if(!empty($at_value['avatar_path'])){ ?>
                              <div class="p_s_profile_image">
                                <?=Html::img($at_value['avatar_base_url'].'/'.$at_value['avatar_path']);?>
                              </div><?php 
                            }else{
                              if(!empty($at_value['firstname'])){
                                $first_char = mb_substr($at_value['firstname'], 0, 1).($at_value['lastname'])?mb_substr($at_value['lastname'], 0, 1):"";
                              }else{
                                  $first_char = mb_substr($at_value['username'], 0, 1);
                              }
                            ?>
                              <div class="p_s_profile_image"><?php echo strtoupper($first_char) ?></div><?php 
                            } 
                            if(!empty($at_value['firstname'])){
                              $fullname = ucfirst($at_value['firstname']).' '.ucfirst($at_value['lastname']);
                            }else{
                                $fullname = ucfirst($at_value['username']);
                            }
                            if(!empty($at_value['email'])){
                              $email = ucfirst($at_value['email']);
                            }else{
                                $email ="";
                            }
                            if(!empty($at_value['phone'])){
                              $phone = ucfirst($at_value['phone']);
                            }else{
                                $phone ="(###) ###-####";
                            }
                            ?>
                            <div class="user_detail">
                              <p><?php echo $fullname; ?></p>
                              <p><?php echo $phone; ?></p>
                              <p><?php echo $email;?></p>
                            </div>
                          </div><?php 
                        }
                     } ?>
                    </div>

                     <div class="application-status status-boxxx"><?php 
                     if(!empty($mortgageLender)){ ?>
                        <h4>Your Mortgage Lender</h4><?php 
                        foreach($mortgageLender as $mor_value){ ?>
                          <div class="success-manager"><?php
                          if(!empty($mor_value['avatar_path'])){ ?>
                              <div class="p_s_profile_image">
                                <?=Html::img($mor_value['avatar_base_url'].'/'.$mor_value['avatar_path']);?>
                              </div><?php 
                            }else{
                              if(!empty($mor_value['firstname'])){
                                $first_char = mb_substr($mor_value['firstname'], 0, 1).($mor_value['lastname'])?mb_substr($mor_value['lastname'], 0, 1):"";
                              }else{
                                  $first_char = mb_substr($mor_value['username'], 0, 1);
                              }
                            ?>
                              <div class="p_s_profile_image"><?php echo strtoupper($first_char) ?></div><?php 
                            } 
                            if(!empty($mor_value['firstname'])){
                              $fullname = ucfirst($mor_value['firstname']).' '.ucfirst($mor_value['lastname']);
                            }else{
                                $fullname = ucfirst($mor_value['username']);
                            }
                            if(!empty($mor_value['email'])){
                              $email = ucfirst($mor_value['email']);
                            }else{
                                $email ="";
                            }
                            if(!empty($mor_value['phone'])){
                              $phone = ucfirst($mor_value['phone']);
                            }else{
                                $phone ="(###) ###-####";
                            }?>
                            <div class="user_detail">
                              <p><?php echo $fullname; ?></p>
                               <p><?php echo $phone; ?></p>
                              <p><?php echo $email;?></p>
                            </div>
                          </div><?php 
                        }
                     } ?>
                    </div>
                     
                     <!-- <div class="application-status status-boxxx">
                        <h4>Your Real Estate Attorney</h4>
                       <div class="success-manager">
                         <?=Html::img('@web/img/md.png');?>
                         <p>Laura Zirkle</p>
                          <p>(###) ###-####</p>
                           <p>louro@bizzorroagency.com</p>
                       </div>
                    </div> -->
                    <!--  <div class="application-status status-boxxx">
                        <h4>Your Mortgage Lender</h4>
                       <div class="success-manager">
                         <?=Html::img('@web/img/user-1.png');?>
                         <div class="add-boxx">Add Mortgage Lender </div>
                       </div>
                    </div>    -->               
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</div>

<style type="text/css">


.progress {
    width: 70px;
    height: 70px !important;
    float: left;
    line-height: 70px;
    background: none;
    box-shadow: none;
    position: relative;
}
.progress:after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}

.progress>span {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1
}

.progress .progress-left {
    left: 0
}

.progress .progress-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0
}

.progress .progress-left .progress-bar {
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left
}

.progress .progress-right {
    right: 0
}

.progress .progress-right .progress-bar {
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards
}

.progress .progress-value {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: #e3effe;
    font-size: 18px;
    color: #000;
    line-height: 75px;
    position: absolute;
    top: 0;
    left: 0;
    font-weight: 600;
    text-align: center;
}
.progress.blue .progress-bar {
    border-color: #183d69;
}

.progress.blue .progress-left .progress-bar {
    animation: loading-2 1.5s linear forwards 1.8s
}

.progress.yellow .progress-left .progress-bar {
    animation: none
}




@keyframes loading-1 {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    100% {
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg)
    }
}

@keyframes loading-2 {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    100% {
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg)
    }
}

@keyframes loading-3 {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    100% {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg)
    }
}

</style>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function showform(form_id){
    $.ajax({
        url: '<?php echo Url::toRoute('client-home/ajax-form-display'); ?>',
        type: 'POST',
        data: {form_id},
        dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          //obj = JSON.parse(data);
          var newData = JSON.parse(JSON.stringify(data))
          //alert(newData);
          $(".personal-boxx-top").html(newData['forms']);
          $(".status_image_"+form_id).html(newData['folder_status']);
        },
        error: function () {
            alert("ERROR IN FORM OPEN");
        }
    });
  }
  

var clicks = 0;
  function displayblockmyfunction() {
    clicks += 1;
  if(clicks=="1"){
    $(".use-the").show();
  }else if (clicks=="2"){
    $(".check-out").show();
  }else if (clicks=="3"){
    $(".icons-colors").show();
  }else{
    $(".myvedio").show();
    var vid = document.getElementById("myVideo"); 
    vid.play(); 
    $(".myimage").hide();
    //alert(clicks);
  }
}
</script>