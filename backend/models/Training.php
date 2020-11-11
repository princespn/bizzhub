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
class Training extends Model
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $title;
    public $description;
    public $external_link;
    public $item_order;



    public static function tableName()
    {
        return '{{training}}';
    }


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
    public function rules()
    {
        return [
            ['title', 'required'],
            [[ "title", "description", "external_link","item_order"], "safe"]
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
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $model = new Document();
            $table = self::tableName();
            Yii::$app->db->createCommand()
            ->insert($table,
                [
                    'title'=>$this->title,
                    'description'=>$this->description,
                    'external_link'=>$this->external_link,
                    'item_order'=>$this->item_order,
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
        $model = new DocumentCategory();
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
