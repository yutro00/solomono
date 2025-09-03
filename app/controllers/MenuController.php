<?php

/* 
 * Project Solomono test
 * Контроллер HTTP страниц
 */



/**
 * Description of PageController
 *
 * @author yuriy
 */
class MenuController
{
    
    public function getBrands()
    {
        $response = 'This is a response to the request "Brands".';
        $response .= $this->getReturnButton();
        echo $response;
    }
    
    public function getAbout()
    {
        $response = 'This is a response to the request "About".';
        $response .= $this->getReturnButton();
        echo $response;
    }
    
    public function getContacts()
    {
        $response = 'This is a response to the request "Contacts"!!!';
        $response .= $this->getReturnButton();
        echo $response;
    }
 
    
    
    private function getReturnButton()
    {
        return  '<br>'
                . '<input type="button" value="Return" onclick="history.back()">';
    }
    
}
