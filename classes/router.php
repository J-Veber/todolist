<?php
class Router
{
    private $_registry;
    private $_path;
    private $_args = array();

    //получаем хранилище
    function __construct($registry)
    {
        $this->_registry = $registry;
    }

    //путь до папки с контроллерами
    function setPath($path)
    {
        $path = trim($$path, '/\\');
        $path .= DS;

        if(!is_dir($path))
        {
            throw new Exception('Invalid controler path: `' . $path . '`');
        }
        $this->_path = $path;
    }

    private function getController($file, $controller, $action, $args)
    {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];
        unset($_GET['route']);

        if(empty($route))
        {
            $route = 'index';
        }

        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        $cmd_path = $this->_path;

        foreach ($parts as $part)
        {
            $fullpath = $cmd_path . $part;

            if(is_dir($fullpath))
            {
                $cmd_path .= $parts . DS;
                array_shift($parts);
                continue;
            }

            if (is_file($fullpath . 'php'))
            {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        //если в урле не указан контроллер,
        //то используем по умлочанию index.php
        if(empty($controller))
        {
            $controller = 'index';
        }

        $action = array_shift($parts);
        if(empty($action))
        {
            $action = 'index';
        }

        $file = $cmd_path . $controller . 'php';
        $args = $parts;
    }

    function start()
    {
        $this->getController($file, $controller, $action, $args);

        if(!is_readable($file))
        {
            die('404 Not Found');
        }

        include ($file);

        $class = 'Controller_' . $controller;
        $controller = new $class($this->_registry);

        if(!is_callable(array($controller, $action)))
        {
            die('404 Not Found');
        }
        $controller->$action();
    }
}