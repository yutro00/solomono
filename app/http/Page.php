<?php

/*
 * Project Solomono test
 * Объект формирования HTML страниц
 */

require './app/http/APage.php';
include './app/http/IPage.php'; 
require './app/http/PageHead.php';
require './app/http/Body.php';

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
//        'header3' => true,
        'basket' => '',
        'category_count' => '8',    //число пунктов в строке категорий, не более
    ];
    
    private $conf;
    
    private $bodyObj;   //объект, содержащий составляющие(header,content,sidebar etc)

    
    private $head;                  //html строка с заголовком документа
    
    private $footer;                //html строка с подвалом документа
    
    private $body;                  //html контент


    function __construct($role = 'guest')
    {
        $this->conf = $this->confDefault;
        $this->iniPage();
    }
    
    
    public function iniPage() 
    {
        $role = $this->getUserRole();
        if ($role === 'guest') {
            $this->conf = $this->confDefault;
            $head = new PageHead();
            $this->head = $head->getHead();
            
            $this->bodyObj = new Body($this->conf);

//            $this->footer = $this->getBodyObj->getFooter();
        }
    }
  
    /**
     * возвращает строку с началом документа (head && header)
     * @return string
     */
    public function getPageBeginning()
    {
        $res = $this->startDocument();
        $res .= $this->getHead();
        
        $res .= "\n\n<body>";
        $res .= $this->getHeader();
        $res .= "\n\n";

        return $res;
    }
    
    public function getUserRole()
    {
        return $this->conf['user_role'];
    }
    
      
    public function setUserRole($role) {
        $res = false;
        if (in_array($role, $this->conf['user_role'])) {
            $this->conf['user_role'] = $role;
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }
    
    /**
     * открывает HTML Document (<!DOCTYPE html> ... )
     * @return type
     */
    public function startDocument()
    {
        $res = "<!DOCTYPE html>\n"
               . '<html lang="en">' . "\n";
        return $res;
    }
    
    /**
     * возвращает html строку с заголовком документа
     * @return String
     */
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
    
    
    public function getBodyObj()
    {
        return $this->bodyObj;
    }
    
    
    public function getHeader()
    {
        return $this->bodyObj->getHeader();
    }
    
    
    public function getBody($arr)
    {
        //здесь доп. контент, если надо
        $res = $this->getContent($arr);
        return $res;
    }
    
    public function getContent($arr)
    {
        $res = $this->bodyObj->getContent($arr);
        return $res;
    }
    
    /**
     * реализация интерфейса setBody($obj)
     * @param type $obj
     */
    public function setBody($obj)
    {
        
    }
    
    /**
     * возвращает футер, если он нужен в составе основного контента   
     * @return null
     */
    public function getFooter() 
    {
        $res; 
        if (isset($this->bodyObj)) {
            $res = $this->bodyObj->getFooter();
        } else {
            $res = null;
        }
        return $res;
    }
    
    
    public function setFooter($str) {
        $res = null;
        if ($this->conf['user_role'] === 'admin') {
            
        }
        if (is_string($str)) {
            $this->footer = $str;
        } else {
            $res = true;
        }
        return $res;
    }
    
    
    
    public function getAddition()
    {
            $res = $res = $this->bodyObj->getAddition();
        return $res;
    }

}
