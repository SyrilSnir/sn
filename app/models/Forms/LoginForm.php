<?php

namespace app\models\Forms;

use yii\base\Model;

class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = false;
    
    public function rules()
    {
        return [
                [['login', 'password'], 'required'],
            ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'login' => 'Имя пользователя (или Email)',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }
    
}
