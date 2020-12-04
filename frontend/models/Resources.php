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





//use common\models\Contact;
//use yii\db\Expression;

/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class Resources extends Model
{

    
    /**
     * @inheritdoc
     */



    public function getSupportsData()
    {
        //die('dddd');
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
        //var_dump($id);die;
        $data = [];
        $table = 'supports';
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->where(['type'=>$type])
            ->all();
            //print_r($data);die;
        return $data;
    }

    public function buildingSearch($text)
    {
        $data = [];
        $table = 'buildings';
        $condition = ['OR',            
            ['like','address',$text] ,     //Condition2(C2)
            ['like','legal_name',$text] ,     //Condition2(C2)
        ];
        $data = (new \yii\db\Query())
            ->select('*')
            ->from($table)
            ->where(['status'=>1])
            ->andwhere($condition)
            ->all();
            //print_r($data);die;
        return $data;
    }
    
}
