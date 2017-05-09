<?php
namespace TodoList\Controllers;

use DB;
use Delight\Auth\Auth;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use duncan3dc\Laravel\BladeInstance;
use Klein\Request;
use Klein\Response;

class LoginController
{
    function actionIndex()
    {
        //return "YA";
        $this->view();
        $this->login();
    }

    private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");
        //return true;
    }

    function login()
    {
        if (isset($_POST['submit']))
        {
            $auth = new Auth(DB::useDB());

            try
            {
                //$md5passw = md5(md5($_POST['password']));
                $auth->login($_POST['logn'], $_POST['password']);
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
        }
    }
}