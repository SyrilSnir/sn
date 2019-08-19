<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\User\UserTypeForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Новый тип учетной записи';
$this->params['breadcrumbs'][] = ['label' => 'UserType', 'url' => ['user-type']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput(['maxLength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>