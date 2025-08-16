<?php

/*
 * Project Solomono test
 * Объект формирования HTML страниц
 */

//namespace app\http;
//
//use app\http\APage;

$res = require '/var/www/html/solomono/app/http/APage.php';
$res1 = include '/var/www/html/solomono/app/http/IPage.php'; 
$res2 = require '/var/www/html/solomono/app/http/PageHead.php';

/**
 * Формирует данные для представления http страницы
 *
 * @author yuriy
 */
class Page extends APage implements IPage
{   
    /**
     * конфигурация страницы по умолчанию
     * @var Array
     */
    private $confDefault = [
        'user_role' => 'guest',
        'page_type' => 'index',
        'header1' => true,
        'header2' => true,
        'header3' => true,
        'basket' => '',
        'category_count' => '8',    //число пунктов в строке категорий, не более
    ];
    
     
    private $userRole = 'guest';

    private $head;                  //html строка с заголовком документа
    private $footer;                //html строка с подвалом документа
    private $body;                  //html контент
    private $pageConfig;

    function __construct($role = 'guest')
    {
        $this->userRole = $role;
        $this->iniPage();
    }
    
    
//    static public function getUserRoles() 
//    {
//        return self::$userRoles;
//    }
    
    
    public function iniPage() 
    {
        $head = new PageHead();
        $this->head = $head->getHead();
    }
    
    public function getUserRole() 
    {
        return $this->userRole;
    }
    
      
    public function setUserRole($role) {
        $res = false;
        if (in_array($role, $this->userRoles)) {
            $this->userRole = $role;
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }
    
    
    public function getHead() {
        return $this->head;
    }
    
    
    public function setHead($obj) {
        $res = null;
        if (is_object($obj)) {
            $this->head = $obj;
        } else {
            $res = true;
        }
        return $res;
    }
    
    
    public function getBody($obj)
    {
        
    }
    
    public function setBody($obj)
    {
        
    }
    
    public function getFooter() {
        return $this->footer;
    }
    
    
    public function setFooter($obj) {
        $res = null;
        if (is_object($obj)) {
            $this->footer = $obj;
        } else {
            $res = true;
        }
        return $res;
    }
    

    

}
