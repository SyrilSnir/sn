<?php

namespace app\models\Forms\Manage\User;

use app\models\ActiveRecord\User;
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
    
    /**
     *
     * @var User
     */
    protected $user;
    
    public function __construct(User $user, $config = array())
    {
        $this->username = $user->username;
        $this->email = $user->email; 
        $this->user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['username', 'email'], 'required'],                        [
            ['username'],
                'unique',
                'targetClass'=> 'app\Models\ActiveRecord\User',
                'targetAttribute' => ['username','username' => 'email'],
                'targetAttributeJunction' =>'or',
                'filter' => ['<>', 'id', $this->user->id],
                'message' => 'Пользователь с указанными данными уже зарегистрирован'
            ],  
            [                
                ['email'],
                    'unique',
                    'targetClass'=> 'app\Models\ActiveRecord\User',
                    'targetAttribute' => ['email','email' => 'username'],
                    'targetAttributeJunction' =>'or',
                    'filter' => ['<>', 'id', $this->user->id],
                    'message' => 'Пользователь с указанными данными уже зарегистрирован'
            ],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'email' => 'Адрес электронной почты'
        ];
    }
}
