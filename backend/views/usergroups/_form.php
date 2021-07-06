<?php 

use yii\helpers\Html;
use kartik\bs4dropdown\Dropdown;
use kartik\bs4dropdown\ButtonDropdown;
//use common\models\Tree;

// use yii\widgets\ActiveForm;
use common\components\AdminPrivileges;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
//use kartik\tree\TreeView;
use \common\models\CommonModel;
$model->usertype='admin';
?>
<div class="buildings-create">
  <div class="buildings-form"><?php 
    $form = ActiveForm::begin([
     'options' => ['enctype' => 'multipart/form-data',
         'class' => 'form-horizontal adminex-form',
         'id' => 'hrm-user-groups-form']
    ]); ?>
      <div class="card">
        <div class="card-body">
          <ul id="treeList">  
            <li>  
              <input type="checkbox" name="allpermission" id="allpermission"> Root  
              <ul>  
                <li>
                  <span class="toggle_icon_contact" id="contact">
                    <i class="fas fa-plus"></i>
                  </span>
                  <?php //print_r($model->contact);die; ?>
                  <input type="checkbox" name="Contact" <?=!empty($model->contact)?'checked':''?>> Contact
                  <ul>
                    <?= $form->field($model, 'contact',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forContact(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>
                </li>  
                <li>  
                  <span class="toggle_icon_contactlist" id="ContactList">
                    <i class="fas fa-plus"></i>
                  </span>
                  <input type="checkbox" name="ContactList" <?=!empty($model->contactlist)?'checked':''?>> Contact List  
                  <ul>
                    <?= $form->field($model, 'contactlist',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forContactList(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li> 
                <li>  
                  <span class="toggle_icon_template" id="Template">
                    <i class="fas fa-plus"></i>
                  </span>
                  <input type="checkbox" name="Template" <?=!empty($model->template)?'checked':''?>> Template      
                  <ul>
                    <?= $form->field($model, 'template',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forTemplate(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_category" id="Category">
                    <i class="fas fa-plus"></i>
                  </span>
                  <input type="checkbox" name="Category" <?=!empty($model->category)?'checked':''?>> Category
                  <ul>
                    <?= $form->field($model, 'category',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forCategory(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_form" id="Form">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Form" <?=!empty($model->form)?'checked':''?>> Form
                  <ul>
                    <?= $form->field($model, 'form',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forForm(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li> 
                <li>  
                  <span class="toggle_icon_clientdata" id="ClientData">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="ClientData" <?=!empty($model->clientdata)?'checked':''?>> ClientData
                  <ul>
                    <?= $form->field($model, 'clientdata',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forClientData(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li> 
                <li>  
                  <span class="toggle_icon_buildings" id="Buildings">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Buildings" <?=!empty($model->buildings)?'checked':''?>> Buildings
                  <ul>
                    <?= $form->field($model, 'buildings',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forBuildings(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li> 
                <li>  
                  <span class="toggle_icon_supports" id="Supports">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Supports" <?=!empty($model->supports)?'checked':''?>> Supports
                  <ul>
                    <?= $form->field($model, 'supports',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forSupports(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_training" id="Training">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Training" <?=!empty($model->training)?'checked':''?>> Training
                  <ul>
                    <?= $form->field($model, 'training',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forTraining(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_document" id="Document">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Document" <?=!empty($model->document)?'checked':''?>> Document
                  <ul>
                    <?= $form->field($model, 'document',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forDocument(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_timelineevent" id="Timeline-Event">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Timeline-Event" <?=!empty($model->timelineevent)?'checked':''?>> Timeline-Event
                  <ul>
                    <?= $form->field($model, 'timelineevent',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forTimelineevent(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_rets" id="Rets">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Rets" <?=!empty($model->rets)?'checked':''?>> Rets
                  <ul>
                    <?= $form->field($model, 'rets',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forRets(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li> 
                <li>  
                  <span class="toggle_icon_leaderboard" id="Leaderboard">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Leaderboard" <?=!empty($model->leaderboard)?'checked':''?>> Leaderboard
                  <ul>
                    <?= $form->field($model, 'leaderboard',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forRets(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_staticpage" id="StaticPage">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="StaticPage" <?=!empty($model->staticpage)?'checked':''?>> StaticPage
                  <ul>
                    <?= $form->field($model, 'staticpage',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forStaticPage(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_article" id="Article">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Article" <?=!empty($model->article)?'checked':''?>> Article
                  <ul>
                    <?= $form->field($model, 'article',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forArticle(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>
                <li>  
                  <span class="toggle_icon_category1" id="Category">
                    <i class="fas fa-plus"></i>
                  </span>  
                  <input type="checkbox" name="Category" <?=!empty($model->category1)?'checked':''?>> Category
                  <ul>
                    <?= $form->field($model, 'category1',['template'=> "{input}\n{error}",'options' => ['class' => '']])->checkboxList(AdminPrivileges::forCategorycon(),['class' => 'groupContacts contactcheck'])->label(false);?>
                  </ul>          
                </li>  
              </ul>
            </li>
          </ul>
          <div class="form-group">
           <div class="col-sm-offset-5 col-sm-3 save-btm-on">
               <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
               <a href="<?= yii::$app->urlManager->createUrl('usergroups')?>" class="btn btn-default">Cancel</a>
           </div>
          </div>
        </div>
      </div>
      <?php  ActiveForm::end(); ?>
    </div>
  </div>
   

<script>
  $('#usergroups-contact').hide();
  $('#contact').toggle(function() {
    $('.toggle_icon_contact').html('<i class="fas fa-minus">');
    $('#usergroups-contact').slideToggle();
  }, function() {
      $('.toggle_icon_contact').html('<i class="fas fa-plus">');
      $('#usergroups-contact').slideToggle();
  });
  $('#usergroups-contactlist').hide();
  $('#ContactList').toggle(function() {
    $('.toggle_icon_contactlist').html('<i class="fas fa-minus">');
    $('#usergroups-contactlist').slideToggle();
  }, function() {
      $('.toggle_icon_contactlist').html('<i class="fas fa-plus">');
      $('#usergroups-contactlist').slideToggle();
  });
  $('#usergroups-template').hide();
  $('#Template').toggle(function() {
    $('.toggle_icon_template').html('<i class="fas fa-minus">');
    $('#usergroups-template').slideToggle();
  }, function() {
      $('.toggle_icon_template').html('<i class="fas fa-plus">');
      $('#usergroups-template').slideToggle();
  });
  $('#usergroups-category').hide();
  $('#Category').toggle(function() {
    $('.toggle_icon_category').html('<i class="fas fa-minus">');
    $('#usergroups-category').slideToggle();
  }, function() {
      $('.toggle_icon_category').html('<i class="fas fa-plus">');
      $('#usergroups-category').slideToggle();
  });
  $('#usergroups-form').hide();
  $('#Form').toggle(function() {
    $('.toggle_icon_form').html('<i class="fas fa-minus">');
    $('#usergroups-form').slideToggle();
  }, function() {
      $('.toggle_icon_form').html('<i class="fas fa-plus">');
      $('#usergroups-form').slideToggle();
  });
  $('#usergroups-clientdata').hide();
  $('#ClientData').toggle(function() {
    $('.toggle_icon_clientdata').html('<i class="fas fa-minus">');
    $('#usergroups-clientdata').slideToggle();
  }, function() {
      $('.toggle_icon_clientdata').html('<i class="fas fa-plus">');
      $('#usergroups-clientdata').slideToggle();
  });
  $('#usergroups-buildings').hide();
  $('#Buildings').toggle(function() {
    $('.toggle_icon_buildings').html('<i class="fas fa-minus">');
    $('#usergroups-buildings').slideToggle();
  }, function() {
      $('.toggle_icon_buildings').html('<i class="fas fa-plus">');
      $('#usergroups-buildings').slideToggle();
  });
  $('#usergroups-supports').hide();
  $('#Supports').toggle(function() {
    $('.toggle_icon_supports').html('<i class="fas fa-minus">');
    $('#usergroups-supports').slideToggle();
  }, function() {
      $('.toggle_icon_supports').html('<i class="fas fa-plus">');
      $('#usergroups-supports').slideToggle();
  });
  $('#usergroups-training').hide();
  $('#Training').toggle(function() {
    $('.toggle_icon_training').html('<i class="fas fa-minus">');
    $('#usergroups-training').slideToggle();
  }, function() {
      $('.toggle_icon_training').html('<i class="fas fa-plus">');
      $('#usergroups-training').slideToggle();
  });
  $('#usergroups-document').hide();
  $('#Document').toggle(function() {
    $('.toggle_icon_document').html('<i class="fas fa-minus">');
    $('#usergroups-document').slideToggle();
  }, function() {
      $('.toggle_icon_document').html('<i class="fas fa-plus">');
      $('#usergroups-document').slideToggle();
  });
  $('#usergroups-timelineevent').hide();
  $('#Timeline-Event').toggle(function() {
    $('.toggle_icon_timelineevent').html('<i class="fas fa-minus">');
    $('#usergroups-timelineevent').slideToggle();
  }, function() {
      $('.toggle_icon_timelineevent').html('<i class="fas fa-plus">');
      $('#usergroups-timelineevent').slideToggle();
  });
  $('#usergroups-rets').hide();
  $('#Rets').toggle(function() {
    $('.toggle_icon_rets').html('<i class="fas fa-minus">');
    $('#usergroups-rets').slideToggle();
  }, function() {
      $('.toggle_icon_rets').html('<i class="fas fa-plus">');
      $('#usergroups-rets').slideToggle();
  });
  $('#usergroups-leaderboard').hide();
  $('#Leaderboard').toggle(function() {
    $('.toggle_icon_leaderboard').html('<i class="fas fa-minus">');
    $('#usergroups-leaderboard').slideToggle();
  }, function() {
      $('.toggle_icon_leaderboard').html('<i class="fas fa-plus">');
      $('#usergroups-leaderboard').slideToggle();
  });
  $('#usergroups-staticpage').hide();
  $('#StaticPage').toggle(function() {
    $('.toggle_icon_staticpage').html('<i class="fas fa-minus">');
    $('#usergroups-staticpage').slideToggle();
  }, function() {
      $('.toggle_icon_staticpage').html('<i class="fas fa-plus">');
      $('#usergroups-staticpage').slideToggle();
  });
  $('#usergroups-article').hide();
  $('#Article').toggle(function() {
    $('.toggle_icon_article').html('<i class="fas fa-minus">');
    $('#usergroups-article').slideToggle();
  }, function() {
      $('.toggle_icon_article').html('<i class="fas fa-plus">');
      $('#usergroups-article').slideToggle();
  });
  $('#usergroups-category1').hide();
  $('#Category').toggle(function() {
    $('.toggle_icon_category1').html('<i class="fas fa-minus">');
    $('#usergroups-category1').slideToggle();
  }, function() {
      $('.toggle_icon_category1').html('<i class="fas fa-plus">');
      $('#usergroups-category1').slideToggle();
  });

if($("#treeList :checkbox:checked").length>0){
    $("#allpermission").prop('checked', true); 
}
$('#treeList :checkbox').change(function() {  
  $(this).siblings('ul').find(':checkbox').prop('checked', this.checked);  
  if (this.checked) { 
    $(this).parentsUntil('#treeList', 'ul').siblings(':checkbox').prop('checked', true);  
  } else {  
    $(this).parentsUntil('#treeList', 'ul').each(function() {  
        var $this = $(this);  
        var childSelected = $this.find(':checkbox:checked').length;  
        if (!childSelected) {  
            $this.prev(':checkbox').prop('checked', false);  
        }  
    });  
    }  
});
</script>