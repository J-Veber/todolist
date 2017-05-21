<?php
    define('DS', DIRECTORY_SEPARATOR);
    $sitePath = realpath(dirname(__FILE__) . DS) . DS;
    $sitePathes = explode('/', trim($sitePath, '/'));
    array_pop($sitePathes);
    $sitePath = implode('/', $sitePathes);

    define('SITE_PATH', DS . $sitePath ); //путь к корневой папке сайта

    define('DB_DRIVER', 'pdo_mysql');
    define('DB_USER', 'root');
    define('DB_PASS', 'passw');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'todomvc_db');

    error_reporting(E_ALL);