<?php

namespace common\models;

//use common\models\query\ClientFormQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client templete".
 */
class Contacts extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE     = 0;

    /**
     * @var array
     */

    /**
     * @var array
     */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * @return ArticleQuery
     */
    /*public static function find()
    {
        return new ClientFormQuery(get_called_class());
    }*/

    /**
     * @return array statuses list
     */
    public static function statuses()
    {
        return [
            self::STATUS_INACTIVE => Yii::t('common', 'Inactive'),
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        if(Yii::$app->controller->action->id=="add" || Yii::$app->controller->action->id=="update"){
        return [
            [['status','name','first_name','email','phone'], 'required'],
            [['email'], 'unique'],
            [['email'], 'email'],
            //[['fkey','type'], 'string'],
            //[['status','field_order','form_id','deleted_at','created_at'], 'integer'],
            [['first_name','last_name','email','phone','status','created_date','updated_date','location','company','bio','facebook','twitter', 'linkedIn','list','status','stage','price','address','city','state','zip','country','other'], 'safe'],
        ];
    }else {
        return [
           // [['status','first_name','last_name','email','phone'], 'required'],
            //[['value'], 'unique'],
            //[['fkey','type'], 'string'],
            //[['status','field_order','form_id','deleted_at','created_at'], 'integer'],
            [['company','last_name','email','phone','status','created_date','updated_date'], 'safe'],
        ];
    }
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'value' => Yii::t('common', 'Name'),
            'status' => Yii::t('common', 'Status'),
            'type' => Yii::t('common', 'Type'),
            'field_order' => Yii::t('common', 'Order'),
            'template_id' => Yii::t('common', 'Template'),
            'category_id' => Yii::t('common', 'Category'),
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

    public static  function getListname($ids)
    {
        $idarr = explode(',', $ids);
        $list = [];
        $list_name = '';
        $list = (new \yii\db\Query())
            ->select('list_name')
            ->from('contact_list')
            ->where(['in', 'id', $idarr])
            ->All();
        foreach ($list as $key => $value) {
                $list_name .= $value['list_name'].', ';
            }  
        $list_name = rtrim($list_name,', ');      
        return $list_name;
    }
    
}
 