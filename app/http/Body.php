<?php

/*
 * Project Solomono test
 * Объект формирования тега body HTML страницы
 */

$res = require '/var/www/html/solomono/app/http/PageHeader.php';
$res1 = require '/var/www/html/solomono/app/http/PageContent.php';
$res2 = require '/var/www/html/solomono/app/http/PageFooter.php';


/**
 * Description of Body
 *
 * @author yuriy
 */
class Body 
{
    
    private $conf;
    
    private $header;
    
    private $content;
    
    private $footer;




    public function __construct($cfg) 
    {
        $this->conf = $cfg;
        $this->header = new PageHeader($cfg);
        $this->content = new PageContent();
        $this->footer = new PageFooter();
        
    }
    
    
    public function getHeader() 
    {
        return $this->header->getHeader();
    }
    
    
    public function getContent($arr) 
    {
        return $this->content->getContent($arr);
    }
    
    public function getFooter() 
    {
        return $this->footer->getFooter();
    }
    
}
