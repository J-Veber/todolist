<?php
namespace Classes;

include (SITE_PATH.'controllers/AuthorizationController.php');
include (SITE_PATH.'controllers/ContentController.php');
include (SITE_PATH.'controllers/MainController.php');
include (SITE_PATH.'controllers/RegistrationController.php');
include (SITE_PATH.'controllers/ResetController.php');


use Controllers\AuthorizationController;
use Controllers\ContentController;
use MainController;
use RegistrationController;
use ResetController;

class Router
{
    private function __construct() {
        $this->bramusRouter = new \Bramus\Router\Router();
        $this->autorizationController = new AuthorizationController();
        $this->contentController = new ContentController();
        $this->mainController = new MainController();
        $this->resetController = new ResetController();
        $this->registrationController = new RegistrationController();
    }

    public static function start() {
        $router = new self();
        $bramusRouter = $router->bramusRouter;

        $bramusRouter->get('/[authorization]', $router->mainController->actionIndex());
        $bramusRouter->get('/todos', $router->contentController->actionIndex());
        $bramusRouter->get('/reset_passw', $router->resetController->actionIndex());
        $bramusRouter->get('/registration', $router->registrationController->actionIndex());




        $bramusRouter->run();
    }
}