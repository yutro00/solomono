<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

//namespace app\http;

/**
 * Description of APage
 *
 * @author yuriy
 */
abstract class APage 
{
    
    static public $userRoles = [
        'guest', 
        'client',
        'operator',
        'admin',
        'sysadmin'
    ];
    
    
    static public function get_user_roles() 
    {
        return self::$userRoles;
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
