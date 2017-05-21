<?php

namespace TodoList\Controllers;

use TodoList\Models\Tasks_Model;

class ContentController
{
    function actionIndex($inputApp)
    {

        if (isset($_SESSION['username']))
        {
            $currentUser = new Tasks_Model($inputApp);
            $currentUser->setUsername($_SESSION['username']);
            $blade = $inputApp->getService('blade');
            echo $blade->render("content");
        } else
        {
            header("Location: /login");
        }

    }

    function actionAddTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->setTaskText($_POST['task_text']);
        if ($currentUser->save() == 1)
             echo "true";
    }

    function actionLoadTasks($inputApp)
    {
        if (isset($_SESSION['username']))
        {
            $currentUser = new Tasks_Model($inputApp);
            $currentUser->setUsername($_SESSION['username']);
            echo $currentUser->getALLTasks();
        }
    }

    function actionRemoveTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->setTaskId($_POST['task_id']);
        $currentUser->delete();
    }

    function actionToggleCompleteTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->setTaskId($_POST['task_id']);
        $currentUser->setTaskDone($_POST['task_done']);
        $currentUser->updateTaskDone();
    }

    function actionRemoveAllCompletedTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->deleteAllTasks();
    }

    function actionEditTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->setTaskId($_POST['task_id']);
        $currentUser->setTaskText($_POST['task_text']);
        $currentUser->updateTaskText();
        echo ($_POST['task_text']);
    }
}
