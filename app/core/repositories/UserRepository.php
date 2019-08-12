<?php

namespace app\core\repositories;

use app\models\ActiveRecord\User;
/**
 * Description of UserRepository
 *
 * @author kotov
 */
class UserRepository
{
    public static function findById($id): ?User
    {
        return User::find($id)
                ->andWhere(['id' => $id])
                ->andWhere(['active' => User::STATUS_ACTIVE])
                ->one();
    }
    public static function findByLoginOrEmail($value):?User
    {
        return User::find()
                ->where(['active' => User::STATUS_ACTIVE])
                ->andWhere(['or',['email' => $value],['username' => $value]])                
                ->one();
    }            
}
