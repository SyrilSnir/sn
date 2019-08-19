<?php 
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\core\helpers\Menu\NavMenuHelper;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head(); ?>
    </head>
    <body>
<?php $this->beginBody(); ?>
<?php
    NavBar::begin([
        'brandLabel' => 'Экспертная CRM v0.0',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top'
        ]
    ]); 

    echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => NavMenuHelper::getMenu() 
                ]);
        NavBar::end();
?>        
        <div class="container" style="margin-top: 70px">          	
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
            <?php endif;?>            
        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
            
    </div>
            <?php endif;?>
<?=$content ?>
        </div>
<?php $this->endBody(); ?>        
    </body>
<?php $this->endPage(); ?>
</html>