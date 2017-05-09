<?php
namespace TodoList\Controllers;

use duncan3dc\Laravel\BladeInstance;

class MainController
{
    function actionIndex()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");
    }
}