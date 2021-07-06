<?php
/**
 * @var yii\web\View $this
 */
//use yii;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
$http = Yii::$app->params['http'];
$base_url = Url::base($http);

$this->title = 'Support';
?>
<div class="content-wrapper" style="min-height: 902.8px;">
  <div class="dashboard_right_detail">
    <div class="tech-support">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <div class="tech-support-left">
            <div class="tech-supportimg">
              <?=Html::img("@web/img/tech-support/Group 4571.png")?>
              <h5>How can we help?</h5>
              <p>Let us leap in to fix your issue</p>
            </div>
          <div class="how-wecan-form"><?php
            $form = ActiveForm::begin(['id' => 'support-form', 'class'=>'support-form']);?>
              <div class="select-dropdown" >
                <div class="list-of-issues">
                  <div class="drop-down">
                    <?php
                      echo $form->field($model, 'subject')->widget(Select2::classname(), [
                            'data' => $subjectsArr,
                            'options' => ['placeholder' => 'Select list','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                      ]);?>
                  </div>
                </div>
              </div>
              <div class="button-how ">
                <label>For how long have you been facing this?</label>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <?= $form->field($model, 'facing_time')->radio(['id'=>'JustToday','value' => 1])->label('Just Today',['class'=>'btn btn-white']) ?>                    
                  </div>
                  <div class="col-lg-4 col-md-4  col-sm-4 ">
                    <?= $form->field($model, 'facing_time')->radio(['id'=>'ForWeek','value' => 2])->label('For Week',['class'=>'btn btn-white']) ?>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4">
                    <?= $form->field($model, 'facing_time')->radio(['id'=>'ForMonth','value' => 3])->label('For Month',['class'=>'btn btn-white']) ?>
                  </div>
                </div>
              </div>
              <div class="textarea-txt">
                <?= $form->field($model, 'message')->textarea(['row'=>3, 'placeholder'=>'Tell us you are facing in detail']); ?>
              </div>
              <div class="gernaterate-ticket">
                <div class="gernaterate-ticket-left">
                  <p>Having issues?</p>
                  <a href="">Contact us here</a>
                </div>
                <div class="gernaterate-ticket-right">
                  <?= Html::submitButton('Generate Ticket', ['class' => 'btn btn-primary']) ?>
                </div>
              </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-12">
        <div class="tech-support-right">
          <div class="history-box">
            <?=Html::img("@web/img/tech-support/Group 4573.png")?>
            <div class="tickt-title">
              <h4>History</h4>
              <p>Here you can see status of your exiting requests </p>
            </div>
          </div>
          <div class="pending-ticekt"><?php
            if(!empty($pendingMessage)){ ?>
              <h6 >Pending</h6><?php
                foreach($pendingMessage as $pmessage){ ?>
                <div class="pending-blue-ticket">
                  <div class="pending-header">
                    <div class="tick-id-no">TICKET ID #<?=$pmessage['id']?></div>
                      <div class="date-time">
                        <time datetime="2020-11-09T07:46:22Z" class="date" title="Monday, November 9, 2020, 1:16:22 PM"><?=date('M, d Y h:i:s', $pmessage['created_at'])?></time>
                        <span>Pending <?=Html::img("@web/img/tech-support/Group 4586.png")?></span>
                      </div>
                    </div>
                    <div class="inner-section-ticket">
                      <h4><?=$pmessage['subject']?></h4>
                      <p><?=substr($pmessage['message'],0,200)?></p>
                    </div>
                    <div class="border-dotetted"></div>
                    <div class="warning-ticket">
                      <h6>WE ARE LOOKING INTO YOUTR ISSUE. HOPE TO RESOLVE THE ISSUE AT THE EARLIEST</h6>
                      <button class="btn btn-disavble" disabled=""><?=Html::img("@web/img/tech-support/Group 4588.png")?>  Withdraw</button>          
                    </div>
                  </div><?php
                }?>
              </div><?php
            }
            if(!empty($resolvedMessage)){ ?>            
              <h6 >Resolved</h6><?php
              foreach($resolvedMessage as $rmessage){ ?>
              <div class="resoled-ticket">              
                <div class="pending-blue-ticket resovled-background">
                  <div class="pending-header">
                    <div class="tick-id-no">TICKET ID #<?=$rmessage['id']?></div>
                  <div class="date-time">
                    <time datetime="2020-11-09T07:46:22Z" class="date" title="<?=date('M, d Y h:i:s', $rmessage['created_at'])?>"><?=date('M, d Y h:i:s', $rmessage['created_at'])?></time>
                    <span>Resolved <?=Html::img("@web/img/tech-support/Group 4577.png")?></span>
                  </div>
                </div>
                <div class="inner-section-ticket">
                  <h4><?=$rmessage['subject']?></h4>
                  <p><?=substr($rmessage['message'],0,200)?></p>
                </div>
              </div><?php
              } 
            }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.loading_img_div{
    text-align: center;
    display: none;
   } 
   #loading-image {
    width: 40px;
}
</style>
<script type="text/javascript">

function searchData(){
  //var myData = $("#searchbuildings").getFormData();
  var myData = new FormData($('#searchbuildings')[0])
  //console.log(myData);
  $.ajax({
      url: '<?php echo Url::toRoute('resources/ajaxsearch'); ?>',
      type: 'POST',
      cache: false,
      data: myData,
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function() {
        $(".loading_img_div").show();
      },
      success: function (data) {
        $(".nagle-apartments").show();
        $(".nagle-apartments").html(data['address']);
        $(".purchase-box").show();
        $(".purchase-box").html(data['document']);
          $(".loading_img_div").hide();
      },
      error: function () {
          alert("ERROR in upload");
      }
  });
}

function supportEmailSend()
 {   
   var data=$("#support-form-id").serialize();
  $.ajax({
    type: 'POST',
    url: '<?=Yii::$app->urlManager->createAbsoluteUrl(['resources/supports']); ?>',
    type: 'post',
    data:data,
    success:function(data){
      if(data == "success"){
        $(".about-that").html("Sorry to hear about that.<br>\
              `We’ll get back to you ASAP!");
        $('#exampleFormControlTextarea1').val("");        
      }      
    },
    error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },

  dataType:'html'
  });

}

</script>