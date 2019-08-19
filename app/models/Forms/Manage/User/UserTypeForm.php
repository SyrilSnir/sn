<?php

namespace app\models\Forms\Manage\User;

use app\models\ActiveRecord\User\UserType;
use yii\base\Model;

/**
 * Description of UserTypeForm
 *
 * @author kotov
 */
class UserTypeForm extends Model
{
    public $name;
    public $slug;
    
    public function __construct(UserType $userType=null, $config = array())
    {
        if ($userType) {
            $this->name = $userType->name;
            $this->slug = $userType->slug;
        }
        parent::__construct($config);
    }

        public function attributeLabels(): array
    {
        return [
          'name'  => 'Тип учетной записи',
          'slug' => 'Уникальный идентификатор'
        ];
    }

    public function rules(): array 
    {
        return [
            [['name','slug'],'required']
        ];
    }
}
