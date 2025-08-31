<?php

/*
 * Project Solomono test
 * Объект формирования тега body HTML страницы
 */

require './app/http/PageHeader.php';
require './app/http/PageContent.php';
require './app/http/PageFooter.php';
include './app/http/PageAddition.php';


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

    private $addition;


    public function __construct($cfg) 
    {
        $this->conf = $cfg;
        $this->header = self::createBodyObject('page-header', $cfg);
        $this->content = self::createBodyObject('page-content');
        $this->footer = new PageFooter();
        $this->addition = new PageAddition();
    }
    
    
    
    public static function createBodyObject($key, $param = null)
    {
        $res;
        switch ($key) {
            case 'page-header' :
                if (is_null($param)) {
                    $res = new PageHeader();
                } else {
                    $res = new PageHeader($param);
                }
                break;
            case 'page-content' :
                if (is_null($param)) {
                    $res = new PageContent();
                } else {
                    $res = new PageContent($param);
                }
                break;
            case 'page-footer' :
                if (is_null($param)) {
                    $res = new PageFooter();
                } else {
                    $res = new PageFooter($param);
                }
                break;
            case 'page-addition' :
                if (is_null($param)) {
                    $res = new PageAddition();
                } else {
                    $res = new PageAddition($param);
                }
                break;
        }
        return $res;
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
    
    
    /** возвращает доп. ресурсы, если таковые есть в объекте
     * 
     * @return type
     */
    public function getAddition() 
    {
        if (isset($this->addition)) {
            $res = $this->addition->getAddition();
        }
        return $res;
    }
    
}
