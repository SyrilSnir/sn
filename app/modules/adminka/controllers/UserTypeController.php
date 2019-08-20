<?php

namespace app\modules\adminka\controllers;

use app\modules\adminka\models\users\UserTypeSearch;
use app\core\repositories\User\UserTypeRepository;
use app\core\services\operation\User\UserTypeService;
use app\models\Forms\Manage\User\UserTypeForm;
use Yii;

/**
 * Description of UserTypesController
 *
 * @author kotov
 */
class UserTypeController extends BaseAdminController
{        
    /**
     *
     * @var UserTypeService
     */
    protected $service;
    /**
     *
     * @var UserTypeRepository
     */
    protected $repository;
    
    public function __construct(
            $id, 
            $module, 
            UserTypeRepository $repository,
            UserTypeService $service,
            $config = array())
    {
        parent::__construct($id, $module, $config);
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function actionIndex()
    {
        $searchModel = new UserTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[            
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUpdate($id)
    {
         $userType = $this->findModel($this->repository, $id);
         $form = new UserTypeForm($userType);
         if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $this->service->edit($this->repository->findById($id), $form);
            return $this->redirect(['view', 'id' => $userType->id]);
        }
        return $this->render('update', [
            'model' => $form,
            'userType' => $userType,
        ]);
         
    }

        /**
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'userType' => $this->findModel($this->repository,$id),
        ]);
    }
    
    public function actionCreate()
    {
        $form = new UserTypeForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $userType = $this->service->create($form);
                return $this->redirect(['view', 'id' => $userType->id]);
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }   
    
    protected function createModelFromForm()
    {
        
    }
}
