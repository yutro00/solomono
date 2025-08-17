<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of PageHeader2
 *
 * @author yuriy
 */
class PageHeader2 
{
    public function getHeader()
    {
        $res = '<div class="header1">';
        $res .= "\nIt is the header2 string";
        $res .= "\n</div>";
        return $res;
    }
}
