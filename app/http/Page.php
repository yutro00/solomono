<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

//namespace app\http;
$res = require '/var/www/html/solomono/app/http/APage.php'; 
$res1 = include '/var/www/html/solomono/app/http/IPage.php'; 

/**
 * Формирует данные для представления http страницы
 *
 * @author yuriy
 */
class Page //extends АPage implements IPage
{
    
    static public $user_roles = [
        'guest', 
        'client',
        'operator',
        'admin',
        'sysadmin'
    ]; 
    private $user_role = 'guest';
    private $head;
    private $footer;
    private $body;
    

    function __construct($role = 'guest')
    {
        $this->user_role = $role;
        
    }
    
    
    static public function get_user_roles() 
    {
        return self::$user_roles;
    }
    
    
    public function getUserRole() {
        return $this->user_role;
    }
    
    
    public function setUserRole($role) {
        $res = false;
        if (in_array($role, $this->user_roles)) {
            $this->user_role = $role;
            $res = true;
        } else {
            $this->user_role = $role;
        }
        return $res;
    }
    
    
    public function getHead() {
        return $this->head;
    }
    
    
    public function setHead($obj) {
        $res = null;
        if (is_object($obj)) {
            $this->head = $obj;
        } else {
            $res = true;
        }
        return $res;
    }
    
    public function getFooter() {
        return $this->footer;
    }
    
    
    public function setFooter($obj) {
        $res = null;
        if (is_object($obj)) {
            $this->footer = $obj;
        } else {
            $res = true;
        }
        return $res;
    }
    

    

}
