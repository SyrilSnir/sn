<?php

namespace app\modules\adminka\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Forms\LoginForm;

/**
 * Description of LoginController
 *
 * @author kotov
 */
class LoginController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                   throw new \Exception('Вы уже авторизованы в системе');
                },
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $this->layout = 'main-login';
        $loginForm = new LoginForm();
        return $this->render('login', [
            'model' => $loginForm,
        ]);        
    }
}
