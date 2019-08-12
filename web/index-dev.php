<?php 
    // comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../config/functions.php';
require __DIR__ . '/../config/bootstrap.php';

$baseConfig = require __DIR__  . '/../config/web.php';
$componentsConfig['components']['urlManager'] = require __DIR__  . '/../config/urlManager.php';
$dbConfig['components']['db'] = require __DIR__  . '/../config/db.php';
$config = array_merge_recursive($baseConfig,$componentsConfig,$dbConfig);

//dump($config);die;
//dump(class_exists(app\controllers\SiteController::class));die;
(new yii\web\Application($config))->run();