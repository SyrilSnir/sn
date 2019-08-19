<?php

namespace app\core\helpers\Menu;

/**
 * Description of AdminMenuHelper
 *
 * @author kotov
 */
class AdminMenuHelper implements MenuHelperInterface
{
    
    public static function getMenu(): array
    {
        return [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Пользователи и роли',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/adminka/user'],],
                            ['label' => 'Тип учетки', 'icon' => 'user-circle', 'url' => ['/adminka/user-type'],],
                        ],
                    ],
                    [
                        'label' => 'Новостной раздел',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Публикации', 'icon' => 'file-code-o', 'url' => ['/admin/news'],],
                            ['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['/admin/category'],],
                            ['label' => 'Метки', 'icon' => 'dashboard', 'url' => ['/admin/tags'],],
                        ],
                    ],
                    ['label' => 'Выход', 'icon' => 'sign-out', 'url' => ['/logout']]
                ],
            ];
    }

}
