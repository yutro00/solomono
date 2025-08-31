<?php

/* 
 * Project Solomono test
 * Класс базы данных
 */


/**
 * Description of Database
 *
 * @author yuriy
 */
class Database 
{      
    private static $connection;

    private static $сonnectTips = '<div>'
            . '<b>Oшибка при соединении с БД.</b><br>'
            . 'Проверьте наличие БД в системе, параметры подключения в файле config.ini. '
            . '<br>' . 'При отсутствии БД запустите скрипт создания БД db.sql из папки app/backup.'
            . ' <br>Читайте readme.'
            . '<br></div>';

    public static function setConnection($params)
    {
        $conn = new mysqli(
            $params['host'],
            $params['user'], 
            $params['password'], 
            $params['dbname']
        );
        self::$connection = $conn;
        return self::$connection = $conn;
    }

    
    public static function getConnection() 
    {
        return self::$connection;
    }
    
    
    public static function getTips()
    {
        $res = self::$сonnectTips;
        return $res;
    }
    
    public static function getConnectionTrace()
    {
        return self::$errorTrace;
    }
}
