<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ContentMain
 *
 * @author yuriy
 */
class ContentMain
{
    
    
    public function getContentMain($data)
    {
        
        
//        $data = '<div class="product">'
//        . "\n<span class=\"img\">"
//        . '$productImage'
//        . '<span>'
//        . "\n</span>";
                
        $res = '';
        $res .= "\n\n" . '<section id = "goods" class="main-content">';
          $res .= $data;
        $res .= "\n</section>"  .  '<!-- .goods -->';
        return $res;
    }
}
