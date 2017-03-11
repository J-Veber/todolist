<?php

//общие настройки
use app\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/app/bootstrap.php";
require_once __DIR__ . "/vendor/autoload.php";
// start
Router::start();