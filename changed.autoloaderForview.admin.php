<?php
spl_autoload_register('myAutoLoaderForView');

function myAutoLoaderForView($className)
{
    $path = __DIR__ . '\app\\';
    $extension = '.php';
    $fullPath = $path . $className . $extension;
    if (!file_exists($fullPath)) {
        return false;
    }
    include_once $fullPath;
}