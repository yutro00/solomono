<?php

/*
 * Project Solomono test
 * Класс представления карточки товара
 */

/**
 * Description of Product
 *
 * @author yuriy
 */
class Product 
{
    
    
    public function getProductTemplate()
    {
//        $res = ''
//        . "\n<div class=\"product\">"
//        . "\n<span class=\"img\">"
//        . 'productImage'
//        . "\n</span>"
//        . "\n<span class=\"price\">"
//        . "$85.00 "
//        . "\n</span>"
//        . "\n<span class=\"bt-buy\">"
//        . '<input type="button" value="Buy">'
//        . "</span>"
//        . "\n</div>"
//                . '';
        
        $res = include '/var/www/html/solomono/app/views/templates/productCardTempl.php';
        return $res;
        
        
    }
    
}
