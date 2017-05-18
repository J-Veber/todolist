<?php

namespace TodoList\Controllers;

use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use TodoList\Models\Users_Model;

class AuthController
{
    function actionLogin($inputApp)
    {
        $blade = $inputApp->getService('blade');
        echo $blade->render("login");
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
        //$blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
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