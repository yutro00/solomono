<?php

/*
 * Project Solomono test
 * Шаблон 3-го уровня шапки индексного файла
 */

$res = "\n" . '<div class="header3">';
$res .= "\n" . '<ul class="navbar">'
                . "\n<li>"
                . '<a href="#">Item1</a>'
                . "\n</li>"
                . "\n<li>"
                . '<a href="#">Item2&raquo;</a>'
                . '</li>'
                . "\n<li>"
                . '<a href="#">Item3</a>'
                . '</li>'
                . "\n<li>"
                . '<a href="#">Item4</a>'
                . '</li>'
                . "\n<li>"
                . '<a href="#">Item5</a>'
                . "\n<li>"
                .  "\n" 
                . '</ul>';
$res .= "\n</div>";
    
return $res;

