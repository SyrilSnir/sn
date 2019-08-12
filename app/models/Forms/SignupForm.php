<?php

namespace app\models\Forms;

use yii\base\Model;

/**
 * Description of SignupForm
 *
 * @author kotov
 */
class SignupForm extends Model
{
    public $login;
    public $fio;
    public $email;
    //public $birthday;
    public $password;
    public $password_repeat;
    
    public function attributeLabels(): array
    {
        return [
            'login' => 'Имя пользователя (Логин)',
            'fio' => 'ФИО',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль'
        ];
    }
    
    public function rules(): array
    {
        return
        [
            [['login','email','password'],'required'],
            [['login','email','password','fio'],'trim'],
            ['email','email'],
            ['fio','safe'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password','message' => 'Введенные пароли не совпадают'],
        ];
    }
    
}
