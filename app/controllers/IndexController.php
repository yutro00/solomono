<?php

/* 
 * Project Solomono test
 * Контроллер начальной страницы
 */

//require_once '/var/www/html/solomono/app/database/Database.php';
//require '/var/www/html/solomono/app/http/Page.php';
//require '/var/www/html/solomono/app/database/models/CategoryModel.php';
//require '/var/www/html/solomono/app/database/models/GoodsModel.php';

require_once './app/database/Database.php';
require_once './app/http/Page.php';
require_once './app/database/models/CategoryModel.php';
require_once './app/database/models/GoodsModel.php';


/**
 * Контроллер начальной страницы сайта
 *
 * @author yuriy
 */
class IndexController 
{
    /**
     * отдаёт клиенту http страницу
     * @return type
     */
    public function index()
    {
        $connect = Database::getConnection();
        if (!$connect) {
            echo '<b>Нет соединения с БД.</b>' . "\n"
            . 'Если БД отсутсвует запустите SQL скрипт /app/backup/smtest_bd_backup.sql.'
            . "\n"
            . 'Возможно надо исправить параметры подключения в БД в /app/config/config.ini';
            exit;
        }
        //извлекаем данные о категориях
        $categoryModel = new CategoryModel($connect);
        $catArr = $categoryModel->getCategoriesArr();
        $firstCategoryId = $catArr[0]['id'];
        $category = $categoryModel->getCategoriesStr($catArr);
        
        //извлекаем данные по умолчанию на товары из категории
        $goodsModel = new GoodsModel($connect);

        $goodsConfig['cat'] = $firstCategoryId;
        $goodsConfig['order'] = 'name';
        $goodsConfig['limit'] = 10;
        //$goodsConfig['lang'] = 'en';

$goodsArr = $goodsModel->getGoodsByCategoryArr($goodsConfig);
        
        $goodsByCategory = $goodsModel->getGoodsByCategoryStr($goodsArr);
                
        $page = new Page('guest');
        
        $res = $page->getPageBeginning();
        $res .= '<div class="page-wrap">';
        
        
        $bodyData = [
            'content_data' => $goodsByCategory,
            'content_main' => $goodsByCategory,
            'sidebar_data' => $category,
        ];

        $body = $page->getBody($bodyData);
        $res .= $body;
        
        $res .= "\n</div>     <!-- page-wrap -->";
       
        $footer = $page->getFooter();
        $res .= $footer;
        $addition = $page->getAddition();
        $res .= $addition;

        $res .= "\n</body>";
        $res .= '</html>';       
               
        echo $res; 
        return ;
    }

    
    public function about()
    {
        echo "It is about response!!!";
    }
    
    public function getGoodsByCategory()
    {
        $goodsConfig = [];
        $goodsConfig['cat'] = $_GET['cat'];
        $goodsConfig['limit'] = $_GET['limit'];
        $goodsConfig['lang'] = $_GET['lang'];
        switch ($_GET['order']) {
            case 'name':
                $goodsConfig['order'] = 'name';
                break;
            case 'rating':
                $goodsConfig['order'] = 'name';
                break;
            case 'priceinc':
                $goodsConfig['order'] = 'price ASC';
                break;
            case 'pricedec':
                $goodsConfig['order'] = 'price DESC';
                break;
            default:
                $goodsConfig['order'] = 'name';
                break;
        }
        
        $connect = Database::getConnection();
        $goodsModel = new GoodsModel($connect);
        $goodsArr = $goodsModel->getGoodsByCategoryArr($goodsConfig);
        if (count($goodsArr) > 0) {
            $goodsByCategory = $goodsModel->getGoodsByCategoryStr($goodsArr);
        } else {
            $goodsByCategory = "This category is empty\n";
        }
        echo $goodsByCategory;
    }
}


