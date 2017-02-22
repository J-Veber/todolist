<?php
include_once "BaseController.php";
use duncan3dc\Laravel\BladeInstance;

class ResetController
{
    function actionIndex()
    {
        //echo 'In ResetController';
        $this->view();
    }

    private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("reset_password");
    }
}