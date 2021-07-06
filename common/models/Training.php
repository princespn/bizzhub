<?php

namespace common\models;

//use common\models\query\ArticleQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property integer             $id
 * @property string              $slug
 * @property string              $title
 * @property string              $body
 * @property string              $view
 * @property string              $thumbnail_base_url
 * @property string              $thumbnail_path
 * @property array               $attachments
 * @property integer             $category_id
 * @property integer             $status
 * @property integer             $published_at
 * @property integer             $created_by
 * @property integer             $updated_by
 * @property integer             $created_at
 * @property integer             $updated_at
 *
 * @property User                $author
 * @property User                $updater
 * @property ArticleCategory     $category
 * @property ArticleAttachment[] $articleAttachments
 */
class Training extends ActiveRecord
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
        return '{{%training}}';
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
            [['description'], 'string'],
            [['image_base_url', 'image_path'], 'string', 'max' => 1024],
            [['title'], 'string', 'max' => 512],
            [['image', 'external_link','item_order'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('backend', 'Title'),
            'description' => Yii::t('backend', 'Description'),
            'external_link' => Yii::t('backend', 'External Link'),
            'item_order' => Yii::t('backend', 'Order'),
            'image' => Yii::t('backend', 'Image'),
        ];
    }

}
