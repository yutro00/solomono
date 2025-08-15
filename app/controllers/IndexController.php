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
        
//        $roles = Page::get_user_roles();
        
        $header = $this->get_header();
        $res .= $header;
        
        $title = '<h3 class="center green">It is solomono test project home page!</h3>';
        $content_param = [];
        $content_param[] = $title;
        $content_param[] = $this->get_js_str();
        $content = $this->get_content($content_param);
        $body = $this->get_body($content);
        
        $res .= $body;
        echo $res;
        
        return ;
    }
    
    
    public function getStyle()
    {
        $res = include '/var/www/html/solomono/app/views/css/style.css';
        echo $res;
    }
    
    public function get_header()
    {
        $res = '';
        
        $script = '';       //загрузка js в хедере
        if ($script <> '') {
            $script_link = "<script src=\"$script\"></script>";
        } else {
            $script_link = '';
        }
    
            
    $res .= '<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8 X-Content-Type-Options=nosniff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Solomono test</title>
        <meta name="Description" Content="Сайт тестового задания претендента">
        <meta name="robots" content="noindex, nofollow" >
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/app/views/css/style.css">
        ' . "$script_link\n"  
        . '</head>';
        return $res;
    }
    
    /**
     * формирует контент страницы
     * @param array $arr - массив параметров контента
     * @return String
     */
    public function get_content($arr = []) 
    {
        $res = '';
        if (count($arr) > 0) {
            for ($i = 0; $i < count($arr);$i++) {
                $res .= $arr[$i];
            }
            //доп. обработка контентa
        }
        return $res;
    }
    
    
    public function get_body($str)
    {
        $res = '<body>';
        $res .= $str;
        $script = $this->get_js_str();
        $res .= $script;
        $res .= '</body>';
        return $res;
    }
    
    
    public function get_js_str() 
    {
        $res = '<script src="#"></script>';
        return $res;
    }
    
}

