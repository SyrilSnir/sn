<?php
return [
    'id' => 'expertcrm',
    'name' => 'Экспертная CRM',
    'basePath' => realpath(__DIR__ .'/../'),
    'version' => '0.0',
    'viewPath' => '@views',
    'language' => 'ru-Ru',
    'params' => require_once __DIR__ . '/params.php',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [      
        'adminka' => [
            'class' => 'app\modules\adminka\Module',
            'layout' => 'main',
            'defaultRoute' => 'main/index',            
        ],    
    ],
    'components' => [
        'errorHandler' => [
          'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'request' => [
            'cookieValidationKey' => 'RYJTYJTUKJTYTGYUDJFKYKUU'
        ],
        'user' => [
            'identityClass' => 'app\core\manage\auth\UserIdentity',        
            'enableAutoLogin' => false,
            'loginUrl' => ['adminka/login'],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info'],
                    'logVars' => ['_GET', '_POST'],
                ],
            ],            
        ],
    ]
    
];

