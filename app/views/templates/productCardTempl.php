<?php

/*
 * Project Solomono test
 * HTML шаблон карточки товара
 */


$res =
"\n<div id=\"prod_{$id}\" class=\"product\">"
        . "\n<span class=\"img\">"
        . 'productImage'
        . "\n</span>"
        
        . "\n<span class=\"product-price\">"
        . "\n"
        . "{$currency}{$price} "
        . "\n</span>"
        
        . "\n<span class=\"bt-buy\">"
        . "<input type=\"button\" data-product-id=\"prod_{$id}\" value=\"Buy\">"
        . "</span>"
        
//        . "\n<span id=\"prod_{$id}\" class=\"product-name\">""
        . "\n<span class=\"product-name\">"
        . "\n {$name}"
        . "\n</span>"
        
        . "\n<span class=\"product-descr\">"
        . "\n {$description}"
        . "\n</span>"
. "\n</div>";
        
        
        
        
//"\n<div class=\"product\">"
//        . "\n<span class=\"img\">"
//        . 'productImage'
//        . "\n</span>"
//        
//        . "\n<span class=\"product-price\">"
////        . "$85.00 "
//        . "\n %s "
//        . "\n</span>"
//        
//        . "\n<span class=\"bt-buy\">"
//        . '<input type="button" value="Buy">'
//        . "</span>"
//        
//        . "\n<span class=\"product-name\">"
//        . 'Goods name'
//        . "\n %s "
//        . "\n</span>"
//. "\n</div>";

return $res;