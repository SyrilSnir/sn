<?php

namespace app\models\ActiveRecord\User;

use yii\db\ActiveRecord;

/**
 * Тип пользователя
 * 
 * @property integer $id
 * @property string $name
 * @property string $slug
 *
 * @author kotov
 */
class UserType extends ActiveRecord
{
    
    const ROOT_USER_TYPE = 'admin';
    
    public static function tableName(): string
    {
        return '{{%user_types}}';
    }
    
    public static function create($name,$slug):self
    {
        $userType = new self();
        $userType->name = $name;
        $userType->slug = $slug;
        return $userType;
    } 
}
