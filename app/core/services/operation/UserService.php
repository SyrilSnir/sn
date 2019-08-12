<?php

namespace app\core\services\operation;

use app\models\Forms\Manage\User\CreateForm;
use app\models\Forms\Manage\User\EditForm;
use app\models\ActiveRecord\User;
use app\core\factory\UsersFactory;
use app\core\repositories\UserRepository;

/**
 * Description of UserService
 *
 * @author kotov
 */
class UserService
{
    public function create(CreateForm $form) :User
    {
        $user = UsersFactory::create(
                $form->username, 
                $form->email, 
                $form->password);
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }
        return $user;
        
    }
    
    public function edit($id, EditForm $form) 
    {
        $user = UserRepository::findById($id);
        $user->username = $form->username;
        $user->email = $form->email;  
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }        
    }
    
    public function remove($id)
    {
        $user = UserRepository::findById($id);
        if (!$user->delete()) {
            throw new \RuntimeException('Ошибка удаления.');
        }        
    }
}
