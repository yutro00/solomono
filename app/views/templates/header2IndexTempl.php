<?php

/*
 * Project Solomono test
 * Шаблон 2-го уровня шапки индексного файла
 */


$res = '<div class="header2">';
$res .= '<picture>'
        . '<img src="/app/resources/image/logo-dan.webp" width="105" height="35">'
        . '</picture>';
        
$res .= '<form name="search" action="/" method="get" class="form-search">'
                . '<input type="txt" class="input-search" placeholder="Seach">'
                . '<input type="button" value="Go!">'
                . ''
                . '</form>';
        
$res .= '<div id="cart" class="cart">'
                . '<img class="cart-img" src="/app/resources/image/cart48.png">'
                . '</div>';
$res .= "\n</div>";

return $res;
    
