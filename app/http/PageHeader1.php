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
        $res = include './app/views/templates/header1IndexTempl.php';
        return $res;
    }
    
}
