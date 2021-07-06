<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

$this->title = 'Training';
$http = Yii::$app->params['http'];
$base_url = Url::base($http);
?>

<div class="content-wrapper" style="min-height: 902.8px;">
 <div class="dashboard_right_detail">
   <div class="row"><?php
   $icon_image = "@web/img/resources/Component 127 – 1.png";
    foreach($trainingData as $training){ 
     if(!empty($training['image_path'])){
         $icon_image = $training['image_base_url'].'/'.$training['image_path'];
     }  ?>
     <div class="col-lg-4 col-md-6 col-sm-12">
       <div class="training-box">
            <?=Html::img($icon_image)?>  
            <h2><?=$training['title']?></h2>
            <p><?=substr($training['description'], 0, 200);?></p>
            <div class="text-right link-training">
            <a href="<?=$training['external_link']?>">Explore Now <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="long-arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-long-arrow-right fa-w-14 fa-3x"><path fill="currentColor" d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z" class=""></path></svg></a>
            </div>
       </div>
     </div><?php
    } ?>
   </div>  
  
  
 </div>
</div>