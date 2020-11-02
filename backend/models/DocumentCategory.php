<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * Account form
 */
class DocumentCategory extends Model
{
    public $title;
    public $body;
    public $status;

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
            'file_name' => Yii::t('backend', 'File Name'),
        ];
    }
}
