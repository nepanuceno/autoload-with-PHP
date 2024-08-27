<?php

use function Safe\spl_autoload_register;

spl_autoload_register(function ($className) {
    $prefix = "App\\";
    $baseDir = __DIR__ . "/src/";

    $len = strlen($prefix);

    if (strncmp($prefix, $className, $len) != 0) {
        return;
    }
    $relativeClass = substr($className, $len);
    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass);

    if (file_exists($file . '.php')) {
        require $file . '.php';
    } elseif (file_exists($file . '.class.php')) {
        require_once $file . '.class.php';
    } elseif (file_exists($file . '.model.php')) {
        require_once $file . '.model.php';
    }
});
