<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Config
 *
 * @author yuriy
 */
class Config
{
    static private $file = '/var/www/html/solomono/app/config/config.ini';
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
        $res = self::$conf;
        return $res;
        
//        if (isset($param)) {
//            $section = self::getSectionName($param);
//        } else {
//            $res = self::$conf;
//        }
//        return $res;
    }
    
    /**
     * не нужен !!!
     * @param S $key
     * @return Array
     */
    static private function getSections()
    {
//        $res = ['app', 'database'];
//        return $res;
    }
    
    /**
     * возвращает значение имя с или null, если не находит
     * @param Array $sections - массив секций 
     * @param Srting $key
     * @return String || null
     */
    static private function getSectionName($key)
    {
        $res = null;
        for ($i = 0; $i < count(self::$sections); $i++) {
            if (array_key_exists($key, self::$sections)) {
                $res = $sections[$i];
            }
        }
        return $res;
    }
            
}
