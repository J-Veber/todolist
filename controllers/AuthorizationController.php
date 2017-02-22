<?php

namespace Controllers;

include_once "BaseController.php";
use BaseController;
use duncan3dc\Laravel\BladeInstance;
use \Delight\Auth;
use Klein\Request;
use Klein\Response;

class AuthorizationController
{
    function actionIndex()
    {
        //return "YA";
        $this->view();
//        if (isset($_POST['submit']))
//        {
//            $auth = new \Delight\Auth\Auth(DB::class);
//
//            try
//            {
//                $md5passw = md5(md5($_POST['password']));
//                $auth->login($_POST['email'], $md5passw);
//                echo "SUCCSESS";
//            } catch (Auth\InvalidEmailException $e)
//            {
//                echo "wrong email address";
//            } catch (Auth\InvalidPasswordException $e)
//            {
//                echo "wrong password";
//            } catch (Auth\TooManyRequestsException $e)
//            {
//                echo "too many requests";
//            }
//        }
    }

    private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");
        return true;
    }
}