<?php

namespace app\controllers;


use yii\web\Controller;
use Yii;

/**
 * 
 * Description of SiteController
 *
 * @author kotov
 */
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
