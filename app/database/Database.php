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
        $conn = new mysqli(
                $params['host'], 
                $params['user'], 
                $params['psw'], 
                $params['dbname']);
        
        if ($conn  == false) {
            //write to log  mysqli_connect_error()
            self::$connection = null;
            echo '<div>'
            . '<b>Oшибка при соединении с БД.</b><br>'
            . 'Проверьте наличие БД и параметры подключения в файле config.ini. '
            . 'При отсутствии БД запустите скрипт db.sql из папки app/backup.'
            . ' <br>Читайте readme.'
            . '<br></div>';
        } else {
            self::$connection = $conn;
            
            if (!$conn->set_charset($params['charset'])) { // или "utf8mb4" для лучшей поддержки

            }
        }
    }

    
    public static function getConnection() 
    {
        return self::$connection;
    }
}
