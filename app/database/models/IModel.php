<?php

/*
 * Project Solomono test
 * Обязательный интерфейс моделей БД
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
