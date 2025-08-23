<?php

/*
 * Project Solomono test
 * Объект формирования заголовка документа
 */

include '/var/www/html/solomono/app/views/templates/headIndexTempl.php';

/**
 * Description of PageHead
 *
 * @author yuriy
 */
class PageHead 
{
    private $confDefault = [
        'page_type' => 'index',
        'user_role' => 'guest',
        'js_head' => ['index.js'],
    ];
    
    private $conf;
    
    
    public function __construct($config = null)
    {
        if (isset($config)) {
            $this->conf = $config;
        } else {
            $this->conf = $this->confDefault; 
        }
        
    }
    
    /**
     * возвращает html строку заголовка документа
     * @return String
     */
    public function getHead() 
    {
        $res;
        switch ($this->conf['page_type']) {
            case 'index':
                $res = $this->getHeadDefault($this->conf['js_head']);
                break;

            default:
                $res = $this->getHeadDefault($this->conf['js_head']);
                break;
        }
        return $res;
    }
    
    /**
     * возвращает html строку заголовка документа по умолчанию
     * @return String
     */
    public function getHeadDefault($arr) 
    {
        $res = '';
        $script_link = '';
        if (count($arr) > 0) {
            for ($i = 0; $i < count($arr); $i++) {
                $script_link .= "<script src=\"/app/views/js/$arr[$i]\"></script>\n";
            }
        }
        $res .= getHeadIndexTemplate($script_link);
        return $res;
    }
    
}
