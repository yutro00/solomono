<?php

/*
 * Project Solomono test
 * Объект формирования содержимого тега body HTML страницы
 */

require '/var/www/html/solomono/app/http/Sidebar.php';


/**
 * Description of PageContent
 *
 * @author yuriy
 */
class PageContent 
{
    
    private $confDefault = [
        'sidebar_left' => true,
        'sb_left_width' => '33%',
        'sidebar_right' => false,
    ];
    
    private $conf;
    
    private $sidebar;
    
    
    public function __construct($params = null) 
    {
        if (isset($params)) {
            $this->conf = $params;
        } else {
            $this->conf = $this->confDefault;
        }
        if ($this->conf['sidebar_left'] && $this->conf['sidebar_right']) {
            $sbConf = [];
            $this->sidebar = new Sidebar($sbConf);
        } else {
            $this->sidebar = new Sidebar();
        }
        
    }






    /**
     * возвращает html строку с контентом страницы
     * @return String
     */
    public function getContent($data) 
    {
        $res = '';
        
        $res .= '<main class="main">';
        $res .= '<div class="container">';
        if ($this->conf['sidebar_left'] && $this->conf['sidebar_right'] ) {
            $cfg = [
                
            ];
            $this->getSidebarTwo($cfg);
        }
        if ($this->conf['sidebar_left'] ) {
            $cfg = [
                'sidebar' => 'left',
                'width' => '33%',
                'sidebar_data'  => 'It is sidebar data',
                'content_data'  => 'It is sidebar data'
            ];
            $sidebar_left = $this->getSidebarLeft($cfg, $data['sidebar_data']);
        }
        if ($this->conf['sidebar_right'] ) {
            $cfg = [
                'sidebar' => 'right',
                'width' => '33%',
            ];
            $sidebar_right = $this->getSidebarRight($cfg);
        }
        
        $res .= $sidebar_left;

        $content_main = $this->getContentMain($cfg, $data['content_data']);
        $res .= $content_main;

        
        $res .= '</div>';
        $res .= '</main>';
        return $res;
    }
    
    
    private function getSidebarLeft($param, $data) 
    {
        $res = '<aside class="sidebar-left">'
        . $data
//        . "It is the sidebar<br>"
        . '</aside>';
        
        return $res;
    }
    
    
    private function getSidebarRight($param) 
    {
        
    }
    
    
    private function getSidebarTwo($param) 
    {
        
    }
    
    
    private function getContentMain($param, $data) 
    {
        $res = '<div class="content-main">';
        $res .= $data;
        $res .= '</div>';
        return $res;
    }
    
}
