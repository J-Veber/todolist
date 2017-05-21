<?php
//общие настройки
session_start();
$_SESSION['test'] = "Hello WORLD!";

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../App/config.php';
require_once SITE_PATH . '/vendor/autoload.php';
require_once SITE_PATH . '/App/Autoloader.php';
//require_once SITE_PATH . '/App/Router.php';

$autoLoader = new Autoloader();
spl_autoload_register(array($autoLoader, '__autoload'));

$app = new App();
$router = new Router($app);
$router->start();

