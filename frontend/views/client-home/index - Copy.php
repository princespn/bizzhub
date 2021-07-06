<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
$this->title = Yii::$app->name;
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
                  </div>
                    <div class="Financial-boxx">
                        <h4>Financial Recornd</h4>
                        <ul>
                          <li>
                          <?=Html::img('@web/img/Tax_Returns_Unopened.png');?>
                          <p>Tex Returns</p>
                        </li>
                        <li>
                          <?=Html::img('@web/img/W2_1099s_Unopened.png');?>
                          <p>W2s and 1099s</p>
                        </li>
                      </ul>
                    </div>
                      <div class="Financial-boxx">
                        <h4>Employment</h4>
                        <ul>
                          <li>
                          <?=Html::img('@web/img/Verification_Unopened.png');?>
                          <p>Verification</p>
                        </li>
                        <li>
                          <?=Html::img('@web/img/Pay_Stubs_Unopened.png');?>
                          <p>Pay Stub</p>
                        </li>
                      </ul>
                    </div>
                      
                     <div class="Financial-boxx">
                        <h4>References</h4>
                        <ul>
                          <li>
                            <?=Html::img('@web/img/Personal_Unopened.png');?>
                          <p>Personal</p>
                        </li>
                        <li>
                          <?=Html::img('@web/img/Professional_Unopened.png');?>
                          <p>Professional</p>
                        </li>
                      </ul>
                    </div>
                    <div class="Financial-boxx">
                        <h4>Assets & Liabilities</h4>
                        <ul>
                          <li>
                            <?=Html::img('@web/img/Bank_Accounts_Unopened.png');?>
                          <p>bank Account</p>
                        </li>
                        <li>
                          <?=Html::img('@web/img/Stocks_Bonds_Unopened.png');?>
                          <p>Stocks/Bonds</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Retirement_Unopened.png');?>
                          <p>Retirement</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Life_Insurance_Unopened.png');?>
                          <p>Life Insurance</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Real_Estate_Unopened.png');?>
                          <p>Real Estate</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Motor_Vehicles_Unopened.png');?>
                          <p>Motor Vehicles</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Gifts_Unopened.png');?>
                          <p>Gifts</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Student_Loans_Unopened.png');?>
                          <p>Student Loans</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Personal_Loans_Unopened.png');?>
                          <p>Personal Loans</p>
                        </li>
                         <li>
                          <?=Html::img('@web/img/Credit_Cards_Unopened.png');?>
                          <p>Credit Cards</p>
                        </li>
                      </ul>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="personal-boxx">
                  <?=Html::img('@web/img/home-1.png');?>
                  <h1>Welcome to your personal<br>
                    transaction dashboard!</h1>
                    <div class="icons-colors">
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
              <div class="col-md-3">
                <div>
                   <div class="application-status ">
                        <h4>Application Status</h4>
                        <ul>
                        <li class="application-boxx status-boxxx">
                          <?=Html::img('@web/img/present.png');?>
                        <p class="address-box">[[123 Address #1]]</p>
                         <span>[[New York, NY 10040]]</span>
                        </li>
                      </ul>
                    </div>
                    <div class="application-status status-boxxx">
                        <h4>Profile Selector</h4>
                        <div class="Profile">
                          <?=Html::img('@web/img/md.png');?>
                          <P>[[C1FName]]</P>
                        </div>
                         <div class="Profile">
                          <?=Html::img('@web/img/bm.png');?>
                          <P>[[C1FName]]</P>
                        </div>
                    </div>
                     <div class="application-status status-boxxx">
                        <h4>Your Success Manager</h4>
                       <div class="success-manager">
                        <?=Html::img('@web/img/user.png');?>
                         <p>Laura Zirkle</p>
                          <p>(###) ###-####</p>
                           <p>louro@bizzorroagency.com</p>
                       </div>
                    </div>
                     <div class="application-status status-boxxx">
                        <h4>Your Real Estate Agent</h4>
                       <div class="success-manager">
                        <?=Html::img('@web/img/user.png');?>
                         <p>Laura Zirkle</p>
                          <p>(###) ###-####</p>
                           <p>louro@bizzorroagency.com</p>
                       </div>
                    </div>
                     <div class="application-status status-boxxx">
                        <h4>Your Real Estate Attorney</h4>
                       <div class="success-manager">
                        <?=Html::img('@web/img/md.png');?>
                         <p>Laura Zirkle</p>
                          <p>(###) ###-####</p>
                           <p>louro@bizzorroagency.com</p>
                       </div>
                    </div>
                     <div class="application-status status-boxxx">
                        <h4>Your Mortgage Lender</h4>
                       <div class="success-manager">
                        <?=Html::img('@web/img/user-1.png');?>
                         <div class="add-boxx">Add Mortgage Lender </div>
                       </div>
                    </div>
                   
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
</div>