<?php
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\ActiveForm;
$this->title = Yii::$app->name;
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
?>
<div class="content-wrapper" style="min-height: 902.8px;">
    <div class="dashboard_right_detail">
        <div class="doocuments-header">
            <button onclick="sendMultipleDoc()" class="btn btn-primary">
            Send <i class="fas fa-share"></i>
            </button>
            <div class="document-search">
                <input autocomplete="off" type="search" id="search_doc_query" name="q" placeholder="Search...">
                <?=Html::img("@web/img/resources/Group 4551.png")?>
            </div>
        </div>
        <div class="documents-tabss">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="header-documnetstabs">
                    <div class="tabs-title">
                        <h6>Categories</h6>
                        <div class="dropdown img-dropdwon">
                            <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?=Html::img("@web/img/resources/Group 4546.png")?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tabs-domcunte-left">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="cat_all" class="cat_tab active"><a href="javascript:void()" onclick="ShowCatDoc('all')"><?=Html::img("@web/img/Group 4501.png")?>  All</a></li><?php
                            $cat_image = "@web/img/Group 4511.png";
                            foreach($category as $catKey => $catData){ 
                                if($catKey > 1){
                                    continue;
                                }
                                if(!empty($catData['image_path'])){
                                    $cat_image = $catData['image_base_url'].'/'.$catData['image_path'];
                                }?>
                                <li id="cat_<?=$catData['id']?>" class="cat_tab "><a href="javascript:void()" onclick="ShowCatDoc(<?=$catData['id']?>)"><?=Html::img($cat_image,['alt'=>$catData['title']])?><?=$catData['title']?></a></li>
                                <?php
                            }?>
                            <input type="hidden" id="selected_doc_category_id" name="doc_id" value="">
                        </ul>
                    </div>
                    <div class="tabs-title">
                        <h6>Other Types</h6>
                        <div class="dropdown img-dropdwon">
                            <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?=Html::img("@web/img/resources/Group 4546.png")?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#"><i class="fa fa-plus"></i> Add New</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tabs-domcunte-left others-tpyes">
                        <ul class=""><?php
                            $cat_image = "@web/img/Group 4511.png";
                            foreach($category as $catKey => $catData){ 
                                if($catKey < 2){
                                    continue;
                                }
                                if(!empty($catData['image_path'])){
                                    $cat_image = $catData['image_base_url'].'/'.$catData['image_path'];
                                }?>
                                <li id="cat_<?=$catData['id']?>" class="cat_tab "><a href="javascript:void()" onclick="ShowCatDoc(<?=$catData['id']?>,'')"><?=Html::img($cat_image)?><?=$catData['title']?></a></li><?php
                            } ?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12" >
                    <div class="tab-content tabs">
                        <div id="catDoc">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    Modal::begin([
            'title' => '<h5>Send Document</h5>',
            'id'=>"sendDoc",
         ]);
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'document-send-form', 'class'=>'document-form']);
        $url = Url::toRoute('document/ajax-contact-search'); ?>
        <p class="description-popup">Below choose clients and attach the file to send</p>
        <div id='modalContent'>
          <label>CONTACT NAME</label><?php
            echo Select2::widget([
                'name' => 'contacts',                
                //'data' => $contactData,
                'options' => ['placeholder' => 'Search contacts list here by name or email','class' => 'contact-sent-box','multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true, 
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
            <input type="hidden" id="document_id" name="document_id" value="[]">
        </div>
        <div class="selsected_doc">
            <p>Selected Documents</p>
            <div class="doc_display"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" style="background: transparent; color: #9d9d9d;">Cancel</button>
            <?= Html::Button('Send', ['class' => 'btn btn-primary', 'onClick'=>'sendDocument("document-send-form")']) ?>       
      </div>
      <?php ActiveForm::end(); ?>
      <div class="message"></div>
    <?php
    Modal::end(); ?>
<script>
$( document ).ready(function() {
    ShowCatDoc('all');
    $("#search_doc_query").keyup(function () {
        var that = this,
        value = $(this).val();
        var cat_id = $('#selected_doc_category_id').val();
        ShowCatDoc(cat_id,value);
    });
});
function ShowCatDoc(cat_id,text) {
    $.ajax({
        url: '<?php echo Url::toRoute('document/ajax-cat-doc-display'); ?>',
        type: 'POST',
        data: {cat_id,text,'<?=Yii::$app->request->csrfParam?>': '<?=Yii::$app->request->getCsrfToken()?>'},
        dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          $("#catDoc").html(data);
          $(".cat_tab").removeClass("active");
          $("#cat_"+cat_id).addClass("active");selected_doc_category_id
          $("#selected_doc_category_id").val(cat_id);
          //$(".status_image_"+form_id).html(newData['folder_status']);
        },
        error: function () {
            alert("ERROR IN FORM OPEN");
        }
    });
}

function sendMultipleDoc() {
    var gethtml = "";
    var hiddenFieldDocPath = "";
    var hiddenFieldDocName = "";
    var document_ids =[];
    $('#catDoc input:checkbox').each(function () {
        var sThisVal = (this.checked ? $(this).val() : "");
        var doc_id = $('#doc_id_'+sThisVal).val();
        var doc_name = $('#doc_name_'+sThisVal).val();
        var doc_path = $('#file_path_'+sThisVal).val();
        var image = '<?=Html::img("@web/img/Group 4511.png")?>';
        if(sThisVal != ""){
            gethtml += "<div class='selected_doc'><a href='<?=$base_url.'/storage/web/document/'?>"+doc_path+"'>"+image+doc_name+"</a></div>";
            hiddenFieldDocPath += "<input type='hidden' id='form_doc_path_"+doc_id+"' name='form_doc_path_"+doc_id+"' value='"+doc_path+"'>";
            hiddenFieldDocName += "<input type='hidden' id='form_doc_name_"+doc_id+"' name='form_doc_name_"+doc_id+"' value='"+doc_name+"'>";
            document_ids.push(doc_id);
        }
    })
    $('#sendDoc').modal('show');
    $('.doc_display').html("");
    $('#hidden_data').html("");
    $("#document_id").val("");
    $( ".doc_display" ).append(gethtml);
    $( "#hidden_data" ).append(hiddenFieldDocPath);
    $( "#hidden_data" ).append(hiddenFieldDocName);
    $("#document_id").val(document_ids);
}
function sendDocument(id) {
    var myData = new FormData($('#'+id)[0]);
    //alert(myData);
    $.ajax({
        url: '<?php echo Url::toRoute('document/ajax-document-send'); ?>',
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

    