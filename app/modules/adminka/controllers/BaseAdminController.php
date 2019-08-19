<?php

namespace app\modules\adminka\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use app\core\repositories\RepositoryInterface;
use yii\db\ActiveRecord;

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
    
    /**
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(RepositoryInterface $repository, $id): ActiveRecord
    {
        if (($model = $repository->findById($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}
