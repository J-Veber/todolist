<?php

namespace index;
//общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('config.php');
include ('classes/router.php');

require_once 'meekrodb.2.3.class.php';
require_once 'vendor/autoload.php';
use Classes\Router;
use DB;
use MeekroDB;
use Users_Model;

include ('models/users_model.php');

//содеинение с БД
$port = '8000';

//$db = new DB();
DB::$user = DB_USER;
DB::$password = DB_PASS;
DB::$dbName = DB_NAME;
DB::$host = DB_HOST; //defaults to localhost if omitted
DB::$port = $port; // defaults to 3306 if omitted
DB::$encoding = 'utf8'; // defaults to latin1 if omitted


//$users = new Users_Model('4', 'anny', 'azaza', 'kokoko@gmail.com');
//$users->save();
//echo $users->getRowById('1');
(new Router())->start();
//echo "YO";
//$row = $mdb->queryFirstRow("SELECT name, email FROM users");
//echo "Name: " . $row['name'] . "\n" . "E-mail: " . $row['email'] . "\n"; // will be Joe, obviously
die();

