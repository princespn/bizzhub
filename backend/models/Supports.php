<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * Account form
 */
class Supports extends Model
{
    public $type;
    public $name;
    public $email;
    public $created_at;



    public static function tableName()
    {
        return '{{supports}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'email'], 'required'],
            [[ "type", "name", "email","created_at"], "safe"]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => Yii::t('backend', 'Support type'),
            'name' => Yii::t('backend', 'Support Name'),
            'email' => Yii::t('backend', 'E-mail'),
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $model = new Supports();
            $table = self::tableName();
            Yii::$app->db->createCommand()
            ->insert($table,
                [
                    'type'=>$this->type,
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'created_at'=>time(),
                ]
            )
            ->execute();
        }
        return null;
    }

    public function update($updateData)
    {
        $id = $_GET['id'];
        //print_r($updateData);die;
        $model = new Supports();
        $table = self::tableName();    
        if ($this->validate()) { 
            Yii::$app->db->createCommand()
             ->update($table, $updateData,['id' => $id])
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
