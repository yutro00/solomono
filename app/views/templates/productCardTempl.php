<?php

/*
 * Project Solomono test
 * HTML шаблон карточки товара
 */


$res =
"\n<div id=\"prod_{$id}\" class=\"product\" data-order=\"{$order}\">"
        . "\n<span class=\"img\">"
//        . '<img src="/app/resources/image/computer2.jpeg">'
        . "<img src=\"{$img}\">"
        . "\n</span>"
        
        . "\n<span class=\"product-price\">"
//        . "\n"
        . "{$currency}{$price}"
        . '</span>'
        
        . "\n<span class=\"bt-buy\">"
        . "<input type=\"button\" data-product-id=\"prod_{$id}\" value=\"Buy\">"
        . "</span>"
        
        . "\n<span id=\"prod_quantity\" class=\"product-quantity\">"
        . "quantity: {$count}"
        . "\n</span>"

        . "\n<span id=\"prod_admission\" class=\"product-quantity\">"
        . "admission: {$admission}"
        . "\n</span>"
        
        . "\n<span class=\"product-name\">"
        . "\n {$name}"
        . "\n</span>"
        
        . "\n<span class=\"product-descr\">"
        . "\n {$description}"
        . "\n</span>"
. "\n</div>";

return $res;