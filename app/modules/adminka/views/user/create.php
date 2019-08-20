<?php

/* @var $this yii\web\View */
/* @var $model app\models\Forms\Manage\User\CreateForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'fio')->textInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'user_type_id')->dropDownList($model->typeList()) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxLength' => true]) ?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['maxLength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
