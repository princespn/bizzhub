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
$this->title = Yii::$app->name;
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
                            <li role="presentation" class=""><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"><?=Html::img("@web/img/Group 4501.png")?>  All</a></li><?php
                            $cat_image = "@web/img/Group 4511.png";
                            foreach($category as $catKey => $catData){ 
                                if($catKey > 1){
                                    continue;
                                }
                                if(!empty($catData['image_path'])){
                                    $cat_image = $catData['image_base_url'].'/'.$catData['image_path'];
                                }?>
                                <li role="presentation" class="active"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"><?=Html::img($cat_image,['alt'=>$catData['title']])?><?=$catData['title']?></a></li>
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
                                <li><a href=""><?=Html::img($cat_image)?><?=$catData['title']?></a></li><?php
                            } ?>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade  " id="Section1">
                        <div class="pdf-folder"><?php
                        $pdfThumb = "@web/img/pdf.jpg";
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
                    </div>
                    <div role="tabpanel" class="tab-pane fade in active" id="Section2">
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
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
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
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
