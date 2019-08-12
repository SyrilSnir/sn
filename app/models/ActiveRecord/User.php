<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;
use app\models\TimestampTrait;

/**
 * 
 * Description of User
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $fio
 * @property string $password_hash write-only password
 * @property string $auth_key
 * 
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

    public function setAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    
}
