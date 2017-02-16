<?php

namespace Classes;
use duncan3dc\Laravel\BladeInstance;

class Router
{
    private $registry;
    private $path;
    private $args = array();

    function __construct($registry)
    {
        $this->registry = $registry;
    }

    //путь до папки с контроллерами
    function setPath($path)
    {
        $path = trim($path, '\\');
        $path .= DS;
        if (is_dir($path) == false)
        {
            throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }

    function start()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("main");
    }
}