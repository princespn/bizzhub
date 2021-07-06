<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "client_data".
 *
 * @property int $id
 * @property int $field_id
 * @property string $value
 * @property int $form_id
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 */
class ClientData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['field_id', 'value', 'form_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['field_id', 'form_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'string'],
            [['status'.'folder_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_id' => 'Field ID',
            'value' => 'Value',
            'form_id' => 'Form ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getValue($value){
        $valueArr = json_decode($value);
        $filedValue = '';
        if(is_array($valueArr)){
            foreach($valueArr as $v){
                $filedValue .= $v.', ';
            }
        }else{
            $filedValue = $value;
        }
        $filedValue = rtrim($filedValue, ', ');
        return $filedValue;
    }

    public function getValueView($value){
        $valueArr = json_decode($value);
        $filedValue = '';
        if(is_array($valueArr)){
            foreach($valueArr as $v){
                $filedValue .= $v.', ';
            }
        }else{
            $filedValue = $value;
        }
        $filedValue = rtrim($filedValue, ', ');
        $except = array("rar", "zip", "mp3", "mp4", "mp3", "mov", "flv", "wmv", "swf", "png", "gif", "jpg","jpeg", "bmp", "avi");

        if(preg_match('/(\.jpg|\.jpeg|\.png|\.bmp|\.pdf)$/i', $filedValue)) {
            $http = Yii::$app->params['http'];
            $client_path = Yii::$app->params['client_attatch_path'];
            $base_url = Url::base($http); 
            $img_url = $base_url.'/../storage/web/client_attachments/'.$filedValue; 
            
            $img_cont = '<a href="'.$img_url.'" download="'.$filedValue.'">'.$filedValue.'</a>';
            $filedValue = $img_cont;
        }else{
           // $match is not present in $filename 
        }
        return $filedValue;
    }

    public function getField($value){
        $field=(new \yii\db\Query())
                ->select(['value'])
                ->from('client_form_fields')
                ->where(['id'=>$value])
                ->Scalar();
        return $field;
    }

    public function getFormName($value){
        $form=(new \yii\db\Query())
                ->select(['name'])
                ->from('client_data_form')
                ->where(['id'=>$value])
                ->Scalar();
        return $form;
    }


    public static function getFolderStatusImage($status,$form_id){
        if(!empty($status)){
            $clientForm=ClientDataForm::find()->where(['id'=>$form_id])->One();
            switch ($status) {
                case 1:
                    $image_path = $clientForm->unopened_image['base_url'].'/'.$clientForm->unopened_image['path'];
                    break;
                case 2:
                    $image_path = $clientForm->opened_image['base_url'].'/'.$clientForm->opened_image['path'];
                    break;
                case 3:
                    $image_path = $clientForm->review_image['base_url'].'/'.$clientForm->review_image['path'];
                    break;
                case 4:
                    $image_path = $clientForm->complete_image['base_url'].'/'.$clientForm->complete_image['path'];
                    break;
                case 5:
                    $image_path = $clientForm->received_image['base_url'].'/'.$clientForm->received_image['path'];
                    break;    
                default:
                    $image_path = $clientForm->unopened_image['base_url'].'/'.$clientForm->unopened_image['path'];
            }

            $f_s_img = Html::img($image_path,['class'=>'folder_status_img']);
        }else{
            $f_s_img = Html::img($clientForm->unopened_image['base_url'].'/'.$clientForm->unopened_image['path'],['class'=>'folder_status_img']);
        }
        
        return $f_s_img;
    }
}
