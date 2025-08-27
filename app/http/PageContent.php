<?php

/*
 * Project Solomono test
 * Объект формирования содержимого тега body HTML страницы
 */

require '/var/www/html/solomono/app/http/Sidebar.php';
require '/var/www/html/solomono/app/http/ContentHeader.php';
require '/var/www/html/solomono/app/http/ContentMain.php';


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
    
//private $content;
    private $contentHeader;     //шапка основного контента
    private $contentMain;       //основной контент страницы (тег MAIN)
    
    
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
        }
        if ($this->conf['sidebar_left']) {
            $sidebarCfg = [];
            $sidebarCfg['sidebar'] = 'left';
            $sidebarCfg['width'] = '33%';
            $this->sidebar = self::createContentObject('sidebar', $sidebarCfg);
        }
        $this->contentHeader = self::createContentObject('content_header');
        $this->contentMain = self::createContentObject('content_main');
    }

    
    /**
     * по входной строке возвращает нужный объект
     * @param String $key - строка, по которой выбирают, какой объект возвращать
     * @param Array $param - массив параметров конструктора создаваемого объекта
     * @return Object
     */
    public static function createContentObject($key, $param = null)
    {
        $res;
        switch ($key) {
            case 'sidebar' :
                $res = new Sidebar($param);
                break;
            case 'content_header' :
                $res = new ContentHeader();
                break;
            case 'content_main' :
                $res = new ContentMain();
                break;
        }
        return $res;
    }



    public function getSidebar()
    {
        $res = '';
        $res .= $this->sidebar->getSidebar();
        return $res;
    }


    /**
     * возвращает html строку с основным контентом страницы
     * @return String
     */
    public function getContent($data) 
    {
        $res = '';
        $res .= "\n";
        
        if ($this->conf['sidebar_left'] ) {
            $cfg = [
                'sidebar' => 'left',
                'width' => '33%',
            ];
            $sidebar_left = $this->sidebar->getSidebar($data['sidebar_data']);
            $res .= $sidebar_left;
        }
        
//        $res .= $sidebar_left;

//        $content_main = $this->getContentMain($cfg, $data['content_data']);
        $content_main = $this->getContentMain($data['content_main']);
        $res .= $content_main;

        return $res;
    }
   
    
    private function getSidebarRight($param, $data) 
    {
        
    }
    
    
    private function getSidebarTwo($param, $data) 
    {
        
    }
    
    /**
     * возвращает html строку c содержимым тега MAIN
     * @param type $data - данные для заполнения основного контента
     * @return string
     */
    private function getContentMain($data) 
    {
        $res = "\n\n" . '<main class="main">';
        
        $res .= $this->contentHeader->getHeader();
        $res .= $this->contentMain->getContentMain($data);        
        
        $res .= "\n</main>";
        
        return $res;
    }
    
}
