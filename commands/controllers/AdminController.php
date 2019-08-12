<?php

namespace app\commands\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\ActiveRecord\User;
use Yii;

/**
 * Description of AdminController
 *
 * @author kotov
 */
class AdminController extends Controller
{
    public function actionClearTables()
    {
        $prefix = Yii::$app->db->tablePrefix;
        $sql = 'TRUNCATE TABLE '.$prefix.'users;';
        try {     
            $this->query($sql);
            echo "Tables cleared\n";
        } catch (Exception $ex) {
            echo "Request error\n";
        }        
        return ExitCode::OK;
    }
    
    public function actionDropTables() {
        $prefix = Yii::$app->db->tablePrefix;
        $sql = 'TRUNCATE TABLE '.$prefix.'migration;                
                DROP TABLE '.$prefix.'users;';
                try {     
        $this->query($sql);
            echo "Tables dropped\n";
        } catch (Exception $ex) {
            echo "Request error\n";
        }      
        
        return ExitCode::OK;
    } 
    
    protected function query($sql) 
    {
        $link = Yii::$app->db;
        $link->open();
        $state = $link->createCommand($sql);
        return $state->query();
    }
    
    public function actionAddData()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@test.ru';
        $user->setPassword('123');
        $user->setAuthKey();
        $user->save(false);
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, $user->id);
        
        echo 'Data Added' . "\n";

        return ExitCode::OK;
    }
}
