<?php

/*
 * Project Solomono test
 * Шаблон 3-го уровня шапки индексного файла
 */

$noLink = 'javascript:void(0)';

$res = "\n" . '<div class="header3">';
$res .= "\n" . '<ul id="sb_navbar" class="navbar">'
                . "\n<li>"
                . "<a href=\"$noLink\">Item1</a>"
                . "\n</li>"
                . "\n<li>"
                . "<a href=\"$noLink\">Item2</a>"
                . '</li>'
                . "\n<li>"
                . "<a href=\"$noLink\">Item3</a>"
                . '</li>'
                . "\n<li>"
                . "<a href=\"$noLink\">Item4</a>"
                . '</li>'
                . "\n<li>"
                . "<a href=\"$noLink\">Item5</a>"
                . "\n<li>"
                .  "\n" 
                . '</ul>';
$res .= "\n</div>";
    
return $res;

