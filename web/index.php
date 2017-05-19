<?php
//общие настройки
session_start();
$_SESSION['test'] = "Hello WORLD!";

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../App/config.php';
require_once __DIR__ . '/../App/Autoloader.php';
require_once __DIR__ . '/../App/Router.php';

$autoLoader = new Autoloader();
spl_autoload_register(array($autoLoader, '__autoload'));

$app = new App();

$router = new Router($app);
$router->start();

