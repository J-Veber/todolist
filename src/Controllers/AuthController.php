<?php

namespace TodoList\Controllers;

use TodoList\Models\Users_Model;

class AuthController
{
    function actionLogin($inputApp)
    {
        if (isset($_SESSION['username']) and isset($_SESSION['password']))
        {
            header("Location: /todos");
        } else
        {
            $blade = $inputApp->getService('blade');
            echo $blade->render("login");
        }
    }

    function actionLoginResponse($inputApp)
    {
        if (isset($_POST['submit']))
        {
            $newUsers = new Users_Model($inputApp);
            $newUsers->setParams($_POST['username'], $_POST['password'], "");
            if ($newUsers->trylogin())
            {
                //redirect into content page
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = sha1($_POST['password']);
                echo "true";
            } else
            {
                //user does not exist
                echo "false";
            }
        }
    }

    function actionRegistrationResponse($inputApp)
    {
        if (isset($_POST['submit']))
        {
            $newUsers = new Users_Model($inputApp);
            $newUsers->setParams($_POST['username'], $_POST['password'], $_POST['email']);
            if ($newUsers->findByLogin())
            {
                $newUsers->save();
                echo "true";
            } else
            {
                echo "false";
            }
        }
    }

    function actionRegistration($inputApp)
    {
        $blade = $inputApp->getService('blade');
        echo $blade->render("registration");
    }

    function actionReset($inputApp)
    {
        $blade = $inputApp->getService['blade'];
        echo $blade->render("reset_password");
    }

    function actionHome($inputApp)
    {
        echo json_encode([
            'status' => true,
            'message' => 'Hello world',
            'redirect_url' => '/smth',
        ]);
    }

}