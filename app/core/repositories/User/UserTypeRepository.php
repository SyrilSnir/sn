<?php

namespace app\core\repositories\User;

use app\models\ActiveRecord\User\UserType;
use yii\db\ActiveRecord;
use app\core\repositories\RepositoryInterface;

/**
 * Description of UserTypeRepository
 *
 * @author kotov
 */
class UserTypeRepository implements RepositoryInterface
{
    public function findById($id): ?ActiveRecord
    {
        return UserType::find($id)
                ->andWhere(['id' => $id])
                ->one();
    }
}
