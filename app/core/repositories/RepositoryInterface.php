<?php

namespace app\core\repositories;

use yii\db\ActiveRecord;
/**
 *
 * @author kotov
 */
interface RepositoryInterface
{
    public function findById($id): ?ActiveRecord;
}
