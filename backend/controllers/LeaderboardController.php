<?php

namespace backend\controllers;

use backend\models\Leaderboard;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * Application timeline controller
 */
class LeaderboardController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

 public function behaviors()
        {       
         return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'add','update','delete','category','add-category'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['listLeaderboard'],
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
    
    public function actionAdd()
    {
        $model = new Rets();
        //$model->scenario = "add";            
        if ($model->load(Yii::$app->request->post())) {
            $retsData =Yii::$app->request->post();      
             
            $model->save();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>0
        ]);
    }
    


    public function actionUpdate($id)
    {
        //die('sss');
        $model = new Leaderboard();
        $model->attributes = $model->getDataById($id); 
        if ($model->load(Yii::$app->request->post())) {
            $model->update();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Property saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        $model = new leaderboard();        
        if(!empty($id)){
            $model->deleteById($id);           
            return $this->redirect(['index']);            
        }
    }

    public function actionIndex()
    {
        $model = new Leaderboard();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('leaderboard')
        ->all();
        foreach($rows as $aakey => $rowArr){
            foreach($rowArr as $key => $value){
                if($key == 'rank' || $key == 'c_set_score' || $key == 'zillow_reviews'){
                    $lbArr[$aakey][$key] = json_decode($value);
                }else{
                    $lbArr[$aakey][$key] = $value;
                }                
            }
        }
        //print_r($lbArr);die;
        $provider = new ArrayDataProvider([
            'allModels' => $lbArr,
            'sort' => [
                'attributes' => ['rank','agent_name'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('index',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }


    public function actionImport(){
        $model = new Leaderboard();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->csv_file = UploadedFile::getInstance($model, 'csv_file');
            if ( $model->csv_file ){
                $time = time();
                $storage = \Yii::getAlias('@storage');
                $csv_path = $storage.'/web/csv/leaderboard/';
                if(!is_dir($csv_path)) {
                    mkdir($csv_path, 0777, true);
                }
                $model->csv_file->saveAs($csv_path.$time. '.' . $model->csv_file->extension);
                $model->csv_file = $csv_path.$time. '.' . $model->csv_file->extension;
                $handle = fopen($model->csv_file, "r"); 
                $firstline = true;        
                while (($fileop = fgetcsv($handle, 10000, ",")) !== false) 
                {       
                    if (!$firstline) {
                        //print_r($fileop);die;  
                        $insertData['rank'] = !empty($fileop[0])?json_encode($fileop[0]):null;              
                        $insertData['agent_name'] = !empty($fileop[1])?$fileop[1]:null;
                        $insertData['active_contracts'] = !empty($fileop[2])?$fileop[2]:null;;
                        $insertData['closed_deals'] = !empty($fileop[3])?$fileop[3]:null;                  
                        $insertData['contract_volume'] = !empty($fileop[4])?$fileop[4]:null;          
                        $insertData['closed_volume'] = !empty($fileop[5])?$fileop[5]:null;           
                        $insertData['c_set_score'] = !empty($fileop[6])?json_encode($fileop[6]):null;           
                        $insertData['pick_up'] = !empty($fileop[7])?json_encode($fileop[7]):null;           
                        $insertData['zillow_reviews'] = !empty($fileop[8])?json_encode($fileop[8]):null;
                        $insertData['agent_id'] = !empty($fileop[9])?$fileop[9]:null;
                        $insertData['created_at'] = time();
                        //print_r($insertData);die;
                        $existdata_id = (new \yii\db\Query())
                        ->select(['id'])
                        ->from('leaderboard')
                        ->where(['agent_name' => $insertData['agent_name']])
                        ->Scalar();
                        if(!empty($existdata_id)){
                            Yii::$app->db->createCommand()
                             ->update('leaderboard', $insertData,['id' => $existdata_id])
                             ->execute();
                        }else{
                            $p = Yii::$app->db->createCommand()
                            ->insert('leaderboard',$insertData)
                            ->execute();  
                        }                      
                    }
                    $firstline = false;
                 }
            }
            return $this->redirect(['index']);
        }
        return $this->render('import',[
                'model' => $model,
            ]);
    }
    
}
