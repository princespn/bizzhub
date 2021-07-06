<?php

// namespace app\controllers;
namespace backend\controllers;
use common\components\AdminPrivileges;
use backend\modules\rbac\models\RbacAuthAssignment;
use Yii;
use common\models\Usergroups;
use common\models\UsergroupsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsergroupsController extends Controller
{

public  $user, $contact,$contactlist,$template,$category,$form,$clientdata,$buildings,$supports,$training,$document,$timelineevent,$rets,$leaderboard,$staticpage,$article,$category1;

	public function behaviors()
    {
		$ClientAdmin = '';
		if(isset(\Yii::$app->user->identity->company_id))
			$ClientAdmin = Yii::$app->user->identity->company_id;
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'new', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					
                ],
                'denyCallback' => function ($rule, $action) {
                    $this->redirect("@web/site/index");
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];

    }

    
    public function actionIndex()
    {
        $searchModel = new UsergroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //print_r($dataProvider);die;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	
	public function actionNew()
    {
        $model = new Usergroups();
        $userDetails = yii::$app->user->identity;//->getContact();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $name = $model->name;
            $roledescription = $name;			
           // $rolename = strtolower($name) . time();

            $rolename = strtolower($name);

            $rolename = str_replace(" ", "", $rolename);
            $auth = Yii::$app->authManager;
            $userrole = $auth->createRole($rolename);
            $userrole->description = $roledescription;
            $auth->add($userrole);
            $this->addPermissiontoRole($userrole, $model, $auth);
            Yii::$app->session->setFlash('success', 'User Role Saved Successfully.');
            return $this->redirect(['index',]);
        } 
		else {
            $model->usertype = 'admin';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	
	public function actionUpdate($name)
    {
        //echo phpinfo();
        
        $model = new Usergroups();

        $userDetails = yii::$app->user->identity;
        //print_r($userDetails);die;

        $auth = Yii::$app->authManager;
        $userrole = $auth->getRole($name);
        //print_r($userrole);die;
        $userpermissions = $auth->getPermissionsByRole($name);
        //print_r($userpermissions);die;
        $tempUserType = $name;

        $model->name = $userrole->description;
        $model->usertype = $tempUserType;

        $this->setDefaultValues();

		//$model->user = [];
		$model->contact = [];
        $model->contactlist = [];
        $model->template = [];
        $model->category = [];
        $model->form = [];
        $model->clientdata = [];
        $model->buildings = [];
        $model->supports = [];
        $model->training = [];
        $model->document = [];
        $model->timelineevent = [];
        $model->rets = [];
        $model->leaderboard = [];
        $model->staticpage = [];
        $model->article = [];
        $model->category1 = [];

        foreach ($userpermissions as $permission) {
			// if (in_array($permission->name, $this->user)) {
   //              array_push($model->user, $permission->name);
   //          }			
			if (in_array($permission->name, $this->contact)) {
                array_push($model->contact, $permission->name);
            }
			if (in_array($permission->name, $this->contactlist)) {
                array_push($model->contactlist, $permission->name);
            }
            if (in_array($permission->name, $this->template)) {
                array_push($model->template, $permission->name);
            }
            if (in_array($permission->name, $this->category)) {
                array_push($model->category, $permission->name);
            }
            if (in_array($permission->name, $this->form)) {
                array_push($model->form, $permission->name);
            }
            if (in_array($permission->name, $this->clientdata)) {
                array_push($model->clientdata, $permission->name);
            }
            if (in_array($permission->name, $this->buildings)) {
                array_push($model->buildings, $permission->name);
            }
            if (in_array($permission->name, $this->supports)) {
                array_push($model->supports, $permission->name);
            }
            if (in_array($permission->name, $this->training)) {
                array_push($model->training, $permission->name);
            }
             if (in_array($permission->name, $this->document)) {
                array_push($model->document, $permission->name);
            }
            if (in_array($permission->name, $this->timelineevent)) {
                array_push($model->timelineevent, $permission->name);
            }
             if (in_array($permission->name, $this->rets)) {
                array_push($model->rets, $permission->name);
            }
            if (in_array($permission->name, $this->leaderboard)) {
                array_push($model->leaderboard, $permission->name);
            }
            if (in_array($permission->name, $this->staticpage)) {
                array_push($model->staticpage, $permission->name);
            }
            if (in_array($permission->name, $this->article)) {
                array_push($model->article, $permission->name);
            }
            if (in_array($permission->name, $this->category1)) {
                array_push($model->category1, $permission->name);
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //print_r(Yii::$app->request->post());die;
       if($tempUserType[0]!=$model->usertype){
                $roleAssignedUsers = $this->getUsersByRole($userrole->name);
                $auth->remove($userrole);
                $rolename =strtolower($model->name);
                // $rolename =strtolower($model->name) . time();
                $rolename = str_replace(" ", "", $rolename);
                // $auth->add($userrole);
                $userrole = $auth->createRole($rolename);
                $userrole->description = $model->name;
                $auth->add($userrole);
                if(!is_null($roleAssignedUsers)){
                    foreach ($roleAssignedUsers as $userid) {
                        $auth->assign($userrole,$userid['user_id']);
                    }
                }

            }else{
                $userrole->description = $model->name;
                $auth->update($name, $userrole);
                $auth->removeChildren($userrole);
            }

            $this->addPermissiontoRole($userrole, $model, $auth);
			
            Yii::$app->session->setFlash('success', 'User Role Updated Successfully.');
			return $this->redirect('index');
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function addPermissiontoRole($userrole, $model, $auth)
    {
       

        
            

            // if (isset($_POST['Usergroups']["user"]) && !empty($_POST['Usergroups']["user"])) {
            //     $user = $_POST['Usergroups']["user"];

            //     $userList = AdminPrivileges::forUser();
                
            //     foreach ($user as $permission) {
            //         if(is_null($rolepermission = $auth->getPermission($permission))){
            //             $rolepermission = $auth->createPermission($permission);
            //             $rolepermission->description = $userList[$permission];
            //             $auth->add($rolepermission);
            //         }
            //         $auth->addChild($userrole, $rolepermission);
            //     }
            // }

            if (isset($_POST['Usergroups']["contact"]) && !empty($_POST['Usergroups']["contact"])) {
                $user = $_POST['Usergroups']["contact"];

                $userList = AdminPrivileges::forContact();
                
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["contactlist"]) && !empty($_POST['Usergroups']["contactlist"])) {
                $user = $_POST['Usergroups']["contactlist"];

                $userList = AdminPrivileges::forContactList();
                
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["template"]) && !empty($_POST['Usergroups']["template"])) {
                $user = $_POST['Usergroups']["template"];

                $userList = AdminPrivileges::forTemplate();
                
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

             if (isset($_POST['Usergroups']["category"]) && !empty($_POST['Usergroups']["category"])) {
                $user = $_POST['Usergroups']["category"];

                $userList = AdminPrivileges::forCategory();
                
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["form"]) && !empty($_POST['Usergroups']["form"])) {
                $user = $_POST['Usergroups']["form"];

                $userList = AdminPrivileges::forForm();
                
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["clientdata"]) && !empty($_POST['Usergroups']["clientdata"])) {
                $user = $_POST['Usergroups']["clientdata"];
                $userList = AdminPrivileges::forClientData();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["buildings"]) && !empty($_POST['Usergroups']["buildings"])) {
                $user = $_POST['Usergroups']["buildings"];
                $userList = AdminPrivileges::forBuildings();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }
            if (isset($_POST['Usergroups']["supports"]) && !empty($_POST['Usergroups']["supports"])) {
                $user = $_POST['Usergroups']["supports"];
                $userList = AdminPrivileges::forSupports();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["training"]) && !empty($_POST['Usergroups']["training"])) {
                $user = $_POST['Usergroups']["training"];
                $userList = AdminPrivileges::forTraining();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["document"]) && !empty($_POST['Usergroups']["document"])) {
                $user = $_POST['Usergroups']["document"];
                $userList = AdminPrivileges::forDocument();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["timelineevent"]) && !empty($_POST['Usergroups']["timelineevent"])) {
                $user = $_POST['Usergroups']["timelineevent"];
                $userList = AdminPrivileges::forTimelineevent();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["rets"]) && !empty($_POST['Usergroups']["rets"])) {
                $user = $_POST['Usergroups']["rets"];
                $userList = AdminPrivileges::forRets();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["leaderboard"]) && !empty($_POST['Usergroups']["leaderboard"])) {
                $user = $_POST['Usergroups']["leaderboard"];
                $userList = AdminPrivileges::forLeaderboard();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["staticpage"]) && !empty($_POST['Usergroups']["staticpage"])) {
                $user = $_POST['Usergroups']["staticpage"];
                $userList = AdminPrivileges::forStaticPage();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["article"]) && !empty($_POST['Usergroups']["article"])) {
                $user = $_POST['Usergroups']["article"];
                $userList = AdminPrivileges::forArticle();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            if (isset($_POST['Usergroups']["category1"]) && !empty($_POST['Usergroups']["category1"])) {
                $user = $_POST['Usergroups']["category1"];
                $userList = AdminPrivileges::forCategorycon();
                foreach ($user as $permission) {
                    if(is_null($rolepermission = $auth->getPermission($permission))){
                        $rolepermission = $auth->createPermission($permission);
                        $rolepermission->description = $userList[$permission];
                        $auth->add($rolepermission);
                    }
                    $auth->addChild($userrole, $rolepermission);
                }
            }

            
    }


    private function setDefaultValues()
    {
       // $this->user = array_keys(AdminPrivileges::forUser());
        //$this->userGroup = array_keys(AdminPrivileges::forUserGroups());
        $this->contact = array_keys(AdminPrivileges::forContact());
        $this->contactlist = array_keys(AdminPrivileges::forContactList());
        $this->template = array_keys(AdminPrivileges::forTemplate());
        $this->category = array_keys(AdminPrivileges::forCategory());
        $this->form = array_keys(AdminPrivileges::forForm());
        $this->clientdata = array_keys(AdminPrivileges::forClientData());
        $this->buildings = array_keys(AdminPrivileges::forBuildings());
        $this->supports = array_keys(AdminPrivileges::forSupports());
        $this->training = array_keys(AdminPrivileges::forTraining());
        $this->document = array_keys(AdminPrivileges::forDocument());
        $this->timelineevent = array_keys(AdminPrivileges::forTimelineevent());
        $this->rets = array_keys(AdminPrivileges::forRets());
        $this->leaderboard = array_keys(AdminPrivileges::forLeaderboard());
        $this->staticpage = array_keys(AdminPrivileges::forStaticPage());
        $this->article = array_keys(AdminPrivileges::forArticle());
        $this->category1 = array_keys(AdminPrivileges::forCategorycon());
     }

    private function getUsersByRole($role)
    {
        $userAssiignmentList = RbacAuthAssignment::find()
            ->select('user_id')
            ->where(["item_name"=>$role])
            ->asArray()
            ->all();

        if(count($userAssiignmentList)>0){
            return $userAssiignmentList;
        }

        return null;

    }
}
