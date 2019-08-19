<?php

namespace app\core\repositories\User;

use app\models\ActiveRecord\User\User;
use yii\db\ActiveRecord;
use app\core\repositories\RepositoryInterface;

/**
 * Description of UserRepository
 *
 * @author kotov
 */
class UserRepository implements RepositoryInterface
{
    public function findById($id): ?ActiveRecord
    {
        return User::find($id)
                ->andWhere(['id' => $id])
                ->andWhere(['active' => User::STATUS_ACTIVE])
                ->one();
    }
    public function findByLoginOrEmail($value):? User
    {
        return User::find()
                ->where(['active' => User::STATUS_ACTIVE])
                ->andWhere(['or',['email' => $value],['username' => $value]])                
                ->one();
    }            
}
