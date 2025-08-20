<?php

/*
 * Project Solomono test
 * Шаблон 3-го уровня шапки индексного файла
 */

$res = '<div class="header3">';
$res .= '<ul class="navbar">'
                . '<li>'
                . '<a href="#">Item1</a>'
                . '</li>'
                . '<li>'
                . '<a href="#">Item2&raquo;</a>'
                . '</li>'
                . '<li>'
                . '<a href="#">Item3</a>'
                . '</li>'
                . '<li>'
                . '<a href="#">Item4</a>'
                . '</li>'
                . '<li>'
                . '<a href="#">Item5</a>'
                . '</li>'
                . '</ul>';
$res .= "\n</div>";
    
return $res;

