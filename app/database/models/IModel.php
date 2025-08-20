<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */


/**
 *
 * @author yuriy
 */
interface IModel 
{
    
    
    public function create($arr);
    
    public function read($sql);
    
    public function update($sql);
    
    public function delete($id);
}
