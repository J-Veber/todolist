<?php
//use Exception;

class Router
{
    private $routes;
    private $app;

    function __construct($inputapp)
    {
        $routesPath = SITE_PATH . '/App/routes.php';
        $this->routes = include_once($routesPath);
        $this->app = $inputapp;
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    function start()
    {
        $uri = parse_url($this->getURI(), PHP_URL_PATH);
        if (array_key_exists($uri, $this->routes))
        {
            $path = $this->routes[$uri];
            $segments = explode('/', $path);
            $controllerName = ucfirst($segments[0]) . "Controller";
            $controllerName = "\\TodoList\\Controllers\\" . ucfirst($controllerName);
            $actionName = 'action' . ucfirst($segments[1]);
            $controllerObject = new $controllerName;
            $result = $controllerObject->$actionName($this->app);
        } else
        {
            $authController = new \TodoList\Controllers\AuthController();
            $authController->actionError($this->app);
        }
    }
}