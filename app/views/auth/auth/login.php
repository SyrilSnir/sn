<?php
use yii\widgets\ActiveForm;
use \yii\bootstrap\Html;

?>
<div class="panel panel-info">
    <div class="panel-heading">
     <h1>Войти на сайт</h1>  
    </div>
    <div class="panel-body">
<?php
    $form = ActiveForm::begin(['id' => 'user-login-form']); 
?>
<?php
    echo $form->field($userLoginForm, 'login');
    echo $form->field($userLoginForm, 'password')->passwordInput();
    echo $form->field($userLoginForm, 'rememberMe')->checkbox();
    echo  Html::submitButton('Вход на сайт',[
        'class' => 'btn btn-danger'
    ]);
?>
<?php ActiveForm::end(); ?>
    </div>
</div>

