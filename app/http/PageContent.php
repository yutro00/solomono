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
     * возвращает html строку с основным контентом страницы
     * @return String
     */
    public function getContent($data) 
    {
        $res = '';
        $res .= "\n";
//        $res .= '<main class="main">';
        
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

        
//        $res .= "\n\n\n\n</div>";
//        $res .= "\n</main>";
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
        $res = "\n" . '<aside class="sidebar-left">';
        $res .= $this->getCategoryLeft($catDataStr);
        
        
$filterDataStr = "\n<div>Filter1 html container</div>"       //Временно!!! Как пример
        . "<div>Filter2  html contcainer</div>"
        . '';
//        . '</div>';
        $res .= $this->getFilterLeft($filterDataStr);
        
        
        $res .= "\n" . '</aside>';
        return $res;
    }
    
    /**
     * возвращает html DIV с содержимым $str 
     * @param Str $str - строка категорий товара
     * @return string
     */
    public function getCategoryLeft($str)
    {   
        $res = "\n";
        $res .= '<section class=category-wrap>';
        $res .=  $str;
        $res .= "\n" . '</section>';
        return $res;
    }


    public function getFilterLeft($str)
    {
        $res = "\n" .'<sectin class=filter-wrap>';
        $res .=  $str;
        $res .= "\n" . '</sectin>';
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
//        $res = "\n\n" . '<div class="content-main">';
        $res = "\n\n" . '<main class="main">';
        
        $res .= "\n" . '<section class="main-header">  <!-- content-header -->';
        
        $res .= "\n" . '<div class="content-breadscrumb">';
          $res .= 'It is » breadscrumb';
        $res .= "\n</div>";
        
        $res .= "\n" . '<h2 id="category_name" class="category-head">&nbsp;</h2>';
        
        $res .= "\n" . '<div class="goods-options">';
        
        $res .= "\n <span class=\"goods-view\">Show";
        $res .=  "\n" . '<select id="goods_view">';
        $res .= '<option value="columns">by columns';
        $res .= '<option value="list">by list';
        $res .= "\n" . '</select>';
        $res .= "\n</span>";
                                        
        $res .= "\n <span class=\"goods-limit\">Per page";
        $res .= "\n" . '<select id="goods_limit">';
        $res .= '<option value="10">10';
        $res .= '<option value="20">20';
        $res .= '<option value="50">50';
        $res .= '<option value="100">100';
        $res .= "\n" . '</select>';
        $res .= "\n</span>";
        
        $res .= "\n <span class=\"goods-order\">Order";
        $res .= "\n" . '<select id="goods_order">';
        $res .= '<option value="alphabet">Alphabetically';
        $res .= '<option value="rate">Best rated';
        $res .= '<option value="price&uarr;">Price &uarr;';
        $res .= '<option value="price&darr">Price &darr;';
        $res .= '<option value="newesst">Newest';
        $res .= "\n" . '</select>';
        $res .= "\n</span>";

        $res .= "\n</div>"  .  '<!-- .goods-options -->';
        
        $res .= "\n</section>"  . '<!-- .main-header -->';

//        $res .= "\n\n" . '<section id = "goods" class="content-main">';
        $res .= "\n\n" . '<section id = "goods" class="main-content">';
          $res .= $data;
        $res .= "\n</section>"  .  '<!-- .goods -->';
        
        $res .= "\n</main>";
        
        return $res;
    }
    
}
