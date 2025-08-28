<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */


/**
 * 
 * @author yuriy
 */
interface IPage 
{
    public function getUserRole();
    
    public function setUserRole($role);
    
    public function getHead();
    
    public function setHead($obj);
    
    public function getBody($obj);
    
    public function setBody($obj);
    
    public function getFooter();
    
    public function setFooter($obj);
    
    
    
    
    

    
    
    
}
