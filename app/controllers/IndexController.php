<?php

/* 
 * Project Solomono test
 * Контроллер начальной страницы
 */

require_once '/var/www/html/solomono/app/database/Database.php';
require '/var/www/html/solomono/app/http/Page.php';
require '/var/www/html/solomono/app/database/models/CategoryModel.php';
//include '/var/www/html/solomono/app/database/models/GoodsModel.php';


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
        
        $page = new Page('guest');
        
        $res = $page->getPageBeginning();
        $res .= '<div class="page-wrap">';
               
        $categoryModel = new CategoryModel($connect);
//$categoryId = $categoryModel->getId();
        $category = $categoryModel->getCategories();
        
        
//        goodsModel() = new GoodsModel($connect);
        
//        $goods = goodsModel->getGoodsByCategory($categoryId);
        
//        это надо реализовать!!!
//        $currCategory = $categoryModel->getSelectedCategory();
//        $goodsModel = new GoodsModel($connect);
//        $goods = $goodsModel->getGoods($currCategory);
        
        
        $bodyData = [
            'content_data' => 'Please wait ... Goods are on the way',
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
    
    public function goodsByCategory()
    {
        
        echo 'Здесь будет товар выбранной категории!!!';
    }   
}

