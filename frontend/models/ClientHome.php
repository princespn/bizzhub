<?php

namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\ActiveQuery;
use app\components\Defaults;
use yii\db\Query;
use yii\base\Exception;
use yii\helpers\Url;





//use common\models\Home;
//use yii\db\Expression;

/**
 
 */
class ClientHome extends Model
{




    public static function tableName()
    {
        return '{{%rets_property}}';
    }



    public function getRetsData()
    {
        $data = $rpropertyData = $spropertyData = [];
        $dataArray = [];
        $table = $this->tableName();
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->orderBy(['id' => SORT_DESC])
            //->groupBy(['num_bedrooms'])
            ->All();
        //print_r($data);die;    
        foreach($data as $key => $value) {
          if($value['sale_or_rental'] == 'R'){
             if($value['property_type'] == 'townhouse'){
                  $rpropertyData['townhouse'][]=$value;
             }elseif($value['num_bedrooms'] == 0){
                  $rpropertyData['badroom0'][]=$value;
             }elseif($value['num_bedrooms'] == 1){
                  $rpropertyData['badroom1'][]=$value;
             }elseif($value['num_bedrooms'] == 2){
                  $rpropertyData['badroom2'][]=$value;
             }elseif($value['num_bedrooms'] == 3){
                  $rpropertyData['badroom3'][]=$value;
             }else{
                  $rpropertyData['badroom4'][]=$value;
             }
          }elseif($value['sale_or_rental'] == 'S'){
            if($value['property_type'] == 'townhouse'){
                  $spropertyData['townhouse'][]=$value;
             }elseif($value['num_bedrooms'] == 0){
                  $spropertyData['badroom0'][]=$value;
             }elseif($value['num_bedrooms'] == 1){
                  $spropertyData['badroom1'][]=$value;
             }elseif($value['num_bedrooms'] == 2){
                  $spropertyData['badroom2'][]=$value;
             }elseif($value['num_bedrooms'] == 3){
                  $spropertyData['badroom3'][]=$value;
             }else{
                  $spropertyData['badroom4'][]=$value;
             }
          } 
        }
        ksort($rpropertyData);
        ksort($spropertyData);
        $dataArray = array('rpropertyData'=>$rpropertyData, 'spropertyData'=>$spropertyData);
            //print_r($propertyData);die;    
        return $dataArray;
    }

    
    
}
