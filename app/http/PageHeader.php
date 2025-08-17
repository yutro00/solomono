<?php

/*
 * Project Solomono test
 * Объект формирования шапки контента страницы
 */

$res = require '/var/www/html/solomono/app/http/PageHeader1.php';
$res1 = require '/var/www/html/solomono/app/http/PageHeader2.php';

/**
 * Description of JPageHeader
 *
 * @author yuriy
 */
class PageHeader 
{
    private $confDefault = [
        'user_role' => 'guest',
        'page_type' => 'index',
        'header1' => true,
        'header2' => true,
    ];
    private $conf;
    
    private $header1 = null;
    private $header2 = null;

    
    public function __construct($cfg)
    {
        if (isset($conf)) {
            $this->conf = $cfg;
        } else {
            $this->conf = $this->confDefault; 
        }
        if ($this->conf['header1'] <> '') {
            $this->header1 = new PageHeader1();
        }
        if ($this->conf['header2'] <> '') {
            $this->header2 = new PageHeader2();
        }
    }
    
    
//    private function getHeader() 
    /**
     * возвращает html строку шапки страницы
     * @return String
     */
    public function getHeader()
    {
        $res = '';
        
$res .= '<header class="header">';
        
        if ($this->conf['header1']) {   
            $res .=  $this->header1->getHeader();
        }
        
        if ($this->conf['header2']) {
            $res .=  $this->header2->getHeader();
        }
$res .= '</header>';        

        
        return $res;
    }
    
    
}

