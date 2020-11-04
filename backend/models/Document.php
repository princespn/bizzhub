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
class Document extends Model
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $doc_name;
    public $file_path;
    public $category;
    public $status;



    public static function tableName()
    {
        return '{{document}}';
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
            ['file_path', 'file',
            'extensions' => ['pdf'], 
        ],
            ['category', 'required'],
            [[ "doc_name", "file_path", "category","status"], "safe"]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_name' => Yii::t('backend', 'Document Name'),
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
                    'doc_name'=>$this->doc_name,
                    'file_path'=>$this->file_path,
                    'category'=>$this->category,
                    'status'=>$this->status,
                    'created_at'=>time(),
                ]
            )
            ->execute();
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
