<?php

namespace app\commands\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\ActiveRecord\User\User;
use app\models\ActiveRecord\User\UserType;
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
        $sql =  'TRUNCATE TABLE '.$prefix.'user_types;
                 TRUNCATE TABLE '.$prefix.'users;';
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
                DROP TABLE '.$prefix.'users;
                DROP TABLE '.$prefix.'user_types;';
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
        $adminType = new UserType();
        $adminType->name = 'Администратор';
        $adminType->slug = 'admin';
        $adminType->save(false);
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@test.ru';
        $user->user_types_id = $adminType->id;
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
