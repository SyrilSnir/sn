<?php

namespace app\models\Forms\Manage\User;

use app\models\ActiveRecord\User\User;


/**
 * Description of CreateForm
 *
 * @author kotov
 */
class CreateForm extends UserManageForm
{
    //public $birthday;
    public $password;
    public $password_repeat;


    public function attributeLabels(): array
    {
        return [
            'username' => 'Имя пользователя (Логин)',
            'fio' => 'ФИО',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'user_type_id' => 'Тип учетной записи'
        ];
    }
    
    public function rules(): array
    {
        return
        [
            [['username','email','password'],'required'],
            [['username','email','password','fio'],'trim'],
            ['user_type_id' ,'integer'],
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
            ['email','email'],
            ['fio','safe'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password','message' => 'Введенные пароли не совпадают'],
        ];
    }
}
