<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * Account form
 */
class Document extends Model
{
    public $file_name;
    public $file_path;
    public $category;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['file_path', 'file',
            'extensions' => ['pdf'], 
            'wrongExtension' => 'Only PDF files are allowed for {attribute}.',
            'wrongMimeType' => 'Only PDF files are allowed for {attribute}.',
            'skipOnEmpty'=>false,
            'mimeTypes'=>['application/pdf']],
            ['category', 'required'],
            [[ "file_name", "file_path", "category"], "safe"]
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
