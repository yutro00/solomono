<?php

/* 
 * Project Solomono test
 * Класс конфигурации проекта
 */

/**
 * Description of Config
 *
 * @author yuriy
 */
class Config
{
//    static private $file = '/var/www/html/solomono/app/config/config.ini';
    static private $file = './app/config/config.ini';
    static private $sections = ['app', 'database'];
    static private $conf;
    
    public function __construct($file)
    {
        $conf = parse_ini_file($file, true);
        if ($conf === false) {
            die("Файл конфигурации не найден.");
        }
    }
    
    
    static public function setConfig()
    {
        self::$conf = parse_ini_file(self::$file, true);
    }
    
    
    static public function getConfig()
    {
        return self::$conf;
    }            
}
