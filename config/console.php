<?php
if (YII_DEBUG) {
    $db = require __DIR__ . '/db-dev.php';
} else {
    $db = require __DIR__ . '/db.php';
}

$config = [
    'id' => 'expertcrm-console',
    'basePath' => realpath(__DIR__ .'/../'),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
    ],
  //  'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];
return $config;

