<?php
//use Exception;

class Router
{
    //private $registry;
    private $path;
    //private $args = array();
    private $routes;
    function __construct()
    {
        $routesPath = SITE_PATH.'/routes.php';
        $this->routes = include($routesPath);
    }
    //путь до папки с контроллерами
    function setPath($path)
    {
        $path = trim($path, '\\');
        $path .= DS;
        if (is_dir($path) == false) {
            throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }
    //returns request string
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    function start()
    {
        //получить строку маршрута
        $uri = $this->getURI();
        //echo $uri;
        //поиск маршрута
        foreach ($this->routes as $uriPattern => $path)
        {
            if (preg_match("~$uriPattern~" , $uri))
            {
                $segments = explode('/', $path);
                $controllerName = array_shift($segments) . "Controller";
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                //Подключить файл класса контроллера
                $controllerFile = SITE_PATH . '/controllers/' .
                    $controllerName . '.php';
                //echo "<br>$controllerFile";
                //echo "<br>$controllerName";
                if (file_exists($controllerFile))
                {
                    include_once ($controllerFile);
                }
                //Создать объект, вызвать метод
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}