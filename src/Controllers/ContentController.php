<?php

namespace TodoList\Controllers;

use duncan3dc\Laravel\BladeInstance;

class ContentController
{
    function actionIndex()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("content", ['content' => $tasks]);
    }

}
