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
        $res = include './app/views/templates/productCardTempl.php';
        return $res;
    }
    
}
