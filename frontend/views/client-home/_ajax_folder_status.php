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
 ?>

<?php
//print_r($form_value);die('sffff');
if(!empty($formData[0]['folder_status'])){
  switch ($formData[0]['folder_status']) {
        case 1:
            $image_path = $form_value->unopened_image['base_url'].'/'.$form_value->unopened_image['path'];
            break;
        case 2:
            $image_path = $form_value->opened_image['base_url'].'/'.$form_value->opened_image['path'];
            break;
        case 3:
            $image_path = $form_value->review_image['base_url'].'/'.$form_value->review_image['path'];
            break;
        case 4:
            $image_path = $form_value->complete_image['base_url'].'/'.$form_value->complete_image['path'];
            break;
        case 5:
            $image_path = $form_value->received_image['base_url'].'/'.$form_value->received_image['path'];
            break;    
        default:
            $image_path = $form_value->unopened_image['base_url'].'/'.$form_value->unopened_image['path'];
    }

    echo Html::img($image_path);
}else{
    echo Html::img($form_value->unopened_image['base_url'].'/'.$form_value->unopened_image['path']);
}
?>

