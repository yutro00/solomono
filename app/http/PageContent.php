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
    
    /**
     * возвращает html строку с левым сайдбаром
     * @param Array $param - массив с конфигурацией сайдбара
     * @param String $catData - UL html строка с категориями товара
     * @return string
     */
    private function getSidebarLeft($param, $catDataStr) 
    {
        $res = '<aside class="sidebar-left">';
        $res .= $this->getCategoryLeft($catDataStr);
        
        
$filterDataStr = '<div>Filter1 html contcainer</div>'       //Временно!!! Как пример
        . '<div>Filter2  html contcainer</div>'
        . '</div>';
        $res .= $this->getFilterLeft($filterDataStr);
        
        
        $res .= '</aside>';
        return $res;
    }
    
    /**
     * возвращает html DIV с содержимым $str 
     * @param Str $str - строка категорий товара
     * @return string
     */
    public function getCategoryLeft($str)
    {
        $res = '<div class=category-wrap>';
        $res .=  $str;
        $res .= '</div>';
        return $res;
    }


    public function getFilterLeft($str)
    {
        $res = '<div class=filter-wrap>';
        $res .=  $str;
        $res .= '</div>';
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
