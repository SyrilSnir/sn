<?php

namespace app\modules\adminka\models\users;

use yii\data\ActiveDataProvider;
use yii\base\Model;
use app\models\ActiveRecord\User;
/**
 * Description of UserSearch
 *
 * @author kotov
 */
class UserSearch extends Model
{
    public $username;
    public $email;
    
    public function rules(): array
    {
        return [
            [['username','email'], 'safe'],
        ];
    }
    
    public function search(array $params): ActiveDataProvider
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['username' => SORT_ASC]
            ]
        ]);
        $query->andFilterWhere([
            'active' => User::STATUS_ACTIVE,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['like','username', $this->username]);
        $query->andFilterWhere(['like','email', $this->email]);
        return $dataProvider;
    }
}
