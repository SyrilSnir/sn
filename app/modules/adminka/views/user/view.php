<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $user app\models\ActiveRecord\User\User */
/* @var $modificationsProvider yii\data\ActiveDataProvider */

$this->title = $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (!in_array($user->username, Yii::$app->params['rootUsers'])): ?>
<div class="user-view">
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php endif; ?>
    <div class="box">
        <div class="box-header with-border">Данные пользователя</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $user,
                'attributes' => [
                    'id',
                    'username:text:Логин',
                    'type:text:Тип',
                    'email',
                    'fio:text:ФИО'
                ],
            ]); ?>
        </div>
    </div>


</div>
