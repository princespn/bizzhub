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





//use common\models\Contact;
//use yii\db\Expression;

/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class Contact extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $list;
    public $agent_id;
    public $updated_date;
    public $created_date;
    public $other;




    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['agent_id', 'required'],
            ['phone', 'number', 'integerOnly'=>true,],
            //['phone', 'filter', 'filter' => 'trim'],
            //[['phone'], ['numerical', 'integerOnly'=>true]],
            //['phone','length','max'=>10],
            /*['created_date','default',
              'value'=>time(),
              'setOnEmpty'=>false,'on'=>'update'],
            ['created_date,updated_date','default',
              'value'=>time(),
              'setOnEmpty'=>false,'on'=>'insert'],*/
            [['id','email','phone','first_name', 'last_name','agent_id','list','updated_date','created_date','other'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('common', 'First Name'),
            'last_name' => Yii::t('common', 'Last Name'),
            'email' => Yii::t('common', 'Email'),
            'phone' => Yii::t('common', 'Phone'),
            'agent_id' => Yii::t('common', 'Agent'),
            'list' => Yii::t('common', 'List')
        ];
    }

    public function add()
    {
        $model = new Contact();
        if ($this->validate()) {      
            $model->first_name = $this->first_name;
            $model->last_name = $this->last_name;
            $model->email = $this->email;
            $model->agent_id = $this->agent_id;
            $model->phone = $this->phone;
            $model->list = $this->list;
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            return !$model->hasErrors();
        }
        return null;
    }

    public function save()
    {
        $model = new Contact();
        $rows = (new \yii\db\Query())
            ->select(['id', 'email','agent_id'])
            ->from('contact')
            ->where(['email' => $this->email])
            ->One();
        if(isset($this->agent_id)){
            $this->agent_id = implode(",", $this->agent_id);
        }
        if(isset($this->other)){
            $this->other = json_encode($this->other);
        }
        //print_r($this);die;    
        if ($this->validate()) {   
            if(!empty($rows)){ 
                Yii::$app->db->createCommand()
                 ->update('contact', ['agent_id' => $this->agent_id], ['id' => $rows['id']])
                 ->execute();    
            }else{ 
                Yii::$app->db->createCommand()
                    ->insert('contact',
                        [
                            'first_name'=>$this->first_name,
                            'last_name'=>$this->last_name,
                            'email'=>$this->email,
                            'agent_id'=>$this->agent_id,
                            'phone'=>$this->phone,
                            'list'=>$this->list,
                            'other'=>$this->other,
                        ]
                    )
                    ->execute();   
            }
            return !$model->hasErrors();
        }
        return null;
    }


    public function update()
    {
        $model = new Contact();
        $rows = (new \yii\db\Query())
            ->select(['id', 'email','agent_id'])
            ->from('contact')
            ->where(['email' => $this->email])
            ->One();
        if(isset($this->agent_id)){
            $this->agent_id = implode(",", $this->agent_id);
        }
        if(isset($this->other)){
            $this->other = json_encode($this->other);
        }
        //print_r($this);die;    
        if ($this->validate()) {   
            if(!empty($rows)){ 
                Yii::$app->db->createCommand()
                 ->update('contact', [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'list' => $this->list,
                    'agent_id' => $this->agent_id,
                    'other'=>$this->other,
                    'updated_date'=>time()
                ],
                ['id' => $rows['id']])
                 ->execute();    
            }
            return !$model->hasErrors();
        }
        return null;
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

    /*public function getUser($id)
    {
        $ids = json_decode(json)
        print_r($data);die;
        $agent = [];
        $agent = (new \yii\db\Query())
            ->select(['id', 'username'])
            ->from('user a')
            ->leftJoin('rbac_auth_assignment b', 'a.id = b.user_id')
            ->where(['b.item_name' => $role])
            ->All();
        return $agent;
    }*/

    public function deleteContatsById($id)
    {
        (new \yii\db\Query())
            ->createCommand()
            ->delete('contact', ['id' => $id])
            ->execute();

        return ;
    }
    
}
