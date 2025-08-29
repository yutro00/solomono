<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Дополнительные ресурсы: верстка, скрипты и прочее
 *
 * @author yuriy
 */
class PageAddition
{
    
    private $conf;
    
    public function __construct($config = null)
    {
        if (isset($config)) {
            $this->conf = $config;
        }
    }
    
    
    public function getAddition()
    {
        $res = $this->getLayout();
        if (is_null($res)) {
            $res = '';
        }
        $res .=  $this->getScript();
        return $res;
    }
    
    public function getLayout()
    {
        $res = include './app/views/templates/additionLayoutTempl.php';
        return $res;
    }
    
    
    public function getScript()
    {
        $res = include './app/views/templates/additionScriptTempl.php';
        return $res;
    }
    
}
