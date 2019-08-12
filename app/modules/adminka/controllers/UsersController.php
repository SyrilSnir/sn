<?php

namespace app\modules\adminka\controllers;

use app\modules\adminka\models\users\UserSearch;
use app\core\repositories\UserRepository;
use app\models\ActiveRecord\User;
use app\models\Forms\Manage\User\EditForm;
use app\models\Forms\Manage\User\CreateForm;
use app\core\services\operation\UserService;
use Yii;


/**
 * Description of UsersController
 *
 * @author kotov
 */
class UsersController extends BaseAdminController
{
    /**
     *
     * @var UserService
     */
    protected $service;
    
    public function __construct(
            $id, 
            $module, 
            UserService $service,
            $config = array())
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

        public function actionIndex() 
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[            
           'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $form = new EditForm($user);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $this->service->edit($id, $form);
            return $this->redirect(['view', 'id' => $user->id]);
        }
        return $this->render('update', [
            'model' => $form,
            'user' => $user,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'user' => $this->findModel($id),
        ]);
    }
    
    public function actionCreate()
    {
        $form = new CreateForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user = $this->service->create($form);
                return $this->redirect(['view', 'id' => $user->id]);
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }
    
    public function actionDelete($id)
    {
        $this->service->remove($id);
        return $this->redirect(['index']);
    }

        /**
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): User
    {
        if (($model = UserRepository::findById($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
