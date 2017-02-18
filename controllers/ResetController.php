<?php
include_once "BaseController.php";
use duncan3dc\Laravel\BladeInstance;

class ResetController extends BaseController
{
    function actionIndex()
    {
        //echo 'In ResetController';
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("reset_password");
        return true;
    }
}