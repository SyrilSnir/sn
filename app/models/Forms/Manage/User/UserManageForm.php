<?php

namespace app\models\Forms\Manage\User;


use yii\base\Model;
use yii\helpers\ArrayHelper;
use app\models\ActiveRecord\User\UserType;

/**
 * Description of UserManageForm
 *
 * @author kotov
 */
abstract class UserManageForm extends Model
{
    public $username;
    public $email;
    public $fio;
    public $user_type_id;
    
    public function typeList()
    {
        return ArrayHelper::map(
                        UserType::find()->orderBy('name')->asArray()->all(), 
                        'id', 
                        'name');        
    }
}
