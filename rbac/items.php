<?php
return [
    'user' => [
        'type' => 1,
        'description' => 'Пользователь',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'children' => [
            'user',
            'adminPanel',
        ],
    ],
    'adminPanel' => [
        'type' => 2,
        'description' => 'Панель администратора',
    ],
];
