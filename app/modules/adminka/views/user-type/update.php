<?php

/* @var $this yii\web\View */
/* @var $model  app\models\Forms\Manage\User\User\UserTypeForm */
/* @var $userType app\models\ActiveRecord\User\UserType */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Редактировать тип учетной записи: ' . $userType->id;
$this->params['breadcrumbs'][] = ['label' => 'UserType', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $userType->id, 'url' => ['view', 'id' => $userType->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'slug')->textInput(['maxLength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


