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
use MeekroDB;

use userModel\Users_Model;


//содеинение с БД
$port = '8000';

$mdb = new MeekroDB(DB_HOST, DB_USER, DB_PASS, DB_NAME, $port, 'utf8');

(new Router())->start();
//echo "YO";
//$row = $mdb->queryFirstRow("SELECT name, email FROM users");
//echo "Name: " . $row['name'] . "\n" . "E-mail: " . $row['email'] . "\n"; // will be Joe, obviously
die();

