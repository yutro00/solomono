<?php

/*
 * Project Solomono test
 * Объект формирования шапки контента страницы
 */

require_once './app/http/PageHeader1.php';
require_once './app/http/PageHeader2.php';
require_once './app/http/PageHeader3.php';

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
        'header3' => true,
    ];
    private $conf;
    
    private $header1 = null;
    private $header2 = null;
    private $header3 = null;

    
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
        if ($this->conf['header3'] <> '') {
            $this->header3 = new PageHeader3();
        }
    }
    
    
//    private function getHeader() 
    /**
     * возвращает html строку шапки страницы
     * @return String
     */
    public function getHeader()
    {
        $res = "\n";
        
        $res .= '<header class="header">';
        
        if ($this->conf['header1']) {
            $res .=  "\n";
            $res .=  $this->header1->getHeader();
        }
        
        if ($this->conf['header2']) {
            $res .=  $this->header2->getHeader();
        }
        if ($this->conf['header3']) {
            $res .=  $this->header3->getHeader();
        }
        $res .= "\n" . '</header>';

        
        return $res;
    }
    
    
}

