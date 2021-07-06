<?php

namespace common\models;

//use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class DocumentCategory extends ActiveRecord
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @var array
     */
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document_category}}';
    }

    /**
     * @return array statuses list
     */
    public static function statuses()
    {
        return [            
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active')
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            //BlameableBehavior::class,
            [
                'class' => UploadBehavior::class,
                'attribute' => 'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'unique'],
            [['body'], 'string'],
            [['image_base_url', 'image_path'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['image', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('backend', 'Title'),
            'body' => Yii::t('backend', 'Description'),
            'status' => Yii::t('backend', 'status'),
            'image' => Yii::t('backend', 'Image'),
        ];
    }

}
