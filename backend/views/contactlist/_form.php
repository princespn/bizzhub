<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */

//$agent_array=User::find()->select(['username'])->One();
//echo $agent_array;
?>

<div class="buildings-create">
    <div class="buildings-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'list_name');?>
                    </div>
                    <div class="form-group col-md-6">
                    <?=$form->field($model, 'list_key')->textInput(['placeholder'=> 'default_list']);?>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <?php
                    if ($model->user_id!='Array') {
                       echo $form->field($model, 'user_id')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    }
                      else{
                         echo $form->field($model, 'user_id[]')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                      } ?>
                    </div>
                    <div class="form-group col-md-6">
                    <?php $type=['1'=>'Active','2'=>'In Active'] ?>
                    <?= $form->field($model, 'status')->dropDownList($type,['class'=>'form-control']) ?>
                    </div>
                </div>
            </div>      

            <div class="card-footer">
                <?php echo Html::submitButton(Yii::t('backend', (!$model->isNewRecord)  ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>






<?php /*
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
          
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data',
                                        'class' => 'form-horizontal adminex-form'],
                       
                    ]); ?>
   
            <div class="form-group">
               <label for="textfield" class="form-group col-md-6"> List Name</label>
                <div class="col-lg-5">
                    <?= $form->field($model, 'list_name', ['template'=>"{input}\n{error}", 'options' => ['class' => ''] ])->textInput(['class'=>'form-control'])->label(false); ?>
                                        </div>
                </div>

                <div class="col-lg-7">
                    <div class="col-lg-7">
                    <?php
                    if ($model->user_id!='Array') {
                       echo $form->field($model, 'user_id')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    }
                      else{
                         echo $form->field($model, 'user_id[]')->widget(Select2::classname(), [
                            'data' => $agent_array,
                            'options' => ['multiple' => true,'placeholder' => 'Select a agent','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                      }



                        ?>
                    </div>
                </div>  

            
             <div class="form-group">
                <label for="textfield" class="form-group col-md-6">Status</label>
                 <div class="col-lg-5">
                        <?= $form->field($model, 'status', ['template'=>"{input}\n{error}", 'options' => ['class' => ''] ])->dropDownList(['1' => 'Active', '0' => 'In Active'], ['class'=>'form-control select2']) ?>

                    </div>
                </div>

     <div class="form-group">  

                        <div class="col-lg-offset-5 col-lg-3">
                            <?php echo Html::submitButton(Yii::t('backend', $id != 0 ? 'Update' : 'Create'), ['class' => 'btn btn-primary']) ?>
                <a href="<?= yii::$app->urlManager->createUrl('contactlist')?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>      
    <?php ActiveForm::end(); ?>
  </div>    
        </section>
    </div>
</div> */ ?>