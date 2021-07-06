<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_data".
 *
 * @property int $id
 * @property int $field_id
 * @property string $value
 * @property int $form_id
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['input_type', 'input_key', 'display_name'], 'required'],
            [['value'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'input_type' => 'Input Type',
            'input_key' => 'Input Key',
            'display_name' => 'Display Name',
        ];
    }

    public function getsetting(){
        $settingData = (new \yii\db\Query())
                    ->select(['*'])
                    ->from('settings')
                    ->All();
        foreach ($settingData as $key => $value) {
            $settingArr[$value['input_key']] = $value;     
        }
        return $settingArr;
    }
}
