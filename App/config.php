<?php
    define('DS', DIRECTORY_SEPARATOR);
    $sitePath = realpath(dirname(__FILE__) . DS) . DS;
    define('SITE_PATH', $sitePath); //путь к корневой папке сайта
    define('ROOT_PATH', '/home/veber/todolist/'); // TODO: сделать чтоб логика смотрела сюда

    define('DB_DRIVER', 'pdo_mysql');
    define('DB_USER', 'root');
    define('DB_PASS', 'passw');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'todomvc_db');

    error_reporting(E_ALL);