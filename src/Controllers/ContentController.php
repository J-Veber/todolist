<?php

namespace TodoList\Controllers;

use duncan3dc\Laravel\BladeInstance;

class ContentController extends BaseController
{
    function actionIndex()
    {
        header('Content-type: text/html; charset=utf-8;');
        $inputlogin = $_POST['username'];
        //$inputpassword = $_POST['password'];



        //echo 'In ContentController';
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("content", ['content' => $tasks]);
    }

}