<?php

namespace Controllers;

use BaseController;
include ('BaseController.php');
use duncan3dc\Laravel\BladeInstance;

class AuthorizationController extends BaseController
{
    private $err = "Неверный логин и пароль";
    private $wrong = false;
    function actionIndex()
    {
        if($_GET['action'] == "out") $this->out();

        if ($this->login())
        {
            $UID = $_SESSION['id'];
        }
        else
        {
            if(isset($_POST['login_btn']))
            {
                $error = $this->enter();
                if (count($error) == 0)
                {
                    $UID = $_SESSION['id'];
                }
            }
        }
        //подключаем файл с формой

    }

    function enter ()
    {
        $error = array();
        if ($_POST['user_email'] != "" && $_POST['password'] != "")
        {
            $email = $_POST['user_email'];
            $password = $_POST['password'];
            $user = new \Users_Model("", $password, $email);
            $rez = $user->findByEmailAndPassw();
            if (count($rez) >= 1)
            {
                $row = mysqli_fetch_assoc($rez);
                if (sha1($password) == $row['password'])
                {
                    $this->savetocookie($email, sha1($password));
                    $_SESSION['id'] = $row['id'];
                    return $error;
                }
                else
                {
                    return $this->err;
                }
            }
            else
            {
                return $this->err;
            }
        }
        else
        {
            $error[] = "Поля не должны быть пустыми!";
            return $error;
        }
    }


    function login () {
        ini_set ("session.use_trans_sid", true);
        session_start();
        if (isset($_SESSION['id']))
        {
            if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
            {
                setcookie("email", "", time() - 1, '/');
                setcookie("password", "", time() - 1, '/');
                $this->savetocookie($_COOKIE['email'], $_COOKIE['password']);
                return true;
            } else
            {
                $user = new \Users_Model("", $_COOKIE['password'], $_COOKIE['email']);
                $rez = $user->findById($_SESSION['id']);
                if (count($rez) == 1)
                {
                    $row = mysqli_fetch_assoc($rez);
                    $this->savetocookie($row['email'], sha1($row['password']));
                    return true;
                } else return false;
            }
        } else
            {
                if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
                {
                    $user = new \Users_Model('', $_COOKIE['password'], $_COOKIE['email']);
                    $rez = $user->findByEmail($_COOKIE['email']);
                    $row = mysqli_fetch_assoc($rez);
                    if(count($rez) == 1 && sha1($row['password']) == $_COOKIE['password'])
                    {
                        $_SESSION['id'] = $row['id'];
                        return true;
                    } else
                    {
                        setcookie("email", "", time() - 360000, '/');
                        setcookie("password", "", time() - 360000, '/');
                        return false;
                    }
                }
                else
                {
                    return false;
                }
            }
    }

    function out () {
        session_start();
        $id = $_SESSION['id'];
        unset($_SESSION['id']);
        setcookie("email", "");
        setcookie("password", "");
        $this->view();
        //header('Location: http://'.$_SERVER['HTTP_HOST'].'/'); //перенаправляем на главную страницу сайта
    }


        private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("login");
        return true;
    }
}