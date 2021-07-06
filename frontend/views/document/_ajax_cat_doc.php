<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use trntv\filekit\widget\Upload;
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use yii\web\JsExpression;

$http = Yii::$app->params['http'];
$base_url = Url::base($http);
 ?>
<div class="pdf-folder"><?php
$pdfThumb = "@web/img/pdf.jpg";
//$pdfPath = '/web/document/';
foreach($documentData as $document){ 
    $pdfpath = "";                           
    if(!empty($document['file_image'])){
        $pdfThumb = $base_url.'/storage/web/document/image/'.$document['file_image'];  
        $pdfpath = $base_url.'/storage/web/document/'.$document['file_path'];
    } ?>
    <div class="pdf-folder-item1">
        <button onclick="sendSingleDoc(<?=$document['id']?>,'<?=$document['doc_name']?>','<?=$document['file_path']?>')" class="btn btn-white-send"> send <i class="fas fa-share"></i></button>
        <div class="form-group">
        <input type="checkbox" id="<?=$document['id']?>" value="<?=$document['id']?>">
        <label for="<?=$document['id']?>">
        <input type="hidden" id="doc_id_<?=$document['id']?>" name="doc_id" value="<?=$document['id']?>">
        <input type="hidden" id="doc_name_<?=$document['id']?>" name="doc_name" value="<?=$document['doc_name']?>">
        <input type="hidden" id="file_path_<?=$document['id']?>" name="file_path" value="<?=$document['file_path']?>">        
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
            <a href="<?=Url::to(['file/download','n'=>$document['file_path'],'p'=>'document','a'=>'index']);?>" class="">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-3x">
                    <path fill="currentColor" d="M348.5 232.1l-148 148.4c-4.7 4.7-12.3 4.7-17 0l-148-148.4c-4.7-4.7-4.7-12.3 0-17l19.6-19.6c4.8-4.8 12.5-4.7 17.1.2l93.7 97.1V44c0-6.6 5.4-12 12-12h28c6.6 0 12 5.4 12 12v248.8l93.7-97.1c4.7-4.8 12.4-4.9 17.1-.2l19.6 19.6c4.9 4.7 4.9 12.3.2 17zM372 428H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12z" class=""></path>
                </svg>
            </a>
        </li>
        <li><a href="<?=$pdfpath;?>" class="yellow" target="_blank"><i class="fa fa-eye"></i></a></li>
        </ul>
    </div><?php
} ?>
</div>

<script>
    function sendSingleDoc(doc_id,doc_name,doc_path){
        $('#sendDoc').modal('show');
        $('.doc_display').html("");
        $('#hidden_data').html("");
        $("#document_id").val("");
        var document_ids =[];
        var image = '<?=Html::img("@web/img/Group 4511.png")?>';
        $( ".doc_display" ).append("<div class='selected_doc'><a href='<?=$base_url.'/storage/web/document/'?>"+doc_path+"'>"+image+doc_name+"</a></div>" );
        $( "#hidden_data" ).append("<input type='hidden' id='form_doc_path_"+doc_id+"' name='form_doc_path_"+doc_id+"' value='"+doc_path+"'>");
        $( "#hidden_data" ).append("<input type='hidden' id='form_doc_name_"+doc_id+"' name='form_doc_name_"+doc_id+"' value='"+doc_name+"'>");
        document_ids.push(doc_id);
        $("#document_id").val(document_ids);
    }
</script>



