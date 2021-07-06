<?php

namespace common\models;

use common\models\query\ClientDataFormQuery;
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
class ClientDataForm extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client_data_form}}';
    }

    /**
     * @return ArticleQuery
     */
    public static function find()
    {
        return new ClientDataFormQuery(get_called_class());
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

    public static function find_cagegory_by_id($id)
    {
        //echo $id;die;
        $query = new Query();
        $rows = $query->select("name")
        ->from('client_data_category')
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
            //TimestampBehavior::class,
            /*BlameableBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'immutable' => true,
            ],**/
            /*[
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'articleAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],*/
            [
                'class' => UploadBehavior::class,
                'attribute' => 'unopened_image',
                'pathAttribute' => 'unopened_image',
                'baseUrlAttribute' => 'unopened_image_base_url',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'opened_image',
                'pathAttribute' => 'opened_image',
                'baseUrlAttribute' => 'unopened_image_base_url',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'received_image',
                'pathAttribute' => 'received_image',
                'baseUrlAttribute' => 'unopened_image_base_url',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'review_image',
                'pathAttribute' => 'review_image',
                'baseUrlAttribute' => 'unopened_image_base_url',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'complete_image',
                'pathAttribute' => 'complete_image',
                'baseUrlAttribute' => 'unopened_image_base_url',
            ],
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
            [['status','form_order','templete_id','cat_id'], 'integer'],
            //[['unopened_image', 'unopened_image_base_url','opened_image','review_image','complete_image'], 'string', 'max' => 1024],
            ['form_order', 'default', 'value' =>0],
            [['form_order','unopened_image', 'unopened_image_base_url','opened_image','received_image','review_image','complete_image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Form Name'),
            'content' => Yii::t('common', 'Content'),
            'form_order' => Yii::t('common', 'Form Order'),
            'templete_id' => Yii::t('common', 'Templete'),
            'cat_id' => Yii::t('common', 'Category'),
            'status' => Yii::t('common', 'Status'),
        ];
    }
    
}
