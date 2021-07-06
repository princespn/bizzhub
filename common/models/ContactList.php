<?php

namespace common\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "contact_list".
 *
 * @property int $id
 * @property string|null $list_name
 * @property int|null $user_id
 * @property string|null $status
 * @property string $createddate
 * @property string|null $updateddate
 * @property int|null $createdby
 */
class ContactList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_list';
    }

     public function behaviors()
        {
            return [
                [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'createddate',
                    'updatedAtAttribute' => 'updateddate',
                    'value' => new Expression('NOW()'),
                ],
            ];
        }
        

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','status'], 'integer'],
            [['createddate', 'updateddate'], 'safe'],
            [['list_name', 'list_key'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_name' => 'List Name',
            'user_id' => 'User Id',
            'status' => 'Status',
            'createddate' => 'Created Date',
            'updateddate' => 'Updated Date',
            'list_key' => 'Contact list key',
        ];
    }

    public function getuserByRole($role)
    {

        $agent = [];
        $agent = (new \yii\db\Query())
            ->select(['id', 'username'])
            ->from('user a')
            ->leftJoin('rbac_auth_assignment b', 'a.id = b.user_id')
            ->where(['b.item_name' => $role])
            ->All();
        return $agent;
    }

    public static  function getUsername($ids)
    {
        $idarr = explode(',', $ids);
        $agent = [];
        $user_name = '';
        $agent = (new \yii\db\Query())
            ->select('username')
            ->from('user')
            ->where(['in', 'id', $idarr])
            ->All();
        foreach ($agent as $key => $value) {
                $user_name .= $value['username'].', ';
            }  
        $user_name = rtrim($user_name,', ');      
        return $user_name;
    }
}
