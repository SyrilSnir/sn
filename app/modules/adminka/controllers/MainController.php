<?php

namespace app\modules\adminka\controllers;

/**
 * Description of AdminController
 *
 * @author kotov
 */
class MainController extends BaseAdminController
{            

    public function actionIndex()
    {
        return $this->render('index');
    }
}
