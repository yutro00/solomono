<?php

/*
 * Project Solomono test
 * Объект формирования шапки страницы
 */

/**
 * Description of JPageHeader
 *
 * @author yuriy
 */
class PageHeader 
{
//    private $confDefault = [
//        'user_role' => 'guest',
//        'page_type' => 'index',
//        'header1' => true,
//        'header2' => true,
//        'header3' => true,
//        'basket' => '',
//        'category_count' => '8',    //число пунктов в строке категорий
//    ];
    private $confDefault = [
        'user_role' => 'guest',
        'page_type' => 'index',
    ];
    private $conf;
    
    public $header1;
    public $header2;
    public $header3;


    
    public function __construct($config)
    {
        if (isset($conf)) {
            $this->conf = $config;
        } else {
            $this->conf = $this->confDefault; 
        }
        
    }
    
    
    


    public function getHeader1() {
        
    }
    
}

