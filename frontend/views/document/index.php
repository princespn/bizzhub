<?php
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
        foreach($category as $cat_data){ ?>
        <div class="list-head">
          <h2><?=$cat_data['title']?></h2>
        </div>
        <div class="contact-list-sec">
        <?php
        //print_r($category);die;
            foreach($document as $doc_data){
                if($cat_data['id'] == $doc_data['category']){
                    echo $doc_data['doc_name'];
                }
            }
         ?>
        </div><?php
        } ?>
    </div>
</div>
