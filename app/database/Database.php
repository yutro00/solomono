<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */


/**
 * Description of Database
 *
 * @author yuriy
 */
class Database 
{
    private $cfg = '/var/www/html/solomono/app/config/config.ini';
    private $host = "localhost";
    private $dbname = "smtest_bd";
    private $user = "guest";
    private $psw = "";
    private $admin = "root";
    private $admin_psw = "root";
    
    
    private $connection;
    
    
    public function __construct()
    {
        
        $this->ini($this->cfg);
        
        $this->connection = new mysqli($this->host, $this->user, $this->psw, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    
    
    private function ini($cfg)
    {
        $conf = parse_ini_file($cfg, true);
        if ($conf === false) {
            die("Файл конфигурации не найден.");
        }
        
        $this->host = $conf['database']['host'];
        $this->dbname = $conf['database']['dbname'];
        $this->user = $conf['database']['user'];
        $this->psw = $conf['database']['password'];
    }
    
    
    public function getConnection() 
    {
        return $this->connection;       
    }
}
