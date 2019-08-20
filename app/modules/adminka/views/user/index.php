<?php
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
//use Yii;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Blog\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Менеджер пользователей';
$this->params['breadcrumbs'][] = $this->title;
$adminList = Yii::$app->params['rootUsers'];
?>
<div class="user-index">

    <p>
        <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => function ($model, $key, $index, $grid ) use ($adminList) {
                /* @var $model app\models\ActiveRecord\User\User */
                    if (in_array($model->username, $adminList ))
                   return ['class' => 'admin'
                       
                       ];
                },
                'columns' => [
                    'username:text:Логин',
                    'email:email:Электронная почта',
                    [
                        'class' => ActionColumn::class,
                        'visibleButtons' => [
                            'update' => function ($model)  use ($adminList) {
                                return !in_array($model->username, $adminList );
                            },
                            'delete' => function ($model)  use ($adminList) {
                                return !in_array($model->username, $adminList );
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
