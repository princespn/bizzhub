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
class Home extends Model
{




    public static function tableName()
    {
        return '{{%rets_property}}';
    }



    public function getRetsData()
    {
        $data = [];
        $table = $this->tableName();
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->orderBy(['id' => SORT_DESC])
            //->groupBy(['num_bedrooms'])
            ->All();
        foreach($data as $key => $value) {
               if($value['num_bedrooms'] == 1){
                    $propertyData['badroom1'][]=$value;
               }elseif($value['num_bedrooms'] == 2){
                    $propertyData['badroom2'][]=$value;
               }elseif($value['num_bedrooms'] == 3){
                    $propertyData['badroom3'][]=$value;
               } 
            }
           // print_r($propertyData);die;    
        return $propertyData;
    }

    
    
}
