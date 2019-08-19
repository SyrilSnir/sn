<?php

namespace app\core\services\auth;

use app\core\repositories\User\UserRepository;
use app\models\Forms\LoginForm;
use app\models\ActiveRecord\User\User;
/**
 * Description of AuthService
 *
 * @author kotov
 */
class AuthService
{ 

    public function auth(LoginForm $loginForm):User
    {
        $user = UserRepository::findByLoginOrEmail($loginForm->login);
        if (!$user || !$user->validatePassword($loginForm->password)) {
            throw new \DomainException('Неверное имя пользователя или пароль');
        }        
        return $user;
    }
}
