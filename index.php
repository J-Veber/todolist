<?php

//общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('config.php');
include ('classes/registry.php');
include ('classes/router.php');
require_once 'vendor/autoload.php';
use Classes\Router;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


//содеинение с БД

(new Router(null))->start();
die();

/*$paths = array("/path/to/entity-files");
$isDevMode = false;
$dbParams = array(
    'driver'   => DB_DRIVER,
    'user'     => DB_USER,
    'password' => DB_PASS,
    'dbname'   => DB_NAME,
);
include('classes/template.php');
//$index = new Template('main', 'index');
//$index->view('main');

echo SITE_PATH;
$registry = new Registry();
$registry->set('router', $router);
$router = new Router($registry);
$router->setPath(SITE_PATH . 'controllers' . '/');

echo SITE_PATH;
$router->start();

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);*/
include ('classes/registry.php');
include (SITE_PATH . DS . 'core' . DS . 'core.php');

