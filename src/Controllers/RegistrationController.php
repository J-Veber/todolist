<?php
namespace TodoList\Controllers;

use duncan3dc\Laravel\BladeInstance;

class RegistrationController
{
    function actionIndex()
    {
        //echo 'In RegistrationController';
        $this->view();
    }

    private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("registration");
        return true;
    }
}