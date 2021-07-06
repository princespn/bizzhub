<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;
    public $assignuser;
    public $assignroles;
    public $profileselector;
    public $successmanager;
    public $agent;
    public $attorney;
    public $mortgageLender;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
            [['profileselector','successmanager','agent','attorney','mortgageLender'], 'safe'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],
        ];
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->profileselector = json_decode($model->profileselector);
        $this->successmanager = json_decode($model->successmanager);
        $this->agent = json_decode($model->agent);
        $this->attorney = json_decode($model->attorney);
        $this->mortgageLender = json_decode($model->mortgageLender);
        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'password' => Yii::t('common', 'Password'),
            'roles' => Yii::t('common', 'Roles'),
            'profileselector' => Yii::t('common', 'Profile Selector'),
            'successmanager' => Yii::t('common', 'Success Manager'),
            'attorney' => Yii::t('common', 'Attorney'),
            'mortgageLender ' => Yii::t('common', 'Mortgage Lender  '),

            'agent' => Yii::t('common', 'Agent')
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;
            //print_r($this->roles);die;
            $client_flag = 0;
            foreach ($this->roles as $userrole) {
                if($userrole == 'client'){
                    $client_flag = 1;
                }
            }
            if($client_flag == 1){
                $model->profileselector = json_encode($this->profileselector);
                $model->successmanager = json_encode($this->successmanager);
                $model->attorney = json_encode($this->attorney);
                $model->mortgageLender   = json_encode($this->mortgageLender  );
                $model->agent = json_encode($this->agent);
            }
            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());

            if ($this->roles && is_array($this->roles)) {
                foreach ($this->roles as $role) {
                    $auth->assign($auth->getRole($role), $model->getId());
                }
            }

            return !$model->hasErrors();
        }
        return null;
    }
}
