<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// Маршруты
$routes = [
    '' => ['controller' => 'IndexController', 'action' => 'index'],
    '/' => ['controller' => 'IndexController', 'action' => 'index'],
    '/goods' => ['controller' => 'IndexController', 'action' => 'getGoodsByCategory'],
    '/about' => ['controller' => 'MenuController', 'action' => 'getAbout'],
    '/brands' => ['controller' => 'MenuController', 'action' => 'getBrands'],
    '/contacts' => ['controller' => 'MenuController', 'action' => 'getContacts'],
];