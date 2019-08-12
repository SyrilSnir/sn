<?php

namespace app\core\factory;

use app\models\ActiveRecord\User;
/**
 * Description of UsersFactory
 *
 * @author kotov
 */
class UsersFactory
{
    public static function create($userName,$email,$password):User
    {
        $user = new User();
        $user->username = $userName;
        $user->email = $email;
        $user->setPassword($password);
        $user->setAuthKey();
        return $user;
    }    
}
