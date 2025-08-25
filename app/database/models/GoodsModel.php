<?php

/*
 * Project Solomono test
 * Класс взаимодействия с таблицей Goods
 */

require_once '/var/www/html/solomono/app/database/models/IModel.php';

/**
 * Description of GoodsModel
 *
 * @author yuriy
 */
class GoodsModel implements IModel
{
    private $tableName = 'goods';
    
    private $connection;
    
    private $sql = [
        
    ];


    public function __construct($conn)
    {
        $this->connection = $conn;
    }
    
    
    private function getTableName($tableName) 
    {
        return $this->tableName;
    }
      
    /**
     * 
     * @param type $arr
     */
    public function create($arr) 
    {
        
    }
    
    
    public function read($sql) 
    {
        
    }
    
    
    public function update($sql) 
    {
        
    }
    
    public function delete($id)
    {
        
    }
    
    
    public function getSql($str) 
    {
        
    }
    
    
    public function fetchAll($result)
    {
        
    }
    
    
    
    public function getGoodsByCategory($catId)
    {
        
    }
    
    
}
