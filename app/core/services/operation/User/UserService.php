<?php

namespace app\core\services\operation\User;

use app\models\Forms\Manage\User\CreateForm;
use yii\db\ActiveRecord;
use app\models\Forms\Manage\User\EditForm;
use app\models\ActiveRecord\User\User;
use app\core\services\operation\ModelOperationsInterface;
use yii\base\Model;

/**
 * Description of UserService
 *
 * @author kotov
 */
class UserService implements ModelOperationsInterface
{
    /**
     * 
     * @param CreateForm $form
     * @return User
     * @throws \RuntimeException
     */
    public function create($form)
    {      
        $user = User::create(
                $form->username,                
                $form->email, 
                $form->password,
                $form->fio);
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }
        return $user;
        
    }
    
    public function edit($user, $form) 
    {
        $user->username = $form->username;
        $user->email = $form->email;  
        $user->fio = $form->fio;
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }        
    }    
}
