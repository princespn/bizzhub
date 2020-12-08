<?php
/**
 * @var yii\web\View $this
 */
//use yii;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name.' Resources';
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="building-top-boxx">
            <div class="building-left">
              <h4>Building Database</h4>
            </div>
            <div class="welcome-to">
                Welcome to the most exhaustive collection of documents for buildings
                in Upper Manhattan! Search below or CLICK HERE for the full database.
            </div>
            <div class="have-you">
              Have you recieved building documents not in the database?
              Email them to your Client Success Manager and they’ll add it!
            </div>
            <div class="form-boxx-top"><?php 
              $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-inline','id'=>'searchbuildings']]) ?>
                <?= Html::textInput('searchtext', "", ['class' => 'form-control','placeholder'=>'Enter Street Address or Building Name']) ?> 
                <?= Html::Button('Search',['class'=>'btn btn-primary','onclick'=>'searchData();']); ?><?php 
              ActiveForm::end() ?>
            </div>
            <div class="loading_img_div">
                <?= Html::img('@web/img/loading-image.gif', ['id' => 'loading-image']) ?>
            </div>
            <div class="nagle-apartments"></div>
            <div class="row purchase-box"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="building-top-boxx"> 
        <div class="building-left">
          <h4>Tech Support</h4>
        </div>
        <div class=main-bboxx><?php 
          $form = \yii\widgets\ActiveForm::begin([
            'id' => 'support-form-id',
            'class'=>'form-inline',
            'action' => "",
            'method'=>'post',
            'enableAjaxValidation' => true,
            'validationUrl' => 'validation-rul',
            ]); ?>

            <div class="welcome-to" style="padding: 0px 0px; ">
                What do you need help with? Choose the best option and leave a detailed decription of the problem in the notes: 
            </div><?php
            $count = 0;
            $divideby = 3;
            foreach ($supportsData as $key => $value) {     
              $remainder=$count % $divideby;
              //echo $remainder;
              if($remainder == 0){ ?>
                  <div class="row radoi-boxx"><?php
              }?>
              <div class="col-md-4 p-0">
                  <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio1" name="type" value="<?=$value['type']?>" checked>
                      <label class="form-check-label" for="radio1"><?=$value['type']?></label>
                  </div>
              </div><?php
              if($remainder == 2){ ?>
                  </div><?php
              }
              $count++; 
            } ?>  

            <div class="form-group">
                <?= Html::textarea('message', '', ['rows' => 6,'id'=>'exampleFormControlTextarea1', 'class'=>'form-control']); ?>              
            </div>
            <div class="about-that">
            </div>
            <div class="fform-btm-about">    
                <div class="submit-btm-on pull-right">        
                    <?= Html::Button('Submit',['class'=>'btn btn-primary','onclick'=>'supportEmailSend();']); ?>
                </div>
            </div>
            <div class="clear"></div><?php 
          $form->end(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .nagle-apartments{
    display: none;
  }
  .purchase-box{
    display: none;
  }
  .bild_show{
    display: inline-block;
  }
  .bild_hide{
    display: none !important;
  }
  ul.doc_list li {
    display: inline-block;
    width: 33%;
    float: left;
    font-size: 13px;
    padding: 3px 0;
    font-weight: 500;
}
ul.doc_list li a {
    color: #222;
    text-decoration: underline;
}
ul.doc_list li:hover a {
    color: #242056;
}
ul.doc_list {
    display: inline-block;
    width: 100%;
    margin-bottom: 0;
}
.nagle-apartments {
    margin-bottom: 10px;
}
.nagle-apartments p.opened_doc {
    font-size: 20px;
}

.loading_img_div{
    text-align: center;
    display: none;
   } 
   #loading-image {
    width: 40px;
}
</style>
<script type="text/javascript">

function showDoc(str){
 var idArr = str.split("_");
 var buidId = idArr[1];
 var old_bild_id = document.getElementsByClassName('opened_doc')[0].id;
 $("#"+old_bild_id).removeClass('opened_doc'); // Remove class
 $("#"+str).addClass('opened_doc'); // add class
 var old_id = document.getElementsByClassName('bild_show')[0].id;
 var old_elem = document.getElementById(old_id);
 old_elem.classList.remove('bild_show'); // Remove class
 old_elem.classList.add('bild_hide'); // Add class
 var elem = document.getElementById("doc_"+buidId);
 elem.classList.remove('bild_hide'); // Remove class
 elem.classList.add('bild_show'); // Add class
}

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