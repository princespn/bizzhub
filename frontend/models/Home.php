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
        $data = $rpropertyData = $spropertyData = [];
        $dataArray = [];
        $table = $this->tableName();
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->orderBy(['id' => SORT_DESC])
            ->limit(7)
            ->All();
        foreach($data as $key => $pData){
          $rpi = (new \yii\db\Query())
            ->select(['*'])
            ->from('rets_property_image')
            ->where(['property_id'=>$pData['id']])
            ->All();
          $propertyData[$key] = $pData; 
          $propertyData[$key]['images'] = $rpi; 
        }    
        return $propertyData;
    }

    
    
}
