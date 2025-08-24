<?php

/* 
 * Project Solomono test
 * точка входа на сайт 
 */

require_once '/var/www/html/solomono/app/config/Config.php';
require_once '/var/www/html/solomono/app/database/Database.php';
//подключаем маршруты и данные
require_once 'routes.php';
require_once 'constants.php';


Config::setConfig();  //загружаем конфигурацию обязательно!!!

//режим отладки
$debug = Config::getConfig()['app']['debug'];
if ($debug) {
    $level = Config::getConfig()['app']['error_level'];
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
//    error_reporting(E_ALL);
    error_reporting($level);
}

setDbConnection();      //устанавливаем связь с БД


$request_uri = $_SERVER['REQUEST_URI'];

$request = str_replace('/index.php', '', $request_uri);

$path1 = $_SERVER['PHP_SELF'];
$path = str_replace('/index.php', '', $path1);


$request1 = $_REQUEST;
$host = $_SERVER['HTTP_HOST'];
$var1 = $_SERVER['SERVER_NAME'];
$var2 = $_SERVER['QUERY_STRING'];

$cat = null;
$limit = null;
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
}
if (isset($_GET['limit'])) {
    $limit = $_GET['limit'];
}

//$var3 = '';


// определяем маршрут
if (array_key_exists($path, $routes)) {
    $route = $routes[$path];
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
} else {
    // Обработка 404 ошибки
    http_response_code(404);
//    echo "page $request_uri 404 Not Found";
}


function getDbParams()
{
    $dbParams = [];
    $dbParams['host'] = Config::getConfig()['database']['host'];
    $dbParams['user'] = Config::getConfig()['database']['user'];
    $dbParams['psw'] = Config::getConfig()['database']['password'];
    $dbParams['dbname'] = Config::getConfig()['database']['dbname'];
    return $dbParams;
}


function setDbConnection()
{
    $params = getDbParams();
    Database::setConnection($params);
}