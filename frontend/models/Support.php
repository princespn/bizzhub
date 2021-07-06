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

class Support extends Model
{

    
    /**
     * @inheritdoc
     */

    //public $type;
    public $facing_time;
    public $subject;
    public $message;
    public $email;

    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['subject'], 'required'],
            // We need to sanitize them
            [['message'], 'filter', 'filter' => 'strip_tags'],
            // email has to be a valid email address
            //['email', 'email'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'subject' => Yii::t('frontend', 'Choose Subject'),
            'message' => Yii::t('frontend', 'Describe your problem'),
            'facing_time' => Yii::t('frontend', 'Facing Time'),
        ];
    }

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
            ->where(['id'=>$type])
            ->one();
        return $data;
    }

    public function saveSportMessage($data)
    {
        //print_r($supportsData);die;
        $table = 'support_message';
        Yii::$app->db->createCommand()
                    ->insert($table,$data)
                    ->execute();
        return $data;
    }

    public function getSupportsMessage()
    {
        //print_r($supportsData);die;
        $table = 'support_message';
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->all();
        //print_r($data);die;
        return $data;
    }
    
}
