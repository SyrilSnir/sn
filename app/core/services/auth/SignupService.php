<?php

namespace app\core\services\auth;

use app\models\Forms\SignupForm;
use app\core\factory\UsersFactory;
use app\models\ActiveRecord\User\User;

/**
 * Description of SingnupService
 *
 * @author kotov
 */
class SignupService
{
   
    public function signup(SignupForm $form):User
    {
        $user = UsersFactory::create(
                $form->username, 
                $form->email, 
                $form->password,
                $form->fio
            );
        $user->save();
        return $user;
    }
    
  //  protected 
    
}
