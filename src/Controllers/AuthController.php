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
        //$blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");

        if (isset($_POST['submit']))
        {
            $user = new Users_Model($inputApp);

        }
        /*if (isset($_POST['submit']))
        {
            $auth = $inputApp->getService['auth'];
            //$auth = new Auth(DB::useDB());
            try
            {
                //$md5passw = md5(md5($_POST['password']));

                $auth->login($_POST['login'], $_POST['password'], null);
                echo "SUCCSESS";
            } catch (InvalidEmailException $e)
            {
                echo "wrong email address";
            } catch (InvalidPasswordException $e)
            {
                echo "wrong password";
            } catch (TooManyRequestsException $e)
            {
                echo "too many requests";
            }
        }*/
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
                //TODO:: create ERROR msg
                //echo "Пользователь с таким логином уже существует";
                echo "false";
            }
        } else {

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