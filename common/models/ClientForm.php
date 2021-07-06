<?php

namespace common\models;

use common\models\query\ClientFormQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client templete".
 */
class ClientForm extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE     = 0;

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
        return '{{%client_form_fields}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ClientFormQuery(get_called_class());
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
    /*public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['value'], 'required'],
            //[['value'], 'unique'],
            //[['fkey','type'], 'string'],
            //[['status','field_order','form_id','deleted_at','created_at'], 'integer'],
            [['fkey','value','status','type','field_order','form_id','field_options','deleted_at','created_at','content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'value' => Yii::t('common', 'Name'),
            'status' => Yii::t('common', 'Status'),
            'type' => Yii::t('common', 'Type'),
            'field_order' => Yii::t('common', 'Order'),
            'content' => Yii::t('common', 'Content'),
            'template_id' => Yii::t('common', 'Template'),
            'category_id' => Yii::t('common', 'Category'),
        ];
    }
    
}
 