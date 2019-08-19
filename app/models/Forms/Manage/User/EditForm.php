<?php

namespace app\models\Forms\Manage\User;

use app\models\ActiveRecord\User\User;
use yii\base\Model;


/**
 * Description of EditForm
 *
 * @author kotov
 */
class EditForm extends Model
{
    public $username;
    public $email;
    public $fio;


    /**
     *
     * @var User
     */
    protected $user;
    
    public function __construct(User $user, $config = array())
    {
        $this->username = $user->username;
        $this->email = $user->email; 
        $this->fio = $user->fio;
        $this->user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['username', 'email'], 'required'],                        
            [
                ['username'],
                    'unique',
                    'targetClass'=> User::class,
                    'targetAttribute' => ['username','username' => 'email'],
                    'targetAttributeJunction' =>'or',
                    'filter' => ['<>', 'id', $this->user->id],
                    'message' => 'Пользователь с указанными данными уже зарегистрирован'
                ],  
            [                
                ['email'],
                    'unique',
                    'targetClass'=> User::class,
                    'targetAttribute' => ['email','email' => 'username'],
                    'targetAttributeJunction' =>'or',
                    'filter' => ['<>', 'id', $this->user->id],
                    'message' => 'Пользователь с указанными данными уже зарегистрирован'
            ],
            [['fio'] , 'safe']
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'email' => 'Адрес электронной почты',
            'fio' => 'ФИО'
        ];
    }
}
