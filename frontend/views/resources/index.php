<?php
/**
 * @var yii\web\View $this
 */
//use yii;
//use yii\bootstrap\ActiveForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use yii\web\JsExpression;
$http = Yii::$app->params['http'];
$base_url = Url::base($http);

$this->title = 'Resources';
?>
<div class="content-wrapper" style="min-height: 902.8px;">
  <div class="dashboard_right_detail">
    <div class="resources-database">
        <?=Html::img("@web/img/resources/Group 4538.png",['class'=>'secure-img'])?>
          <div class="close-btn">
          <?=Html::img("@web/img/resources/Group 4540.png")?>
          </div>
          <h6>WELCOME TO</h6>
          <h4>Databse for Buildings Documents</h4>
          <h5> Most exhaustive collection documents for the  building in upper manhattan</h5>
      </div>
      <div class="serch-btnouter"><?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'resource-search-form', 'class'=>'resource-form']);?>
        <div class="serch-btnouter-left">
          <div role="search" id="formsearch">
            <?=Html::img("@web/img/resources/Group 4551.png")?>
            <input autocomplete="off" type="search" id="resource_search_query" name="resource_search_query" placeholder="Search..." aria-label="Search through site content">
            <?=Html::img("@web/img/resources/Group 4540.png")?>
          </div>
        </div>
        <div class="serch-btnouter-right">
          <?= Html::submitButton('Begin Search', ['class' => 'btn btn-primary begin-serch']) ?>  
        </div>
        <?php ActiveForm::end(); ?>
      </div><?php
      if(!empty($buldingData)){ ?>
      <div class="nagle-aprtments">
        <div class="row">
          <div class="col-md-5 col-lg-6 col-sm-5">
            <div class="left-text-serch">
              <h4>You Searched</h4>
              <h3><?=$buldingData['address']?></h3>
            </div>
          </div>
          <div class="col-md-7 col-lg-6 col-sm-7">
            <div class="right-text-serach">
              <h4>Builiding document not in the database? <?=Html::img("@web/img/resources/Group 4542.png")?></h4>
              <h5>Email client success manager for its inclusion <?=Html::img("@web/img/resources/Group 4540.png")?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="resources-table">
        <div class="panel-body table-responsive">
          <table class="table">
              <thead>
                  <tr class="">
                      <th style="width:50%">Documents</th>
                      <th style="width:25%">Added</th>
                      <th style="width:25%">Action</th>
                      <th>&nbsp;</th>
                  </tr>
              </thead>
              <tbody><?php
              if(!empty($buldingData['purchase_application'])){ ?>                          
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['purchase_application']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $purchase_application_dowanload = $purchase_application_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['purchase_application'])){
                          $purchase_application_path = $base_url.'/storage/web/buildings/'.$buldingData['purchase_application'];
                          $purchase_application_dowanload = Url::to(['file/download','n'=>$buldingData['purchase_application'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$purchase_application_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$purchase_application_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('purchase_application_<?=$buldingData['id']?>','Purchase Application','<?=$purchase_application_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['offering_plan'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['offering_plan']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $offering_plan_dowanload = $offering_plan_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['offering_plan'])){
                          $offering_plan_path = $base_url.'/storage/web/buildings/'.$buldingData['offering_plan'];
                          $offering_plan_dowanload = Url::to(['file/download','n'=>$buldingData['offering_plan'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$offering_plan_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$offering_plan_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('offering_plan_<?=$buldingData['id']?>','Offering Plan','<?=$offering_plan_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>
                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['amendments'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['amendments']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $amendments_dowanload = $amendments_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['amendments'])){
                          $amendments_path = $base_url.'/storage/web/buildings/'.$buldingData['amendments'];
                          $amendments_dowanload = Url::to(['file/download','n'=>$buldingData['amendments'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$amendments_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$amendments_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('amendments_<?=$buldingData['id']?>','Amendments','<?=$amendments_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>
                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['house_rules'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['house_rules']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $house_rules_dowanload = $house_rules_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['house_rules'])){
                          $house_rules_path = $base_url.'/storage/web/buildings/'.$buldingData['house_rules'];
                          $house_rules_dowanload = Url::to(['file/download','n'=>$buldingData['house_rules'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$house_rules_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$house_rules_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('house_rules_<?=$buldingData['id']?>','House Rules','<?=$house_rules_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['sublet_policy'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['sublet_policy']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $sublet_policy_dowanload = $sublet_policy_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['sublet_policy'])){
                          $house_rules_path = $base_url.'/storage/web/buildings/'.$buldingData['sublet_policy'];
                          $sublet_policy_dowanload = Url::to(['file/download','n'=>$buldingData['sublet_policy'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$sublet_policy_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$sublet_policy_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('sublet_policy_<?=$buldingData['id']?>','Sublet Policy','<?=$sublet_policy_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['covid_19_policy'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['covid_19_policy']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $covid_19_policy_dowanload = $covid_19_policy_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['covid_19_policy'])){
                          $covid_19_policy_path = $base_url.'/storage/web/buildings/'.$buldingData['covid_19_policy'];
                          $covid_19_policy_dowanload = Url::to(['file/download','n'=>$buldingData['covid_19_policy'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$covid_19_policy_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$covid_19_policy_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('covid_19_policy_<?=$buldingData['id']?>','Covid 19 Policy','<?=$covid_19_policy_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['sublet_application'])){ ?> 
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['sublet_application']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $sublet_application_dowanload = $sublet_application_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['sublet_application'])){
                          $sublet_application_path = $base_url.'/storage/web/buildings/'.$buldingData['sublet_application'];
                          $sublet_application_dowanload = Url::to(['file/download','n'=>$buldingData['sublet_application'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$sublet_application_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$sublet_application_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('sublet_application_<?=$buldingData['id']?>','Sublet Application','<?=$sublet_application_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>
                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['rental_application'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['rental_application']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $rental_application_dowanload = $rental_application_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['rental_application'])){
                          $rental_application_path = $base_url.'/storage/web/buildings/'.$buldingData['rental_application'];
                          $rental_application_dowanload = Url::to(['file/download','n'=>$buldingData['rental_application'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$rental_application_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$rental_application_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('rental_application_<?=$buldingData['id']?>','Rental Application','<?=$rental_application_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              } 
              if(!empty($buldingData['bulk_rate_offering'])){ ?>
                <tr>
                  <td>
                    <div class="user_icon">
                      <h4>
                        <?=Html::img("@web/img/resources/Group 4544.png")?> <?=$buldingData['bulk_rate_offering']?>
                      </h4>
                    </div>
                  </td>                  
                  <td><?=date('Y-m-d', $buldingData['created_at'])?></td>
                  <td><?php
                        $bulk_rate_offering_dowanload = $bulk_rate_offering_path = "jvascript:void(0)"; 
                        if(!empty($buldingData['bulk_rate_offering'])){
                          $bulk_rate_offering_path = $base_url.'/storage/web/buildings/'.$buldingData['bulk_rate_offering'];
                          $bulk_rate_offering_dowanload = Url::to(['file/download','n'=>$buldingData['bulk_rate_offering'],'p'=>'buildings','a'=>'index']);
                        } ?>
                    <ul class="action-list">
                        <li><a href="<?=$bulk_rate_offering_dowanload;?>" class="btn btn btn-primary"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x"><path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path></svg></a></li>
                        <li><a href="<?=$bulk_rate_offering_path?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></li>
                        <li><a href="javascript:void(0)" onclick="sendResourceDoc('bulk_rate_offering_<?=$buldingData['id']?>','Bulk Rate Offering','<?=$bulk_rate_offering_path?>')" class="btn btn-danger"><i class="fa fa-share"></i></a></li>

                    </ul>
                  </td>
                  <td>
                    <div class="dropdown img-dropdwon ">
                      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=Html::img("@web/img/resources/Group 4546.png")?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                      </ul>
                    </div>
                  </td>
                </tr><?php
              }  ?>                                                       
              </tbody>
          </table>
        </div>
      </div><?php
      } else{ ?>
      <div class="no-revelent">
          <div class="left-part-cont">
          <h4>No Relevant documents found!</h4>
          <p>Have you received building documents not in the database? Email them to your client sucess manager and they'll add it!</p>
          <a href="">Contact us here</a>
        </div>
        <div class="right-part-cont">
          <?=Html::img("@web/img/resources/img-relent.png")?>
        </div>
        </div>
      <?php } ?>
    </div>
  </div><?php
  Modal::begin([
          'title' => '<h5>Send Document</h5>',
          'id'=>"sendResourceDoc",
        ]);
      $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'resource-document-send-form', 'class'=>'document-form']);
      $url = Url::toRoute('document/ajax-contact-search'); ?>
      <p class="description-popup">Below choose clients and attach the file to send</p>
      <div id='modalContent'>
        <label>CONTACT NAME</label><?php
          echo Select2::widget([
              'name' => 'contacts',                
              //'data' => $contactData,
              'options' => ['placeholder' => 'Search contacts list here by name or email','multiple' => true],
              'pluginOptions' => [
                  'allowClear' => true, 
                  'class' => 'contact-sent-box',
                  'minimumInputLength' => 3,
                  'ajax' => [
                      'url' => $url,
                      'dataType' => 'json',
                      'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                      //'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                  ], 
                  'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                  'templateResult' => new JsExpression('function(contacts) { return contacts.text; }'),
                  'templateSelection' => new JsExpression('function (contacts) { return contacts.text; }'),                  
              ],
          ]);?> 
          <div id="hidden_data"></div>
          <input type="hidden" id="document_id" name="document_id" value="">
      </div>
      <div class="selsected_doc">
          <p>Selected Documents</p>
          <div class="doc_display"></div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="background: transparent; color: #9d9d9d;">Cancel</button>
          <?= Html::Button('Send', ['class' => 'btn btn-primary', 'onClick'=>'sendResourceDocument("resource-document-send-form")']) ?>       
    </div>
    <?php ActiveForm::end(); ?>
    <div class="message"></div><?php
  Modal::end(); ?>
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
function sendResourceDoc(doc_id,doc_name,doc_path) {
    $('#sendResourceDoc').modal('show');
    $('.doc_display').html("");
    $('#hidden_data').html("");
    $("#document_id").val("");
    var document_ids =[];
    var image = '<?=Html::img("@web/img/Group 4511.png")?>';
    $( ".doc_display" ).append("<div class='selected_doc'><a href='"+doc_path+"'>"+image+doc_name+"</a></div>" );
    $( "#hidden_data" ).append("<input type='hidden' id='form_doc_path_"+doc_id+"' name='form_doc_path_"+doc_id+"' value='"+doc_path+"'>");
    $( "#hidden_data" ).append("<input type='hidden' id='form_doc_name_"+doc_id+"' name='form_doc_name_"+doc_id+"' value='"+doc_name+"'>");
    document_ids.push(doc_id);
    $("#document_id").val(document_ids);
}



function sendResourceDocument(id) {
    var myData = new FormData($('#'+id)[0]);
    //alert(myData);
    $.ajax({
        url: '<?php echo Url::toRoute('resources/ajax-document-send'); ?>',
        type: 'POST',
        //cache: false,
        data: myData,
        processData: false,
        contentType: false,
        //dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          if(data == 'success'){
            $(".message").append("<div class='success'>Document Send Successfully</div>");  
            $('#sendDoc').modal('hide');
            location.reload();
          }else{
            $(".message").append("<div class='error'>Document Send Successfully</div>"); 
          }
        },
        error: function () {
            alert("ERROR in send");
        }
    });
}

</script>