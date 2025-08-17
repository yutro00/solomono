<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Sidebar
 *
 * @author yuriy
 */
class Sidebar 
{
        
    private $confDefault = [
        'sidebar' => 'left',
        'width' => '33%',
    ];

    private $conf;


    public function __construct($params = null) 
    {
        if (isset($params)) {
            $this->conf = $params;
        } else {
            $this->conf = $this->confDefault;
        }
        
        
    }
    
}
