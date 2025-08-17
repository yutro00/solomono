<?php

/*
 * Project Solomono test
 * Объект формирования подвала страницы
 */

/**
 * Description of PageFooter
 *
 * @author yuriy
 */
class PageFooter 
{
    private $confDefault = [
        'page_type' => 'index',
        'user_role' => 'guest',
        'js_bottom' => ['test1.js']
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
     * возвращает html строку c заголовком документа
     * @return String
     */
    public function getFooter() 
    {
        $res;
        switch ($this->conf['page_type']) {
            case 'index':
                $res = $this->getFooterDefault($this->conf['js_bottom']);
                break;

            default:
                $res = $this->getFooterDefault($this->conf['js_bottom']);
                break;
        }
        return $res;
    }
   
    /**
     * возвращает html строку c подвалом контента
     * @return String
     */
    public function getFooterDefault($arr) 
    {
        $res = '';
        $script_link = '';
        if (count($arr) > 0) {
            for ($i = 0; $i < count($arr); $i++) {
                $script_link .= "<script src=\"/app/views/js/$arr[$i]\"></script>\n";
            }
        }
        
        $res .= "<footer class=\"footer\">\n"
                . "<div class=\"subfooter\">\n"
                . "It is the first layer of footer\n"
                . "</div>\n";
        
        $res .= "<div class=\"subfooter\">\n"
                . "It is the second layer of footer\n"
                . "</div>\n";
        $res .= '</footer>';
        return $res;
    }
    
}
