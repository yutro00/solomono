<?php

/* 
 * Project Solomono test
 * точка входа на сайт 
 */

require_once '/var/www/html/solomono/app/config/Config.php';
//подключаем маршруты и данные
require_once 'routes.php';
require_once 'constants.php';


Config::setConfig();  //загружаем конфигурацию обязательно!!!


//режим отладки
$debug = Config::getConfig()['app']['debug'];
if ($debug) {
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1); 
    error_reporting(E_ALL);
}

$request_uri = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];


// определяем маршрут
if (array_key_exists($request_uri, $routes)) {
    $route = $routes[$request_uri];
    $controllerName = $route['controller'];
    $actionName = $route['action'];

    // Подключаем нужный контроллер
    $class = __DIR__ . "/app/controllers/" . $controllerName . ".php";
    $res = require_once $class;

    // вызываем нужный метод
    try {
        $controller = new $controllerName();
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    $controller->$actionName();
    
//  $nm = __NAMESPACE__;
//  if ($nm === '') {
//    echo 'empty root NAMESPACE';
//  } else {
//    echo $nm;
//  }
  
  
} else {
    // Обработка 404 ошибки
//    http_response_code(404);
    echo "404 Not Found";
}
