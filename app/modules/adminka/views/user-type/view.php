<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $userType app\models\ActiveRecord\UserType */
/* @var $modificationsProvider yii\data\ActiveDataProvider */

$this->title = $userType->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы учетных записей', 'url' => ['user-types']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $userType->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $userType->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-header with-border">Данные типа учетной записи</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $userType,
                'attributes' => [
                    'id',
                    'name:text:Название',
                    'slug:text:Уникальный идентификатор',
                ],
            ]); ?>
        </div>
    </div>


</div>

