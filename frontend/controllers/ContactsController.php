<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\Contact;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class ContactsController extends Controller
{
    /**
     * @return array
     */
    //public $layout = "home";
    /*public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                'only' => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }*/

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index','add','edit','delete'],
                        'allow' => true,
                        'roles' => ['agent'],
                    ],                   

                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new Contact();
        $count = Yii::$app->db->createCommand('
                SELECT COUNT(*) FROM contact WHERE status=:status
            ', [':status' => 1])->queryScalar();
        $provider = new SqlDataProvider([
            'sql' => 'SELECT * FROM contact WHERE status=:status',
            'params' => [':status' => 1],
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'first_name',
                    'last_name',
                    'email',
                ],
            ],
        ]);
        //$model = $provider;

        $models = $provider->getModels();

        return $this->render('index',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }

    /**
     * @return string|Response
     */
    public function actionAdd()
    {
        $role = Yii::$app->authManager->getRoles();
        
        $model = new Contact();
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                //$contact_data = Yii::$app->request->post();
                //$agent_ids = json_encode($contact_data['Contact']['agent_id']);
                //$agent_ids = serialize($contact_data['Contact']['agent_id']);
                //$contact_data['Contact']['agent_id'] = $agent_ids;
                $model->save();
                return $this->redirect(['index']);
            }
        }
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        return $this->render('add', [
            'model' => $model,
            'agent_array'=>$agent_arr
        ]);
    }

    public function actionEdit($id)
    {
        $model = new Contact();
        //$model = $model->findByPk($id);
        $model->setModel($this->findModel($id));
        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                return $this->redirect(['index']);
            }
        }
        $agent_array = $model->getuserByRole('agent');
        foreach($agent_array as $a_user){
            $agent_arr[$a_user['id']]=$a_user['username'];
        }
        return $this->render('add', [
            'model' => $model,
            'agent_array'=>$agent_arr
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Contact();        
        if(!empty($id)){
            $model->deleteContatsById($id);           
            return $this->redirect(['index']);            
        }
    }

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }

        return $content;
    }
}
