<?php
namespace Controllers;
use BaseController;
use duncan3dc\Laravel\BladeInstance;

class ContentController
{
    function actionIndex()
    {
        //echo 'In ContentController';
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("content");
    }

}