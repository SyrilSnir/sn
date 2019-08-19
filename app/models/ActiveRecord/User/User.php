<?php

namespace app\models\ActiveRecord\User;

use yii\db\ActiveRecord;
use Yii;
use app\models\TimestampTrait;
use app\models\ActiveRecord\User\UserType;

/**
 * 
 * Description of User
 * @property integer $id
 * @property integer $user_types_id
 * @property string $username
 * @property string $email
 * @property string $fio
 * @property string $password_hash write-only password
 * @property string $auth_key
 * @property UserType $user_type
 * @property integer $external
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * 
 *
 * @author kotov
 */
class User extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    
    use TimestampTrait;
    
    public static function create($userName,$email,$password,$fio):self
    {
        $user = new self();
        $user->username = $userName;
        $user->email = $email;
        $user->fio = $fio;
        $user->setPassword($password);
        $user->setAuthKey();
        return $user;
    }  
    public static function tableName(): string
    {
        return '{{%users}}';
    }

    public function setPassword($password) 
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    public function validatePassword($password):bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function getUserType()
    {
        return $this->hasOne(UserType::class, ['id' => 'user_types_id']);
    }

    public function setAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    public function getType()
    {
        return $this->userType->name;
    }
    
    
}
