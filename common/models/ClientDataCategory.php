<?php

namespace common\models;

use common\models\query\ClientDataCategoryQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "client templete".
 */
class ClientDataCategory extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    //public $cat_order = 0;

    /**
     * @var array
     */

    /**
     * @var array
     */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client_data_category}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ClientDataCategoryQuery(get_called_class());
    }

    public static function find_templete()
    {
        $query = new Query();
        $rows = $query->select("id,name")
        ->from('client_template')
        ->where(['status' => 1])
        ->all();
        //print_r($rows);die;
        return $rows;
    }

    public static function find_templete_by_id($id)
    {
        //echo $id;die;
        $query = new Query();
        $rows = $query->select("name")
        ->from('client_template')
        ->where(['status' => 1, 'id'=>$id])
        ->scalar();
       // print_r($rows);die;
        return $rows;
    }

    /**
     * @return array statuses list
     */
    public static function statuses()
    {
        return [
            self::STATUS_INACTIVE => Yii::t('common', 'Inactive'),
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name','content'], 'string'],
            [['status','cat_order','templete_id'], 'integer'],
            ['cat_order', 'default', 'value' =>0],
            ['cat_order', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Category Name'),
            'content' => Yii::t('common', 'Content'),
            'cat_order' => Yii::t('common', 'Category Order'),
            'templete_id' => Yii::t('common', 'Templete'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
    
}
