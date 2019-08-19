<?php

namespace app\modules\adminka\controllers;

use app\modules\adminka\models\users\UserSearch;
use app\core\repositories\User\UserRepository;
use app\models\Forms\Manage\User\EditForm;
use app\models\Forms\Manage\User\CreateForm;
use app\core\services\operation\User\UserService;
use Yii;


/**
 * Description of UsersController
 *
 * @author kotov
 */
class UserController extends BaseAdminController
{
    /**
     *
     * @var UserService
     */
    protected $service;
    
    /**
     *
     * @var UserRepository
     */
    protected $repository;
    
    public function __construct(
            $id, 
            $module, 
            UserService $service,
            UserRepository $repository,
            $config = array())
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->repository = $repository;
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
        $user = $this->findModel($this->repository, $id);
        $form = new EditForm($user);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $this->service->edit($this->repository->findById($id), $form);
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
            'user' => $this->findModel($this->repository,$id),
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


}
