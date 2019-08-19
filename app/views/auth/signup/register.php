<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $userSignupForm app\models\Forms\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация нового пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Для прохождения регистрации пожалуйста заподните форму:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                <?= $form->field($userSignupForm, 'username')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($userSignupForm, 'email') ?>   
            
                <?= $form->field($userSignupForm, 'fio') ?>            

                <?= $form->field($userSignupForm, 'password')->passwordInput() ?>
            
                <?= $form->field($userSignupForm, 'password_repeat')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

