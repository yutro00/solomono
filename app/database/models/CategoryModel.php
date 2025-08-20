<?php

/*
 * Project Solomono test
 * 
 */

require '/var/www/html/solomono/app/database/models/IModel.php';

/**
 * Description of CategoryModel
 *
 * @author yuriy
 */
class CategoryModel implements IModel 
{
    private $tableName = 'category';
    
    private $connection;
    
    
    /** ПОКА не нужен!!!
     * не упорядоченный индексный массив с именами полей таблицы
     * @var Array
     */
    private $fieldsList = [];

    /**
     * Массив запросов к БД
     * @var type
     */
    private $sql = [
        
//SELECT column_name, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'имя_таблицы' AND table_schema = 'имя_базы_данных';

    
        'list' => "SELECT column_name FROM information_schema.COLUMNS WHERE table_name = 'category'",
//        'list' => 'SELECT column_name FROM information_schema.COLUMNS WHERE table_name = ' . $this->tableName,
        'create' => '',
        'read_all' => 'SELECT * FROM category',
        'read_cat' => 'SELECT id, name, description, parent_id FROM category WHERE active = 1 AND parent_id IS NULL',
        'read_subcat' => 'SELECT id, name, description, parent_id FROM category WHERE active = 1 AND parent_id IS NOT NULL',
        'update' => '',
        'delete' => '',
    ];
    
    



    public function __construct($conn, $tableName) 
    {
        $this->connection = $conn; 
        $this->tableName = $tableName;
//НЕ УДАЛЯТЬ!!!        $this->fieldsList = $this->getFieldsList($this->sql['list'], $this->tableName);   
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
    
    /**
     * возвращает результат чтения таблицы БД в виде массива записей
     * @param String $sql - строка sql запроса
     * @return Array
     */
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
    
    /**
     * по ключу возвращает строку sql запросов к таблице
     * @param String $str - ключ поиска запроса
     * @return String
     */
    public function getSql($str) 
    {
        return $this->sql[$str];
        
    }
    
    
    private function fetchAll($result) 
    {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
        
    }
    
    
    public function getCategories()
    {
        $catArr = $this->readCategories();
        $subcatArr = $this->readSubcategories();
        $arr = $this->assembleCategories($catArr, $subcatArr);

//        $res = $this->getCategoriesAsUl_1($arr);
        $res = $this->getUlTag($arr);
        return $res;
    }
    
    /**
     * возвращает массив записей действующих категорий
     * @return Array
     */
    public function readCategories() 
    {
        $sql = $this->getSql('read_cat');
        $arr = $this->read($sql);
        return $arr;
    }
    
    
    public function readSubCategories() 
    {
        $sql = $this->getSql('read_subcat');
        $arr = $this->read($sql);
        return $arr;
    }

    /**
     * объединяет два вх. массива категорий в 
     * один двумерный массив категорий
     * @param Array $cat - массив категорий
     * @param Array $subcat - массив подкатегорий
     */
    public function assembleCategories($cat, $subcat)
    {
        $res = $cat;
        for ($i = 0; $i < count($cat); $i++) {
            $subcategory = $this->checkSubcat($res[$i]['id'], $subcat);
            if (count($subcategory) > 0) {
                $res[$i]['sub_cat'] = $subcategory;
            }
        }
        return $res;
    }
    
    
    public function checkSubcat($catId, $subcat)
    {
        $res = [];
        for ($j = 0; $j < count($subcat); $j++) {
            if ($subcat[$j]['parent_id'] === $catId) {
                $res[] = $subcat[$j];
            }
        }
        return $res;
    }


    /**
     * возвращает тег UL со списком категорий
     * @param Array $arr - массив со списком категорий для отображения
     * @return String
     */
    public function getCategoriesAsUl()
    {
        $res = null;
$lang = 'en';       //ВРЕМЕННО!!!
        $arr = $this->readCategories();
        $arrLocal = $this->getLocalFields($arr);
        $res = $this->getUlTag($arrLocal);
        
        return $res;
    }
    
    public function getCategoriesAsUl_1($arr)
    {
        $res = $this->getUlTag($arr);
        return $res;
    }
    
    
    /** ПОКА НЕ РЕАЛИЗОВАНО!!! поля массива не локализуются
     * возвращает локализованный массив
     * @param Array $arr
     */
    public function getLocalFields($arr)
    {
        $res = [];
        for ($i = 0; $i < count($arr); $i++) {
            $res[$i]['id'] = 'id';
            $res[$i]['name'] = $arr[$i]['name'];
            $res[$i]['description'] = $arr[$i]['description'];
            $res[$i]['parent_id'] = $arr[$i]['parent_id'];
            if (array_key_exists('active', $arr[$i])) {
                $res[$i]['active'] = $arr[$i]['active'];
            }
            if (array_key_exists('created_at', $arr[$i])) {
                $res[$i]['created_at'] = $arr[$i]['created_at'];
            }
            if (array_key_exists('updated_at', $arr[$i])) {
                $res[$i]['updated_at'] = $arr[$i]['updated_at'];
            }
        }
        return $res;
    }
    
    
    public function getUlTag($arr)
    {
        $res = '<ul id = "sbleft_category" class="sbleft_category">';
        $res .= $this->getLiTag($arr[0], '', 'sbleft-li-selected');
        for ($i = 1; $i < count($arr); $i++) {
            if (is_null($arr[$i]['sub_cat'])) {
                $res .= $this->getLiTag($arr[$i]);
            } else {
                $res .= $this->getLiTag($arr[$i], 'more');
            }
            
        }
        $res .= "\n<ul>";
        
        return $res;
    }

    /**
     * возвращает html строку с тегом LI включая данные
     * @param Array $arr - массив данных
     * @param String $more - значок, отображающий подпапки 
     * @param String $class - класс подсветки выделенной папки
     * @return string
     */
    private function getLiTag($arr, $more = '', $class = '')
    {
        if (!$class) {
            $res = '<li>';
        } else {
            $res = "<li class=\"$class\">";
        }
        
        $res .= '<a href="#">';
        $res .= $arr['name'];
        if ($more <> '') {
            $res .= '<span class="sbleft-more">&raquo;</span>';
$subCat = $this->getSubcatStr($arr['sub_cat'], 'sbleft_subcategory' );    //
        }
        $res .= '</a>';
$res .= $subCat;
        $res .= '</li>';
        return $res;
    }
  
    /**
     * возвращает html строку с подкатегорией
     * @param Array $arr - элемент массива с подкатегорией 
     * @param String $class - имя класса для тега LI
     * @return String 
     */
    public function getSubcatStr($arr, $class = '')
    {
        $res = '<ul class="sbleft_subcategory_ul hide">';   //subcat изначально спрятаны
        for ($i = 0; $i < count($arr); $i++) {
            
            if (!$class) {
                $res .= '<li>';
            } else {
                $res .= "<li class=\"$class\">";
            }

            $res .= $arr[$i]['name'];
            $res .= '</li>';
        }
//        $res .= '<li>';
//        $res .= $arr['name'];
//        $res .= '</li>';
        $res .= '</ul>';
//Временно, так нельзя стразу закрывать  UL !!!
        return $res;
    }
    
    
// НЕ ИСПОЛЬЗУЕТСЯ!!! можно удалять    
//    private function getLiTagWithTags($arr)
//    {
//        $res = '<li>';
//        $res .= '<details>';
//        $res .= '<summary class="sbleft-more">';
//        $res .= $arr['name'];
//        $res .= '<span class="sbleft-more">&gt;</span>';
//        $res .= '</summary>';
//        $res .= '</details>';
//        $res .= '</li>';
//        return $res;
//    }



    public function close()
    {
        $this->connection->close();
    }

    
    
    /** ПОКА не нужен!!!
     * записывает в свойство объекта массив имен полей таблицы
     * @param String $sql
     * @param String $tableName
     */
    public function getFieldsList($sql, $tableName)
    {
        $result = $this->connection->query($sql);
        if ($result === false) {
            die("Query failed: " . $this->connection->error);
        }
        $res = $this->fetchAll($result);
        for ($i = 0; $i < count($res); $i++) {
            $this->fieldsList[$i] = $res[$i]['COLUMN_NAME'];
        }
    }
    
}
