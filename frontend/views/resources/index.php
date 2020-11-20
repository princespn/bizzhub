<?php
/**
 * @var yii\web\View $this
 */
//use yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

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
        <div class="form-boxx-top">
   <form class="form-inline" action="/action_page.php">
      <input type="name" class="form-control" id="pwd" placeholder="Enter Street Address or Building Name" name="nav-item">
      
      <button type="submit" class="btn btn-primary">Search</button>
    </form></div>
    </div>
  </div>

  <div class="col-md-12">
  <div class="building-top-boxx-1">
  <div class="building-left">
    <h4>Building Database</h4>
  </div>
  <div class="welcome-to" style="font-size: 20px;">
    Welcome to the most exhaustive collection of<br>
    documents for buildings in Upper Manhattan! 
  </div>
  <div class="have-you">
    Have you recieved building documents not in the database?
    Email them to your Client Success Manager and they’ll add it!
    </div>
  <div class="form-boxx-top">
   <form class="form-inline" action="/action_page.php">
      <input type="name" class="form-control" id="pwd" placeholder="14 Bogardus Place" name="nav-item">
      
      <button type="submit" class="btn btn-primary ">Search</button>
    </form>
  </div>
  <div class="nagle-apartments">
    <h2>Nagle Apartments Corp “Nabors”</h2>
    <p>14 Bogardus Place New York, NY 10040</p>
     <p>31 Nagle Avenue New York, NY 10040 </p>
      <p>37 Nagle Avenue New York, NY 10040 </p>
  </div>
  <div class="row purchase-box">
    <div class="col-md-4 pr-0">
    <ul class="purchase-1">
      <li>Purchase Application</li>
      <li>Offering Plan</li>
      <li>Amendments</li>
      <li>Sublet Policy</li>
    </ul>
  </div>
  <div class="col-md-4 ">
    <ul class="purchase-1">
      <li>Financials 2016</li>
      <li>Offering Plan</li>
      <li>Financials 2020</li>
      <li>Meeting Notes</li>
    </ul>
  </div>
  <div class="col-md-4 pr-0">
    <ul class="purchase-1">
      <li>Lease Agreement</li>
      <li>Renovations </li>
      <li>Sublet Policy</li>
      <li>Sublet Policy</li>
    </ul>
  </div>
  </div>

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
   What do you need help with? Choose the best option and leave a
    detailed decription of the problem in the notes: 
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
      Sorry to hear about that.<br>
      `We’ll get back to you ASAP!
    </div>
    <div class="fform-btm-about">    
        <div class="submit-btm-on pull-right">        
            <?= Html::Button('Submit',['class'=>'btn btn-primary','onclick'=>'supportEmailSend();']); ?>
        </div>
    </div>
    <div class="clear"></div>
  <?php $form->end(); ?>
  </div>
</div>
</div>



</div>
</div>

<script type="text/javascript">

function supportEmailSend()
 {   
   var data=$("#support-form-id").serialize();


  $.ajax({
    type: 'POST',
    url: '<?=Yii::$app->urlManager->createAbsoluteUrl(['resources/supports']); ?>',
    type: 'post',
    data:data,
    success:function(data){
                //alert(data); 
              },
    error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },

  dataType:'html'
  });

}

</script>