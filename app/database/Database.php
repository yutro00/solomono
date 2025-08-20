<?php

/* 
 * Project Solomono test
 * Класс базы данных
 */


//require_once '/var/www/html/solomono/app/config/Config.php';

/**
 * Description of Database
 *
 * @author yuriy
 */
class Database 
{      
    private $connection;
    
    
    public function __construct($params)
    {
        $this->connection = new mysqli(
                $params['host'], 
                $params['user'], 
                $params['psw'], 
                $params['dbname']);
    }
   
    
    public function getConnection() 
    {
        return $this->connection;      
    }
}
