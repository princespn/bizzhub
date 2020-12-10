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
<div class="site-index mt-5">
    <div class="container"><?php
        foreach($category as $cat_data){
            //echo $cat_data['id'];die;
            if (array_search($cat_data['id'], array_column($document, 'category')) !== FALSE){ ?>
                <div class="document-section">
                <div class="list-head">
                  <h2><?=$cat_data['title']?></h2>
                </div>
                <div class="document-list">
                <ul>
                <?php
                foreach($document as $doc_data){?>
                    <li><?php
                    if($cat_data['id'] == $doc_data['category']){
                        echo Html::a(Html::img('@web/img/pdf.png',['class'=>'']), Url::to(['file/download','n'=>$doc_data['file_path'],'p'=>'document','a'=>'index']), ['class'=>'']); ?>
                        <h4><?=$doc_data['doc_name']?></h4></li><?php
                    }
                }
                 ?>
                 </ul>
                </div>
               </div>
              <?php
            }
        } ?>
    </div>
</div>
