<?php
//общие настройки
//use DB;
//use MeekroDB;
//use TodoList\Controllers\ContentController;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../App/config.php';
require_once __DIR__ . '/../App/Autoloader.php';
require_once __DIR__ . '/../App/Router.php';

$autoLoader = new Autoloader();
spl_autoload_register(array($autoLoader, '__autoload'));

if (class_exists(__DIR__ . '/../App/Router.php') ){
    echo 123;
}

$test = new \TodoList\Controllers\LoginController();
$test->actionIndex();
////use Users_Model;
//
//include ('models/Users_Model.php');
//
////содеинение с БД
//$port = '8000';
//
////$db = new DB();
//DB::$user = DB_USER;
//DB::$password = DB_PASS;
//DB::$dbName = DB_NAME;
//DB::$host = DB_HOST; //defaults to localhost if omitted
//DB::$port = $port; // defaults to 3306 if omitted
//DB::$encoding = 'utf8'; // defaults to latin1 if omitted


//$users = new Users_Model('4', 'anny', 'azaza', 'kokoko@gmail.com');
//$users->save();
//echo $users->getRowById('1');
$router = new Router();
//$router->start();
//Router::start();
//echo "YO";
//$row = $mdb->queryFirstRow("SELECT name, email FROM users");
//echo "Name: " . $row['name'] . "\n" . "E-mail: " . $row['email'] . "\n"; // will be Joe, obviously
die();

