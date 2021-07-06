<?php
namespace common\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "email_templete".
 *
 */
class EmailTemplete extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%email_templete}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
        

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['templete_name','templete_key'], 'required'],
            [['status'], 'integer'],
            [['subject','header','content','footer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'templete_name' => 'Templete Name',
            'templete_key' => 'Key',
            'subject' => 'Subject',
            'header' => 'Header',
            'content' => 'Content',
            'status' => 'Status',
            'footer' => 'Footer',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
        ];
    }
}
