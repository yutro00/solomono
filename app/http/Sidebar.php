<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Sidebar
 *
 * @author yuriy
 */
class Sidebar 
{
        
    private $confDefault = [
        'sidebar' => 'left',
        'width' => '33%',
    ];

    private $conf;


    public function __construct($params = null) 
    {
        if (isset($params)) {
            $this->conf = $params;
        } else {
            $this->conf = $this->confDefault;
        }
        
        
    }
    
    
    public function getSidebar($data)
    {
        $res = '';
        if ($this->conf['sidebar'] === 'left') {
            $res = $this->getSidebarLeft($data);
        }
        if ($this->conf['sidebar'] === 'right') {
            $res .= $this->getSidebarRight($data);
        }
        if ($this->conf['sidebar_left'] && $this->conf['sidebar_right'] ) {
//            $cfg = [
//                
//            ];
            $res .= $this->getSidebarTwo($data);
        }
        return $res;
    }
    
    
    public function getSidebarLeft($data)
    {
        $res = "\n" . '<aside class="sidebar-left">';
        
        $res .=  "\n" . '<h3>Categories</h3>';
        $res .=  "\n" ;
        
        $res .= $this->getCategoryLeft($data);
        
        $filterDataStr = "\n<h3>Filters</h3>"
            . "<div>Filter1 html container</div>"    //Временно!!! Как пример

            . "<div>Filter2  html container</div>"
            . '';
        $res .= $this->getFilterLeft($filterDataStr);
        
        
        $articleDataStr = "\n<h3>Articles</h3>"
                . "\n<div class=\"sb-article\">"                 //Временно!!! Как пример
                . 'Article 1 content'
                . "\n</div>"
                . "\n<div class=\"sb-article\">"
                . 'Article 2 content'
                . "\n</div>"
                .  "\n<div>"
                . "\n<div class=\"sb-article\">"
                . 'Article 3 content'
                . "\n</div>"
                ;

        $res .= $this->getArticleLeft($articleDataStr);
        
        
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
    
    public function getArticleLeft($str)
    {
        $res = "\n" .'<sectin class=article-wrap>';
        $res .=  $str;
        $res .= "\n" . '</sectin>';
        return $res;
    }
    
    
    
    public function getSidebarRight($data)
    {
        
    }
    
    
    public function getSidebarTwo($data)
    {
        
    }
    
}
