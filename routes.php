<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// Маршруты
$routes = [
    '/' => ['controller' => 'IndexController', 'action' => 'index'],
    '/about' => ['controller' => 'PageController', 'action' => 'about'],
    '/contact' => ['controller' => 'PageController', 'action' => 'contact'],
];