<?php
//общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../App/config.php';
require_once __DIR__ . '/../App/Autoloader.php';
require_once __DIR__ . '/../App/Router.php';
require_once __DIR__ . '/../App/meekrodb.2.3.class.php';

$autoLoader = new Autoloader();
spl_autoload_register(array($autoLoader, '__autoload'));

//var_dump($_SERVER['REQUEST_URI']);

//$test = new \TodoList\Controllers\LoginController();
//$test = new \TodoList\Controllers\ContentController();
//$test = new \TodoList\Controllers\RegistrationController();
//$test->actionIndex();
////use Users_Model;
//
//include ('models/Users_Model.php');
//
////содеинение с БД
$app = new App();

//$users = new Users_Model('4', 'anny', 'azaza', 'kokoko@gmail.com');
//$users->save();
//echo $users->getRowById('1');
$router = new Router($app);
$router->start();
//echo $response;
//Router::start();
//echo "YO";
//$row = $mdb->queryFirstRow("SELECT name, email FROM users");
//echo "Name: " . $row['name'] . "\n" . "E-mail: " . $row['email'] . "\n"; // will be Joe, obviously
die();

