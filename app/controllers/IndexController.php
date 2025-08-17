<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

//namespace app\controllers;

//$res1 = require '/var/www/html/solomono/app/http/Page.php';

//require_once $domain_root . '/app/views/templates/header.php';
//$res = require_once 'constants.php';
//echo '<br> var $domain_root = ' . $domain_root . '<br>';

$resPage = require '/var/www/html/solomono/app/http/Page.php';

//use app\http\Page;

/**
 * Контроллер индексной страницы сайта
 *
 * @author yuriy
 */
class IndexController 
{
    
    public function index() 
    {

        $res = "<!DOCTYPE html>\n"
                . '<html lang="en">' . "\n";
        
        $page = new Page('guest');
        $head = $page->getHead();
        $res .= $head;
        
        $res .= '<body>';
        $res .= '<div class="page-wrap">';
        
        $header = $page->getHeader();
        $res .= $header;
        
        
$bodyParam = [
    'sidebar_data' => 'It is the sidebar data',
    'content_data' => 'It is the content data',
];
        $body = $page->getBody($bodyParam);
        $res .= $body;
        
        $res .= '</div>     <!-- page-wrap -->';
       
        $footer = $page->getFooter();
        $res .= $footer;

        $res .= '</body>';
        $res .= '</html>';       
               
        echo $res; 
        return ;
    }

}

