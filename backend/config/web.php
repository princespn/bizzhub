<?php
use \yii\web\Request;
$baseUrl = str_replace('/backend/web', '/admin', (new Request)->getBaseUrl());
//echo $baseUrl;die;
$params = require(__DIR__ . '/params.php');
$config = [
    'homeUrl' => $baseUrl,
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'timeline-event/index',
    'id' => 'bizzhub',
    'name' => 'Bizz Hub',
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'enableCsrfValidation' => env('ENABLE_CSRF_VALIDATION'),
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => common\models\User::class,
            'loginUrl' => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class,
        ],
        /*'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://fub_admin:hylmovuisnes6x3k@cluster0.ljump.mongodb.net/fub_webhooks',
        ],*/
    ],
    'modules' => [
        'content' => [
            'class' => backend\modules\content\Module::class,
        ],
        'client' => [
            'class' => backend\modules\client\Module::class,
        ],
        'widget' => [
            'class' => backend\modules\widget\Module::class,
        ],
        'file' => [
            'class' => backend\modules\file\Module::class,
        ],
        'system' => [
            'class' => backend\modules\system\Module::class,
        ],
        'translation' => [
            'class' => backend\modules\translation\Module::class,
        ],
        'rbac' => [
            'class' => backend\modules\rbac\Module::class,
            'defaultRoute' => 'rbac-auth-item/index',
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ]
    ],
    'as globalAccess' => [
        'class' => common\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions' => ['login'],
            ],
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                //'roles' => ['@'],
                'roles' => ['agent', 'admin'],
                'actions' => ['logout'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions' => ['error'],
            ],
            [
                'controllers' => ['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers' => ['user', 'buildings', 'document', 'rets'],
                'allow' => true,
               // 'roles' => ['administrator'],
                'roles' => ['admin'],
            ],
            [
                'controllers' => ['user', 'buildings', 'document', 'rets'],
                'allow' => false,
            ],
            [
                'allow' => true,
                //'roles' => ['manager', 'administrator'],
                'roles' => ['agent', 'admin'],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend',
            ],
        ],
    ];
}

return $config;
