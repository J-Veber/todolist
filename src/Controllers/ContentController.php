<?php

namespace TodoList\Controllers;

use TodoList\Models\Tasks_Model;

class ContentController
{
    function actionIndex($inputApp)
    {

        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);

        /*$tasksWithSult = $currentUser->getALLTasks();
        $tasks = array();
        $counter = 0;
        foreach ($tasksWithSult as $task)
        {
            $tasks[$counter++] = $task['task_text'];
        }*/
//        print_r($tasks);
        $blade = $inputApp->getService('blade');
        echo $blade->render("content");
    }

    function actionAddTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->setTaskText($_POST['task_text']);
        //echo $_POST['task_text'];
         if ($currentUser->save() == 1)
             echo "true";
    }

    function actionLoadTasks($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        echo $currentUser->getALLTasks();
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
        $currentUser->updateTask();
    }

    function actionRemoveAllCompletedTask($inputApp)
    {
        $currentUser = new Tasks_Model($inputApp);
        $currentUser->setUsername($_SESSION['username']);
        $currentUser->deleteAllTasks();

    }
}
