<?php

namespace app\models\Forms;

use yii\base\Model;
use app\models\ActiveRecord\User\User;

/**
 * Description of SignupForm
 *
 * @author kotov
 */
class SignupForm extends Model
{
    public $username;
    public $fio;
    public $email;
    //public $birthday;
    public $password;
    public $password_repeat;
    
    public function attributeLabels(): array
    {
        return [
            'username' => 'Имя пользователя (Логин)',
            'fio' => 'ФИО',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль'
        ];
    }
    
    public function rules(): array
    {
        return
        [
            [['username','email','password'],'required'],
            [['username','email','password','fio'],'trim'],
            ['email','email'],
            ['fio','safe'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password','message' => 'Введенные пароли не совпадают'],
            [
                ['username'],
                    'unique',
                    'targetClass'=> User::class,
                    'targetAttribute' => ['username','username' => 'email'],
                    'targetAttributeJunction' =>'or',
                    'message' => 'Пользователь с указанными данными уже зарегистрирован'
                ],  
            [                
                ['email'],
                    'unique',
                    'targetClass'=> User::class,
                    'targetAttribute' => ['email','email' => 'username'],
                    'targetAttributeJunction' =>'or',
                    'message' => 'Пользователь с указанными данными уже зарегистрирован'
            ],
        ];
    }
    
}
