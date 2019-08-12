<?php

namespace app\helpers;

use Yii;
/**
 * Description of NavMenuHelper
 *
 * @author kotov
 */
class NavMenuHelper
{
    public static function getMenu()
    {
        if (Yii::$app->user->isGuest) {
            $menu = [
                ['label' => 'Регистрация' , 'url' => ['/register']],
                ['label' => 'Вход' , 'url' => ['/login']],
            ];
        } else {
            $menu = [
                    ['label' => Yii::$app->user->getIdentity()->name],                
            ];
            if (Yii::$app->user->can('adminPanel')) {
                $menu[]= ['label' => 'Панель администратора' , 'url' => ['/adminka']];
            }
            $menu[]= ['label' => 'Выход' , 'url' => ['/logout']];
        }
        return $menu;
    }
}
