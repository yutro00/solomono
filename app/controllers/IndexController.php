<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Контроллер индексной страницы сайта
 *
 * @author yuriy
 */
class IndexController {
    
    public $root = '/var/www/html/solomono/';


    public function index() {
        
        $res = "<!DOCTYPE html>\n"
                . '<html lang="en">' . "\n";
        $res .= include $this->root .'app/views/css/style.css';
        $res .= '<h3 class="center green">It is solomono test project home page!</h3>';
        echo $res;
        
    }
}
