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
                $form->fio,
                $form->user_type_id);
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }
        return $user;
        
    }
    /**
     * 
     * @param User $user
     * @param EditForm $form
     * @throws \RuntimeException
     */
    public function edit($user, $form) 
    {
        $user->username = $form->username;
        $user->email = $form->email;  
        $user->fio = $form->fio;
        $user->user_types_id = $form->user_type_id;
        if (!$user->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }        
    }    
}
