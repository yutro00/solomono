<?php

/*
 * Project Solomono test
 * Класс взаимодействия с таблицей Goods
 */

require_once './app/database/models/IModel.php';

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
        'goods_default' => 'Select * FROM goods WHERE category_id = 1 order by name LIMIT 20',
        
//'goods' =>
//'SELECT goods.*, image.path as path, image.name as file
//FROM goods, image 
//WHERE category_id = %s AND image.goods_id = goods.id 
//ORDER by name 
//LIMIT 10',

'goods' =>
'SELECT goods.*, image.path as path, image.name as file
FROM goods
LEFT JOIN image
ON goods.id = image.goods_id
WHERE category_id = %s
ORDER by %s
LIMIT %s',
        
        
        
        'goods_alphabet' => 'Select * FROM goods WHERE category_id = 4 LIMIT 20',
        'goods_rating' => 'Select * FROM goods WHERE category_id = 4 LIMIT 20',
        'goods_priceinc' => '',
        'goods_pricedec' => '',
        'goods_newest' => '',
    ];
//OFFSET · DISTINCT 

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
    
    
    public function getRecordData($number)
    {
        if ($number === '0') {
            $str = 'first';
            $sql = $this->getSql($str);
        }
        $res = $this->read($sql);
        return $res;
    }


    public function read($sql) 
    {
        $res;
            $result = $this->connection->query($sql);
        
        if ($result === false) {
            die("Query failed: " . $this->connection->error);
        }
        $res = $this->fetchAll($result);
        return $res;
    }
    
    
    public function update($sql) 
    {
        
    }
    
    public function delete($id)
    {
        
    }
    
    
    public function getSql($str, $params = null)
    {
        $res;
        if (is_null($params)) {
            $res = $this->sql[$str];
        } else {
            $res = $this->getSqlWithParam($str, $params);
        }
        return $res;
    }
    
    
    private function getSqlWithParam($sqlStr, $params)
    {
        
    }




    public function fetchAll($result)
    {
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
        
    }
    
    
    
    public function getGoodsByCategoryDefaultArr($catId)
    {
        $sql = $this->getSql('goods_default');
        $res = $this->read($sql);
        return $res;
    }
    
    
    public function getGoodsByCategoryStr($arr)
    {
//        $res = '';
        if (count($arr) === 0 ) {
            return 'Category is empty';
        }
$sum = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $id = $arr[$i]['id'];
            $img = $this->getImgLink($arr[$i]['path'], $arr[$i]['file']);
            $name = $arr[$i]['name'];
            $price = $arr[$i]['price'];
            if ($arr[$i]['currency'] === 'us') {
                $currency = '$';
            } else {
                $currency = '';
            }
            $count = $arr[$i]['count'];
$sum = $sum + $count;
            $description = $arr[$i]['description'];
            
            
            $productCard[$i] = include '/var/www/html/solomono/app/views/templates/productCardTempl.php';
        }
        $res = '';
        if (count($productCard) > 0) {
            for ($j = 0; $j < count($productCard); $j++) {
                $res .= $productCard[$j];
            }
        }
        return $res;
    }
    
    
    public function getGoodsByCategoryArr($param)
    {

        $str = $this->getSql('goods');
        
        $sql = sprintf($str, $param['cat'], $param['order'], $param['limit']);
        $res = $this->read($sql);
        
        return $res;
    }
    
    
    function getImgLink($path, $name)
    {
        if (is_null($path)) {
            $path = '/app/resources/image/';
        }
        if (is_null($name)) {
            $name = 'dog-sorry.jpg';
        }
        $res = $path . $name;
        return $res;
    }
    
}
