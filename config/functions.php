<?php

use yii\helpers\VarDumper;

/**
 * Обертка для Yii2 VarDumper
 * @param mixed $var Отображаемая переменная
 * @param int $depth Максимальная глубина вложенности при выводе 
 * объекта или массива
 * @param bool $highlight Использовать стилевую подсветку (по умолчанию ДА)
 */
function dump($var,$depth = 15, $highlight = true) 
{
    VarDumper::dump($var,$depth,$highlight);
}

