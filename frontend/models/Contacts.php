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
class Contacts extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $list;
    //public $agent_id;
    public $updated_date;
    public $created_date;
    public $other;
    public $csv_file;




    public static function tableName()
    {
        return '{{%contacts}}';
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
            //['agent_id', 'required'],
            //['phone', 'number', 'integerOnly'=>true,],
            //['phone', 'filter', 'filter' => 'trim'],
            //[['phone'], ['numerical', 'integerOnly'=>true]],
            //['phone','length','max'=>10],
            /*['created_date','default',
              'value'=>time(),
              'setOnEmpty'=>false,'on'=>'update'],
            ['created_date,updated_date','default',
              'value'=>time(),
              'setOnEmpty'=>false,'on'=>'insert'],*/
            [['id','email','phone','first_name', 'last_name','list','updated_date','created_date','other'], 'safe'],
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
            //'agent_id' => Yii::t('common', 'Agent'),
            'list' => Yii::t('common', 'List'),
            'csv_file' => Yii::t('common', 'CSV File')
        ];
    }

    public function add()
    {
        $model = new Contacts();
        if ($this->validate()) {      
            $model->first_name = $this->first_name;
            $model->last_name = $this->last_name;
            $model->email = $this->email;
            //$model->agent_id = $this->agent_id;
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
        $model = new Contacts();
        /*print_r($this->list);die;
        if(isset($this->list)){
            $this->list = implode(",", $this->list);
        }*/
        if(isset($this->other)){
            $this->other = json_encode($this->other);
        }
        if ($this->validate()) { 
                Yii::$app->db->createCommand()
                    ->insert('contacts',
                        [
                            'first_name'=>$this->first_name,
                            'last_name'=>$this->last_name,
                            'email'=>$this->email,
                            //'agent_id'=>$this->agent_id,
                            'phone'=>$this->phone,
                            'list'=>$this->list,
                            'created_at'=>time(),
                            'updated_at'=>time(),
                            'other'=>$this->other,
                        ]
                    )
                    ->execute();   
            
            return !$model->hasErrors();
        }
        return null;
    }


    public function update()
    {
        $model = new Contacts();
        //print_r($this);die;
        $rows = (new \yii\db\Query())
            ->select(['id', 'email','list'])
            ->from('contacts')
            ->where(['id' => $this->id])
            ->One();
        //print_r($rows);die;    
        if(isset($this->list)){            
            $array1 = explode(',', $rows['list']);
            $array2 = $this->list;
            $list_id_arr = array_unique(array_merge($array1,$array2), SORT_REGULAR);
            $this->list = implode(',', $list_id_arr);
        }
        if(isset($this->other)){
            $this->other = json_encode($this->other);
        }
        //print_r($this);die;    
        if ($this->validate()) {   
            //if(!empty($rows)){ 
            Yii::$app->db->createCommand()
             ->update('contacts', [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'list' => $this->list,
                //'agent_id' => $this->agent_id,
                'other'=>$this->other,
                'updated_at'=>time()
            ],
            ['id' => $this->id])
             ->execute();    
            //}
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
            ->delete('contacts', ['id' => $id])
            ->execute();

        return ;
    }

    public function deletemongoContatsById($id)
    {
        $status = 0;
        $user_id = Yii::$app->user->identity->id;
        $rows = (new \yii\db\Query())
        ->select(['id', 'deleted_by'])
        ->from('contacts')
        ->where(['id' => $id])
        ->One();
        //print_r($rows);die;
        if(!empty($rows['deleted_by'])){
            $array1 = explode(',', $rows['deleted_by']);
            $array2[] = $user_id;
            //print_r($array2);die;
            $user_id_arr = array_unique(array_merge($array1,$array2), SORT_REGULAR);
            $user_ids = implode(',', $user_id_arr);
            Yii::$app->db->createCommand()
             ->update('contacts', [
                'deleted_by'=>$user_ids,
                'updated_at'=>time()
            ],
            ['id' => $id])
             ->execute();
             $status = 1;
        }else{
            Yii::$app->db->createCommand()
            ->update('contacts', [
               'deleted_by'=>$user_id,
               'updated_at'=>time()
           ],
           ['id' => $id])
            ->execute();
            $status = 1;
        }
        return $status;
    }


    public function getcontactList($user_id)
    {

        $lists = [];
        $lists = (new \yii\db\Query())
            ->select(['id', 'list_name'])
            ->from('contact_list');
            if(!Yii::$app->user->can('admin')){
               $lists->andWhere(new \yii\db\Expression('FIND_IN_SET(:user_id,user_id)')); 
               $lists->addParams([':user_id' => $user_id]);
            }
            $lists = $lists->All();
        return $lists;
    }
    
}
