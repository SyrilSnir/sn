<?php

namespace app\controllers\auth;

use yii\web\Controller;
use app\models\Forms\SignupForm;
use app\core\services\auth\SignupService;
use app\core\manage\auth\UserIdentity;
use Yii;

/**
 * Description of SignupController
 *
 * @author kotov
 */
class SignupController extends Controller
{
    /**
     *
     * @var SignupService
     */
    protected $signupService;
    
    public function __construct(
            $id, 
            $module, 
            SignupService $service, 
            $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->signupService = $service;
    }
    public function actionIndex()
    {
        $signupForm = new SignupForm();
        if ($signupForm->load(Yii::$app->request->post()) && $signupForm->validate()) {
            try {
                $user = $this->signupService->signup($signupForm);
                Yii::$app->session->setFlash('success', 'Поздравляем, Вы успешно зарегистрирован в системе');
                Yii::$app->user->login(new UserIdentity($user));
                return $this->goHome();
            } catch(\DomainException $e) {
                
            }
        }
        return $this->render('register',['userSignupForm' => $signupForm]);
    }
}
