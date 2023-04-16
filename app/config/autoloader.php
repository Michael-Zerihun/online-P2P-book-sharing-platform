<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = rtrim(__DIR__, 'config');
    $extension = '.php';
    $fullPath = $path . $className . $extension;
    if (!file_exists($fullPath)) {
        return false;
    }
    include_once $fullPath;
}
