<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of PageHeader1
 *
 * @author yuriy
 */
class PageHeader1 
{
    public function getHeader()
    {
        $res = '<div class="header1">';
        $res .= "\nIt is the header1 string";
        $res .= "\n</div>";
        return $res;
    }
    
}
