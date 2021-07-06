<?php
namespace backend\controllers;
use Yii;
use common\models\ContactList;
use common\models\ContactListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ContactlistController implements the CRUD actions for ContactList model.
 */
class ContactlistController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    public function behaviors()
        {       
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listContactlist'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['createContactlist'],
                    ],
                    
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['updateContactlist'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['deleteContactlis'],
                    ],
                ],

                'denyCallback' => function ($rule, $action) {
                    $this->redirect("@web/timeline-event/index");
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

    /**
     * Lists all ContactList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ContactList();
        $searchModel = new ContactListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        } 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'agent_array'=>$agent_arr,
        ]);
    }

    /**
     * Displays a single ContactList model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
      
        $model = new ContactList();
        if ($model->load(Yii::$app->request->post())) {
            // $model->user_id = Yii::$app->user->identity->id;
            $model->user_id = !empty($_POST['ContactList']['user_id'])?implode(",",$_POST['ContactList']['user_id']):'';
            if(empty($_POST['ContactList']['list_key'])){
                $model->list_key = $name = str_replace(' ', '_', $_POST['ContactList']['list_name']);
            }
            $model->save(false);
            Yii::$app->session->setFlash('success', 'ContactList Create Successfully.');
            return $this->redirect(['index']);
        }

        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }          
        return $this->render('create', [
            'model'=>$model,
            'agent_array'=>$agent_arr,
            'id'=>0
        ]);

    }

    /**
     * Updates an existing ContactList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $model->user_id = explode(',', $model->user_id);

        if ($model->load(Yii::$app->request->post())) {
            if(!empty($_POST['ContactList']['user_id'])){
                $model->user_id = implode(",",$_POST['ContactList']['user_id']);
            }
            if(empty($_POST['ContactList']['list_key'])){
                $model->list_key = $name = str_replace(' ', '_', $_POST['ContactList']['list_name']);
            }
            //print_r($model);die;
            $model->save(false);
            return $this->redirect(['index']);
        }
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        } 

        return $this->render('update', [
            'model' => $model,
            'agent_array'=>$agent_arr,
            'id'=>$id

        ]);
    }

    /**
     * Deletes an existing ContactList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
