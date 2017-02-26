<?php
namespace DBphp;
use DB;
require_once 'vendor/autoload.php';
include ('meekrodb.2.3.class.php');


$port = '8000';

DB::$user = DB_USER;
DB::$password = DB_PASS;
DB::$dbName = DB_NAME;
DB::$host = DB_HOST;
DB::$port = $port;
DB::$encoding = 'utf8';
?>