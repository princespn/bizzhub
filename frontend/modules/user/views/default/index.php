<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings')
?>

<div class="content-wrapper" style="min-height: 902.8px;">
    <div class="dashboard_right_detail">
        <div class="setting-page">
            <?php $form = ActiveForm::begin(); ?>
                <div class="setting-form">
                    <div class="setting-rofile">
                    <?php echo $form->field($model->getModel('profile'), 'picture')->widget(
                        Upload::class,
                        [
                            'url' => ['avatar-upload']
                        ]
                    )?>
                    </div>
                    <h3 class="setting-title">General</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="form-group">
                                <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255, 'class'=>'form-control']) ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="form-group">
                                <?php echo $form->field($model->getModel('profile'), 'middlename')->textInput(['maxlength' => 255]) ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="form-group">
                                <?php echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) ?>
                            </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="form-group">
                                <?php echo $form->field($model->getModel('account'), 'email')->input('email') ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="form-group">
                                <?php echo $form->field($model->getModel('profile'), 'phone')->textInput(['maxlength' => 10]) ?>
                            </div>
                        </div>   
                    </div>
                        </div>
                <div class="setting-form setting-form33">
                    <h3 class="setting-title">Change Password</h3>
                    <div class="row"><?php /*
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="disabledTextInput">OLD PASSWORD</label>
                                <input type="password" id="disabledTextInput" class="form-control" value="00000">
                            </div>
                        </div>*/ ?>
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>
                        </div>
                    </div>
                    <div class="text-right">
                        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
                    </div>                    
                </div>
                
            <?php ActiveForm::end(); ?>            
        </div>    
    </div>
</div>

