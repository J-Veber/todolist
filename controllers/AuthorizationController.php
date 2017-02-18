<?php
include_once "BaseController.php";
use duncan3dc\Laravel\BladeInstance;
class AuthorizationController extends BaseController
{
    function actionIndex()
    {
        //echo 'In AuthorizationController';
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");
        return true;
    }
}