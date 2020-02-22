<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = 'backend/';
    $extension ='.php';
    $fileName = $path . $className . $extension;

    if (!file_exists($fileName)){
        return false;
    } 

    include_once $path . $className . $extension;

}