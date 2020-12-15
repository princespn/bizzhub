<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="">
        <?php /*echo \common\widgets\DbCarousel::widget([
            'key' => 'index',
            'assetManager' => Yii::$app->getAssetManager(),
            'options' => [
                'class' => 'slide', // enables slide effect
            ],
        ]) */?>

        <section class="section-part mt-5">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="exclusive-list">
                          <div class="list-head">
                              <h2>Exclusive Listings</h2>
                          </div>
                          <div class="exc-table">
                              <table class="table">
                                  <h3 class="table-head">Studio</h3>
                                    <thead>
                                      <tr>
                                        <th scope="col">$235K</th>
                                        <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                        <th scope="col">Hudon Heights</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td scope="row">
                                          <ul class="icon-img">
                                              <li><?php echo Html::img('@web/img/icon1.png'); ?>
                                                  <?php echo Html::img('@web/img/icon2.png'); ?></li>
                                              <li><?php echo Html::img('@web/img/icon3.png'); ?>
                                                  <?php echo Html::img('@web/img/icon4.png'); ?></li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Type: Co-op</li>
                                              <li>Agent: Matthew</li>
                                              <li>Status: Listed</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Vacant: Yes</li>
                                              <li>Keys: Yes</li>
                                              <li>Pets: Yes</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Maintenance: $982</li>
                                              <li>AssessmentNo</li>
                                              <li>Financing:80%</li>
                                          </ul>
                                        </td>
                                      </tr>
                                    </tbody>
                                  <thead>
                                      <tr>
                                        <th scope="col">$235K</th>
                                        <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                        <th scope="col">Hudon Heights</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td scope="row">
                                          <ul class="icon-img">
                                              <li><?=Html::img('@web/img/icon1.png'); ?>
                                                  <?=Html::img('@web/img/icon2.png'); ?></li>
                                              <li><?=Html::img('@web/img/icon3.png'); ?>
                                                  <?=Html::img('@web/img/icon4.png'); ?></li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Type: Co-op</li>
                                              <li>Agent: Matthew</li>
                                              <li>Status: Listed</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Vacant: Yes</li>
                                              <li>Keys: Yes</li>
                                              <li>Pets: Yes</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Maintenance: $982</li>
                                              <li>AssessmentNo</li>
                                              <li>Financing:80%</li>
                                          </ul>
                                        </td>
                                      </tr>
                                  </tbody>
                              </table>
          
                              <table class="table">
                                  <h3 class="table-head">One Bedrooms</h3>
                                  <thead>
                                      <tr>
                                        <th scope="col">$235K</th>
                                        <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                        <th scope="col">Hudon Heights</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td scope="row">
                                          <ul class="icon-img">
                                              <li><?=Html::img('@web/img/icon1.png'); ?>
                                                  <?=Html::img('@web/img/icon2.png'); ?></li>
                                              <li><?=Html::img('@web/img/icon3.png'); ?>
                                                  <?=Html::img('@web/img/icon4.png'); ?></li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Type: Co-op</li>
                                              <li>Agent: Matthew</li>
                                              <li>Status: Listed</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Vacant: Yes</li>
                                              <li>Keys: Yes</li>
                                              <li>Pets: Yes</li>
                                          </ul>
                                        </td>
                                        <td>
                                          <ul class="room-type">
                                              <li>Maintenance: $982</li>
                                              <li>AssessmentNo</li>
                                              <li>Financing:80%</li>
                                          </ul>
                                        </td>
                                      </tr>
                                  </tbody>

                                 <thead>
                                  <tr>
                                    <th scope="col">$235K</th>
                                    <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                    <th scope="col">Hudon Heights</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">
                                      <ul class="icon-img">
                                          <li><?=Html::img('@web/img/icon1.png'); ?>
                                              <?=Html::img('@web/img/icon2.png'); ?></li>
                                          <li><?=Html::img('@web/img/icon3.png'); ?>
                                              <?=Html::img('@web/img/icon4.png'); ?></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Type: Co-op</li>
                                          <li>Agent: Matthew</li>
                                          <li>Status: Listed</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Vacant: Yes</li>
                                          <li>Keys: Yes</li>
                                          <li>Pets: Yes</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Maintenance: $982</li>
                                          <li>AssessmentNo</li>
                                          <li>Financing:80%</li>
                                      </ul>
                                    </td>
                                  </tr>
                                </tbody>
                                <thead>
                                  <tr>
                                    <th scope="col">$235K</th>
                                    <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                    <th scope="col">Hudon Heights</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">
                                      <ul class="icon-img">
                                          <li><?=Html::img('@web/img/icon1.png'); ?>
                                              <?=Html::img('@web/img/icon2.png'); ?></li>
                                          <li><?=Html::img('@web/img/icon3.png'); ?>
                                              <?=Html::img('@web/img/icon4.png'); ?></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Type: Co-op</li>
                                          <li>Agent: Matthew</li>
                                          <li>Status: Listed</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Vacant: Yes</li>
                                          <li>Keys: Yes</li>
                                          <li>Pets: Yes</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Maintenance: $982</li>
                                          <li>AssessmentNo</li>
                                          <li>Financing:80%</li>
                                      </ul>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table class="table">
                                  <h3 class="table-head">Two Bedrooms</h3>
                                <thead>
                                  <tr>
                                    <th scope="col">$235K</th>
                                    <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                    <th scope="col">Hudon Heights</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">
                                      <ul class="icon-img">
                                          <li><?=Html::img('@web/img/icon1.png'); ?>
                                              <?=Html::img('@web/img/icon2.png'); ?></li>
                                          <li><?=Html::img('@web/img/icon3.png'); ?>
                                              <?=Html::img('@web/img/icon4.png'); ?></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Type: Co-op</li>
                                          <li>Agent: Matthew</li>
                                          <li>Status: Listed</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Vacant: Yes</li>
                                          <li>Keys: Yes</li>
                                          <li>Pets: Yes</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Maintenance: $982</li>
                                          <li>AssessmentNo</li>
                                          <li>Financing:80%</li>
                                      </ul>
                                    </td>
                                  </tr>
                              </tbody>
                                  <thead>
                                  <tr>
                                    <th scope="col">$235K</th>
                                    <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                    <th scope="col">Hudon Heights</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">
                                      <ul class="icon-img">
                                          <li><?=Html::img('@web/img/icon1.png'); ?>
                                              <?=Html::img('@web/img/icon2.png'); ?></li>
                                          <li><?=Html::img('@web/img/icon3.png'); ?>
                                              <?=Html::img('@web/img/icon4.png'); ?></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Type: Co-op</li>
                                          <li>Agent: Matthew</li>
                                          <li>Status: Listed</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Vacant: Yes</li>
                                          <li>Keys: Yes</li>
                                          <li>Pets: Yes</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Maintenance: $982</li>
                                          <li>AssessmentNo</li>
                                          <li>Financing:80%</li>
                                      </ul>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table class="table">
                                  <h3 class="table-head">Townhouses</h3>
                                <thead>
                                  <tr>
                                    <th scope="col">$235K</th>
                                    <th scope="col" colspan="2">269 Bennett Avenue 8E</th>
                                    <th scope="col">Hudon Heights</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">
                                      <ul class="icon-img">
                                          <li><?=Html::img('@web/img/icon1.png'); ?>
                                              <?=Html::img('@web/img/icon2.png'); ?></li>
                                          <li><?=Html::img('@web/img/icon3.png'); ?>
                                              <?=Html::img('@web/img/icon4.png'); ?></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Type: Co-op</li>
                                          <li>Agent: Matthew</li>
                                          <li>Status: Listed</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Vacant: Yes</li>
                                          <li>Keys: Yes</li>
                                          <li>Pets: Yes</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul class="room-type">
                                          <li>Maintenance: $982</li>
                                          <li>AssessmentNo</li>
                                          <li>Financing:80%</li>
                                      </ul>
                                    </td>
                                  </tr>
                              </tbody>
                              </table>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="exclusive-list">
                        <div class="contact-box">
                          <div class="list-head">
                            <h2>Add a New Contact</h2>
                          </div>
                          <?php $form = ActiveForm::begin(['id' => 'contact-form', 'class'=>'contact-form']); ?>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <?=$form->field($contact, 'first_name',)->textInput(['class'=>'form-control','placeholder' =>'First Name'])->label(false) ?>
                              </div>
                              <div class="form-group col-md-6">
                                <?=$form->field($contact, 'last_name',)->textInput(['class'=>'form-control','placeholder' =>'Last Name'])->label(false) ?>
                              </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-12">
                              <?=$form->field($contact, 'email',)->textInput(['class'=>'form-control','placeholder' =>'Email'])->label(false) ?>
                            </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label" for="gridCheck">
                                   Send REBNY
                                  </label>
                                </div>
                              </div>
                              <div class="form-group col-md-6">
                                <?= Html::Button('Submit',['class'=>'btn sub-btn pull-right','onclick'=>'addContact();']); ?>     
                              </div>
                          <?php ActiveForm::end(); ?>
                          <div class="show_message"></div>
                          <div class="loading_img_div">
                              <?= Html::img('@web/img/loading-image.gif', ['id' => 'loading-image']) ?>
                          </div>
                        </div>
                          <div class="alert-box">
                              <div class="list-head">
                                  <h2>Alerts</h2>
                              </div>
                              <div class="alert-listing">
                                  <div class="alert alert-dismissible">
                                      <?=Html::a(Html::img('@web/img/pink cross.png',['class'=>'close']), 'javascript:void(0)', ['class'=>'close','data-dismiss'=>'alert','aria-label'=>'close']);?> 
                                      <img src="">
                                   <span>John Connery ﬁnished their REBNY Financial Statement!  </span>
                                  </div>
                                  <div class="alert alert-dismissible">
                                    <?=Html::a(Html::img('@web/img/pink cross.png',['class'=>'close']), 'javascript:void(0)', ['class'=>'close','data-dismiss'=>'alert','aria-label'=>'close']);?>
                                   <span>John Connery ﬁnished their REBNY Financial Statement!  </span>
                                  </div>
                                  <div class="alert alert-dismissible">
                                    <?=Html::a(Html::img('@web/img/pink cross.png',['class'=>'close']), 'javascript:void(0)', ['class'=>'close','data-dismiss'=>'alert','aria-label'=>'close']);?>
                                   <span>John Connery ﬁnished their REBNY Financial Statement!  </span>
                                  </div>
                                  <div class="alert alert-dismissible">
                                    <?=Html::a(Html::img('@web/img/pink cross.png',['class'=>'close']), 'javascript:void(0)', ['class'=>'close','data-dismiss'=>'alert','aria-label'=>'close']);?>
                                   <span>John Connery ﬁnished their REBNY Financial Statement!  </span>
                                  </div>
                                  <div class="alert alert-dismissible">
                                    <?=Html::a(Html::img('@web/img/pink cross.png',['class'=>'close']), 'javascript:void(0)', ['class'=>'close','data-dismiss'=>'alert','aria-label'=>'close']);?>
                                   <span>John Connery ﬁnished their REBNY Financial Statement!  </span>
                                  </div>
                              </div>
                          </div>

                          <div class="finacnce-box">
                              <div class="list-head">
                                  <h2>REBNY Financial Statements</h2>
                              </div>
                              <div class="table-fin">
                                  <form class="form-inline">
                                      <input type="text" class="form-control" placeholder="Email the REBNY App to a client">
                                      <button type="submit" class="btn">Send</button>
                                  </form>
                                  <div class="finance-table">
                                      <table class="table">
                                          <tbody>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?>
                                              </td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?>
                                              </td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?></td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?></td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?></td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?></td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?></td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?></td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?></td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?></td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                            <tr>
                                              <td>Client Name</td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'Pre-Approval', 'javascript:void(0)', ['class'=>'btn pre-btn']);?></td>
                                              <td><?=Html::a(Html::img('@web/img/download.png').' '.'REBNY', 'javascript:void(0)', ['class'=>'btn rebny-btn']);?></td>
                                              <td><?=Html::a('Edit Form', 'javascript:void(0)', ['class'=>'edit-btn']);?></td>
                                            </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>

                          <div class="leaderboard-box">
                              <div class="list-head">
                                  <h2>Leaderboard</h2>
                              </div>
                              <div class="table-fin">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Agent</th>
                                        <th scope="col">Deals in Contract</th>
                                        <th scope="col">Closed Deals</th>
                                        <th scope="col">Zillow Reviews</th>
                                        <th scope="col">C-SET Score</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="first-row">
                                        <td scope="row">1<sup>st</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr class="second-row">
                                        <td scope="row">2<sup>nd</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr class="third-row">
                                        <td scope="row">3<sup>rd</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">4<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">5<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">6<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">7<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">8<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">9<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                      <tr>
                                        <td scope="row">10<sup>th</sup></td>
                                        <td>Pedro Parades</td>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>36</td>
                                        <td>91</td>
                                      </tr>
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
      </section> 

    </div>
</div>
<style type="text/css">
  .loading_img_div{
    text-align: center;
    display: none;
   } 
  .show_message{
    display: none;
  } 
  form#contact-form {
    margin-top: 15px;
}
.loading_img_div img {
    max-width: 5%; margin-bottom: 10px;
}
</style>
<script type="text/javascript">
  function addContact(){
  var myData = new FormData($('#contact-form')[0])
  $.ajax({
      url: '<?php echo Url::toRoute('home/ajax-add-contact'); ?>',
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
        alert(1);
        $(".show_message").show();
        $(".show_message").html(data);
        $(".loading_img_div").hide();
      },
      error: function () {
          alert("ERROR in upload");
      }
  });
}
</script>
