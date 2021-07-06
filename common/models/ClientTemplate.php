<?php

namespace common\models;

use common\models\query\ClientTemplateQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client templete".
 */
class ClientTemplate extends ActiveRecord
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
        return '{{%client_template}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ClientTemplateQuery(get_called_class());
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
            [['name','content'], 'string'],
            [['status'], 'integer'],
            [['videoFile'], 'file','extensions' => 'mp4','maxFiles' => 1],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Template Name'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'content' => Yii::t('common', 'Content'),
        ];
    }
    
}
