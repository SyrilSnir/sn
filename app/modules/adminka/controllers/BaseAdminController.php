<?php

namespace app\modules\adminka\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Description of BaseAdminController
 *
 * @author kotov
 */
class BaseAdminController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['login'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['adminPanel'],
                    ],
                ]
            ]
        ];
    }
    
}
