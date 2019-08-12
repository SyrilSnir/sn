<?php

namespace app\controllers\auth;

use yii\web\Controller;
use app\models\Forms\LoginForm;
use app\core\services\auth\AuthService;
use app\core\manage\auth\UserIdentity;
use Yii;



/**
 * Description of AuthController
 *
 * @author kotov
 */
class AuthController extends Controller
{
    /**
     *
     * @var AuthService
     */
    protected $authService;
    
    public function __construct(
            $id, 
            $module,
            AuthService $authService, 
            $config = array())
    {
        parent::__construct($id, $module, $config);
        $this->authService = $authService;
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->validate()) {
            try {
                $user = $this->authService->auth($loginForm);
                Yii::$app->user->login(new UserIdentity($user));
                return $this->goBack();
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());                
            }
        }
        return $this->render('login',['userLoginForm' => $loginForm]);
    }
}