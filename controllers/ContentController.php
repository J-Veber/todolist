<?php
include_once "BaseController.php";
use duncan3dc\Laravel\BladeInstance;

class ContentController extends BaseController
{
    function actionIndex()
    {
        //echo 'In ContentController';
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("content");
        return true;
    }

}