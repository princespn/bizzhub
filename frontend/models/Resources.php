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

//use common\models\Resources;
//use yii\db\Expression;

class Resources extends Model
{

    
    /**
     * @inheritdoc
     */



    public function getSupportsData()
    {
        $data = [];
        $table = 'supports';
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->all();
        return $data;
    }

    public function getSupportsDataById($type)
    {
        $data = [];
        $table = 'supports';
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->where(['type'=>$type])
            ->one();
        return $data;
    }

    public function buildingSearch($text)
    {
        $data = [];
        $table = 'buildings';
        $condition = ['OR',            
            ['like','address',$text] ,
            ['like','legal_name',$text] , 
        ];
        $data = (new \yii\db\Query())
            ->select('*')
            ->from($table)
            ->where(['status'=>1])
            ->andwhere($condition)
            ->all();
        return $data;
    }
    
}
