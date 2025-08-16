<?php

/*
 * Project Solomono test
 * Объект формирования заголовка документа
 */

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
        'js_head' => ['test.js', 'test1.js'],
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
                $res = $this->getHeadDefault();
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
//                $script_link .= "<script src=\"$arr[$i]\"></script>\n";
            }
        }
        
        $res .= '<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8 X-Content-Type-Options=nosniff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Solomono test</title>
        <meta name="Description" Content="Сайт тестового задания претендента">
        <meta name="robots" content="noindex, nofollow" >
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/app/views/css/style.css">
        ' . "$script_link\n"
        . '</head>';
        return $res;
    }
    
}
