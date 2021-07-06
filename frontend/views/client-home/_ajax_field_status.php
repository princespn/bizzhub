<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use trntv\filekit\widget\Upload;
$user_id = Yii::$app->user->id;
 $Status=Yii::$app->params['Status_type'];

 ?>

<?php
//print_r($fieldStatusData);die('sffff');
if(!empty($fieldStatusData['status'])){
  switch ($fieldStatusData['status']) {
        case 1:
            $image_path = $Status['1'];
            break;
        case 2:
            $image_path = $Status['2'];
            break;
        case 3:
            $image_path = $Status['3'];
            break;
        case 4:
            $image_path = $Status['4'];
            break;
        case 5:
            $image_path = $Status['5'];
            break;    
        default:
            $image_path = $Status['1'];
    } ?>
    <P class="card-cp"><?=$image_path?></P>
    <?php 


}
?>

