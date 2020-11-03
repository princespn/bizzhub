<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * Account form
 */
class DocumentCategory extends Model
{
    public $title;
    public $body;
    public $status;
    public $created_at;
    public $updated_at;


    public static function tableName()
    {
        return '{{document_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            [[ "body", "status", "created_at","updated_at"], "safe"]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('backend', 'Title'),
        ];
    }


   
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at', // This is by default, you can omit that
                'updatedAtAttribute' => 'updated_at', // This is by default, you can omit that
            ],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $model = new DocumentCategory();
            $model->title = $this->title;
            $model->body = $this->body;
            $model->status = $this->status;
            $table = self::tableName();
            Yii::$app->db->createCommand()
            ->insert($table,
                [
                    'title'=>$this->title,
                    'body'=>$this->body,
                    'status'=>$this->status,
                    'created_at'=>time(),
                ]
            )
            ->execute();
        }
        return null;
    }


    public function update()
    {
        $id = $_GET['id'];
        //print_r($id);die;
        $model = new DocumentCategory();
        $table = self::tableName();    
        if ($this->validate()) { 
            Yii::$app->db->createCommand()
             ->update($table, [
                'title' => $this->title,
                'body' => $this->body,
                'status' => $this->status,
                'updated_at' => time(),
            ],
            ['id' => $id])
             ->execute();   
            return !$model->hasErrors();
        }
        return null;
    }

    public function getDataById($id)
    {
        //die('dddd');
        $data = [];
        $table = $this->tableName();
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->where(['id' => $id])
            ->one();
        return $data;
    }


    public function deleteById($id)
    {
        $table = $this->tableName();
        Yii::$app->db->createCommand()
            ->delete($table, ['id' => $id])
            ->execute();

        return ;
    }
}
