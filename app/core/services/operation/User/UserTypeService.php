<?php

namespace app\core\services\operation\User;

use app\models\Forms\Manage\User\UserTypeForm;
use app\models\ActiveRecord\User\UserType;
use app\core\services\operation\RemoveOperationTrait;
use app\core\services\operation\ModelOperationsInterface;


/**
 * Description of UserTypeService
 *
 * @author kotov
 */
class UserTypeService implements ModelOperationsInterface
{
   use RemoveOperationTrait;
   
   /**
    * 
    * @param UserTypeForm $form
    * @return UserType
    * @throws \RuntimeException
    */
    public function create($form)
    {
        $userType = UserType::create(
                $form->name,
                $form->slug);
        if (!$userType->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }
        return $userType;
    }
    /**
     * 
     * @param UserType $userType
     * @param UserTypeForm $form
     * @throws \RuntimeException
     */
    public function edit($userType, $form) 
    {
       // $userType = UserTypeRepository->findById($id);
        $userType->name = $form->name;
        $userType->slug = $form->slug;  
        if (!$userType->save()) {
            throw new \RuntimeException('Ошибка сохранения.');        
        }        
    } 
}
