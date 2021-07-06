<?php
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
//use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use yii\web\JsExpression;
$this->title = Yii::$app->name;
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
?>
<div class="content-wrapper" style="min-height: 902.8px;">
    <div class="dashboard_right_detail">
        <div class="doocuments-header">
            <button class="btn btn-primary">
            Send <i class="fas fa-share"></i>
            </button>
            <div class="document-search">
                <input autocomplete="off" type="search" id="query" name="q" placeholder="Search...">
                <?=Html::img("@web/img/resources/Group 4551.png")?>
            </div>
        </div>
        <div class="documents-tabss">
            <div class="row">
                <div class="col-md-4">
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
                                <li id="cat_<?=$catData['id']?>" class="cat_tab "><a href="javascript:void()" onclick="ShowCatDoc(<?=$catData['id']?>)"><?=Html::img($cat_image)?><?=$catData['title']?></a></li><?php
                            } ?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content tabs">
                    <div id="catDoc">
                    </div>
                    <?php /*
                    <div role="tabpanel" class="tab-pane" id="Section2">
                        <div class="pdf-folder"><?php
                        foreach($documentData as $document){
                            if(!empty($document['image_path'])){
                                $pdfThumb = $document['image_base_url'].'/'.$document['image_path'];
                            } ?>
                            <div class="pdf-folder-item1">
                                <button class="btn btn-white-send"> send <i class="fas fa-share"></i></button>
                                <div class="form-group">
                                <input type="checkbox" id="5" >
                                <label for="5">
                                    <div class="img-pdf">
                                    <?=Html::img($pdfThumb)?>
                                    </div>
                                    <div class="absoulute-text">
                                        <h6><?=$document['doc_name']?></h6>
                                        <p><?=Html::img("@web/img/Group 4515.png")?> Size 34 KB</p>
                                    </div>
                                </div>
                                </label>
                                <ul class="icon">
                                <li>
                                    <a href="#" class="">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x">
                                            <path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path>
                                        </svg>
                                    </a>
                                </li>
                                <li><a href="#" class="yellow"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div><?php
                        }?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Section3">
                        <div class="pdf-folder"><?php
                        foreach($documentData as $document){
                            if(!empty($document['image_path'])){
                                $pdfThumb = $document['image_base_url'].'/'.$document['image_path'];
                            } ?>
                            <div class="pdf-folder-item1">
                                <button class="btn btn-white-send"> send <i class="fas fa-share"></i></button>
                                <div class="form-group">
                                <input type="checkbox" id="5" >
                                <label for="5">
                                    <div class="img-pdf">
                                    <?=Html::img($pdfThumb)?>
                                    </div>
                                    <div class="absoulute-text">
                                        <h6><?=$document['doc_name']?></h6>
                                        <p><?=Html::img("@web/img/Group 4515.png")?> Size 34 KB</p>
                                    </div>
                                </div>
                                </label>
                                <ul class="icon">
                                <li>
                                    <a href="#" class="">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x">
                                            <path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path>
                                        </svg>
                                    </a>
                                </li>
                                <li><a href="#" class="yellow"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div><?php
                        } ?>
                        </div>
                    </div> */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    Modal::begin([
            'title' => '<h2>Send Document</h2>',
            'id'=>"sendDoc",
         ]); ?>
         <div id='modalContent'>
            <p>Below choose clients and attach the file to send</p><?php
            echo Select2::widget([
                'name' => 'state_40',                
                'data' => $contactData,
                'options' => ['placeholder' => 'Select a state ...','class' => 'contact-sent-box','multiple' => true],
                'pluginOptions' => [
                    'allowClear' => true,                    
                ],
            ]);?> 
        </div>
        <div class="doc_display"></div>
    <?php
    Modal::end(); ?>
<script>
$( document ).ready(function() {
    ShowCatDoc('all')
});
function ShowCatDoc(cat_id) {
    $.ajax({
        url: '<?php echo Url::toRoute('document/ajax-cat-doc-display'); ?>',
        type: 'POST',
        data: {cat_id,'<?=Yii::$app->request->csrfParam?>': '<?=Yii::$app->request->getCsrfToken()?>'},
        dataType: "json",
        beforeSend: function() {
        },
        success: function (data) {
          //obj = JSON.parse(data);
          //var newData = JSON.parse(JSON.stringify(data))
          //alert(newData);
          $("#catDoc").html(data);
          $(".cat_tab").removeClass("active");
          $("#cat_"+cat_id).addClass("active");
          //$(".status_image_"+form_id).html(newData['folder_status']);
        },
        error: function () {
            alert("ERROR IN FORM OPEN");
        }
    });
}
</script>
<script>
    function sendSingleDoc(doc_id,file_path){
        $('#sendDoc').modal('show');

        /*$.ajax({
            url: '<?php echo Url::toRoute('document/ajax-selected-doc'); ?>',
            type: 'POST',
            data: {doc_id,'<?=Yii::$app->request->csrfParam?>': '<?=Yii::$app->request->getCsrfToken()?>'},
            //dataType: "json",
            beforeSend: function() {
            },
            success: function (data) {
                $("#catDoc").html(data);
            },
            error: function () {
                alert("ERROR IN FORM OPEN");
            }
        });*/
    }
</script>
