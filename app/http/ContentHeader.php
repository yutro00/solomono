<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ContentHeader
 *
 * @author yuriy
 */
class ContentHeader
{
    
    private $confDefault = [
        'header1' => true,
        'header2' => true,
        'header3' => true,
    ];

    private $conf;
    
    
    public function __construct($param = null)
    {
        if (is_null($param)) {
            $this->conf = $this->confDefault;
        } else {
            $this->conf = $param;
        }
    }
    
    
    public function getHeader()
    {
        $res = '';
        $res .= '<section class="main-header">  <!-- content-header -->';
                
        if ($this->conf['header1'])
        {
            $res .= $this->header1();
        }
        if ($this->conf['header2'])
        {
            $res .= $this->header2();
        }
        if ($this->conf['header3'])
        {
            $res .= $this->header3();
        }
        $res .= "\n</section>"  . '<!-- .main-header -->';
        
        return $res;
    }
    
    
    public function header1()
    {
//        $res = "\n\n" . '<main class="main">';
//        
//        $res .= "\n" . '<section class="main-header">  <!-- content-header -->';
        $res .= "\n" . '<div class="content-breadscrumb">';
        $res .= 'It is » breadscrumb';
        $res .= "\n</div>";
        return $res;
    }
    
    
    public function header2()
    {
        $res = "\n" . '<h2 id="category_name" class="category-head">&nbsp;</h2>';
        return $res;
    }
    
    
    public function header3()
    {
        $res .= "\n" . '<div class="goods-options">';
        
        $res .= "\n <span class=\"goods-view\">Show";
        $res .=  "\n" . '<select id="goods_view">';
        $res .= '<option value="columns">as columns';
        $res .= '<option value="list">as list';
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
        return $res;
    }
    
}
