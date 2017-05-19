<?php
//use Exception;

class Router
{
    private $path;
    private $routes;
    private $app;

    function __construct($inputapp)
    {
        $routesPath = SITE_PATH.'/routes.php';
        $this->routes = include($routesPath);
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
        //echo '<pre>'.print_r($_POST,true).'</pre>';
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
            //echo '123';
            //TODO: create error page
            header('Location: /404');
            /*$contr = new \TodoList\Controllers\AuthController();
            $contr->actionError($this->app);*/
            /*$controllerName = "\\TodoList\\Controllers\\AuthController";
            $actionName = 'actionError';
            $controllerObject = new $controllerName;
            $result = $controllerObject->$actionName($this->app);*/
        }
    }
}