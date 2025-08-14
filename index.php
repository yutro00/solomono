<?php

/* 
 * Solomono test1
 * точка входа на сайт 
 */


//подключаем маршруты
require_once 'routes.php';

$request_uri = $_SERVER['REQUEST_URI'];

// определяем маршрут
if (array_key_exists($request_uri, $routes)) {
    $route = $routes[$request_uri];
    $controllerName = $route['controller'];
    $actionName = $route['action'];

    // Подключаем нужный контроллер
    $class = __DIR__ . "/app/controllers/" . $controllerName . ".php";
    require_once $class;

    // вызываем нужный метод
    $controller = new $controllerName();
    $controller->$actionName();

} else {
    // Обработка 404 ошибки
//    http_response_code(404);
    echo "404 Not Found";
}