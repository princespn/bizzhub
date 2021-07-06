<?php
namespace common\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "email_template".
 *
 */
class EmailTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%email_template}}';
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
            [['template_name','template_key'], 'required'],
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
            'template_name' => 'Template Name',
            'template_key' => 'Key',
            'subject' => 'Subject',
            'header' => 'Header',
            'content' => 'Content',
            'status' => 'Status',
            'footer' => 'Footer',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
        ];
    }

    public function gettemplate($key)
    {
        $result = [];
        $result = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('email_template')
                    ->where(['template_key' => $key])
                    ->One();
        return $result;
    }
}
