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


$res = require '/var/www/html/solomono/app/http/Page.php';
$res1 = require '/var/www/html/solomono/app/database/Database.php';
$res2 = require '/var/www/html/solomono/app/database/models/CategoryModel.php';


/**
 * Контроллер индексной страницы сайта
 *
 * @author yuriy
 */
class IndexController 
{
    
    public function getDbConnection()
    {
        try {
            $db = new Database();
            $conn = $db->getConnection();
        } catch (Exception $exc) {
            $conn = null;
        echo '<div>'
            . '<b>Oшибка при соединении с БД.</b><br>'
            . 'Проверьте наличие БД и параметры подключения в файле config.ini. '
            . 'При отсутствии БД запустите скрипт db.sql из папки app/backup.'
            . ' <br>Читайте readme.'
            . '<br></div>';
            echo $exc->getTraceAsString();
        }   
        return $conn;
    }
    
    
    public function index() 
    {

        $res = "<!DOCTYPE html>\n"
                . '<html lang="en">' . "\n";
        
        $page = new Page('guest');
        $head = $page->getHead();
        $res .= $head;
        
        $res .= '<body>';
        
        $header = $page->getHeader();
        $res .= $header;
        
        $res .= '<div class="page-wrap">';
        
        $connect = $this->getDbConnection();
        $categoryModel = new CategoryModel($connect, 'category');
        $category = $categoryModel->getCategories();
//        $category = $categoryModel->getCategoriesAsUl();
        
        $bodyData = [
            'content_data' => 'It is the content data',
            'sidebar_data' => $category,
        ];
        $body = $page->getBody($bodyData);
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

