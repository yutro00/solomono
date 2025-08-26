<?php

/* 
 * Project Solomono test
 * Контроллер начальной страницы
 */

require_once '/var/www/html/solomono/app/database/Database.php';
require '/var/www/html/solomono/app/http/Page.php';
require '/var/www/html/solomono/app/database/models/CategoryModel.php';
require '/var/www/html/solomono/app/database/models/GoodsModel.php';


/**
 * Контроллер начальной страницы сайта
 *
 * @author yuriy
 */
class IndexController 
{
    /**
     * отдаёт клиенту начальную страницу
     * @return type
     */
    public function index() 
    {
        $connect = Database::getConnection();
        //извлекаем данные по категориям
        $categoryModel = new CategoryModel($connect);
        $catArr = $categoryModel->getCategoriesArr();
        $firstCategoryId = $catArr[0]['id'];
        $category = $categoryModel->getCategoriesStr($catArr);
        
        //извлекаем данные по умолчанию на товары из категории
        $goodsModel = new GoodsModel($connect);
        $goodsArr = $goodsModel->getGoodsByCategoryDefaultArr($firstCategoryId);
        $goodsByCategory = $goodsModel->getGoodsByCategoryStr($goodsArr);
        
        
        $page = new Page('guest');
        
        $res = $page->getPageBeginning();
        $res .= '<div class="page-wrap">';
        
//        это надо реализовать!!!
//        $currCategory = $categoryModel->getSelectedCategory();
//        $goodsModel = new GoodsModel($connect);
//        $goods = $goodsModel->getGoods($currCategory);
        
        
        $bodyData = [
//            'content_data' => 'Please wait ... Goods are on the way',
            'content_data' => $goodsByCategory,
            'content_main' => $goodsByCategory,
            'sidebar_data' => $category,
        ];

        $body = $page->getBody($bodyData);
        $res .= $body;
        
        $res .= "\n</div>     <!-- page-wrap -->";
       
        $footer = $page->getFooter();
        $res .= $footer;

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
        $catId = $_GET['cat'];
        $id = substr($catId,4);
//        $limit = $_GET['limit'];
//        $order = $_GET['order'];
        echo 'Здесь будет товар категории c ID = ' . $id;
    }   
}

