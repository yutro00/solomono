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
    
    
    public static function setConnection($params)
    {
        try {
            self::$connection = new mysqli(
                $params['host'], 
                $params['user'], 
                $params['psw'], 
                $params['dbname']);
        } catch (Exception $exc) {
            self::$connection = null;
        echo '<div>'
            . '<b>Oшибка при соединении с БД.</b><br>'
            . 'Проверьте наличие БД и параметры подключения в файле config.ini. '
            . 'При отсутствии БД запустите скрипт db.sql из папки app/backup.'
            . ' <br>Читайте readme.'
            . '<br></div>';
            echo $exc->getTraceAsString();
        }
    }
    
    
    public function __construct($params)
    {
        $this->connection = new mysqli(
                $params['host'], 
                $params['user'], 
                $params['psw'], 
                $params['dbname']);
    }

    
    public static function getConnection() 
    {
        return self::$connection;
    }
}
