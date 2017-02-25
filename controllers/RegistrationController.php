<?php
include_once "BaseController.php";
use duncan3dc\Laravel\BladeInstance;
class RegistrationController extends BaseController
{
    function actionIndex()
    {
        //echo 'In RegistrationController';
        $this->view();
    }

    private function view()
    {
        $blade = new BladeInstance(__DIR__ . "/views", __DIR__ . "/views");
        echo $blade->render("registration");
        return true;
    }

    private function checkResetContrData()
    {
        if ($_POST['username'] == "") return false;
        if ($_POST['password'] == "") return false;
        if ($_POST['email'] == "") return false;
        if (!preg_match('/^([a-z0-9])(\w|[.]|-|_)+([a-z0-9])@([a-z0-9])([a-z0-9.-]*)([a-z0-9])([.]{1})([a-z]{2,4})$/is', $_POST['email'])) return false;
        if (!preg_match('/^([a-zA-Z0-9])(\w|-|_)+([a-z0-9])$/is', $_POST['username'])) return false;
        if (strlen($_POST['password']) < 6) return false;
        $login = $_POST['username'];
        $rez = Users_Model::class->findByLoginAndPassw($login, $_POST['password']);
        if (@mysql_num_rows($rez) != 0) return false;
        return true;
    }

    function callRegContr()
    {
        ini_set("session.use_trans_sid", true);
        session_start();

        if (isset($_SESSION['id']) || (isset($_COOKIE['username']) &&
            isset($_COOKIE['password'])))
        {
            //header ...
            // что-то запускать на отрисовку
        } else
        {
            if (isset($_POST['reg_btn']))
            {
                $correct = $this->checkResetContrData();
                if ($correct)
                {
                    $login = htmlspecialchars($_POST['username']);
                    $password = md5(md5($_POST['password']));
                    $email = htmlspecialchars($_POST['email']);

                    include_once ('../models/users_model.php');
                    $user = new Users_Model('', $login, $password, $email);
                    if ($user->save())
                    {
                        setcookie("username", $login, time() + 50000, '/');
                        setcookie("password", $password, time() + 50000, '/');
                        $rez = $user->findByEmail($email);
                        $row = mysqli_fetch_assoc($rez);
                        $_SESSION['id'] = $row['id'];
                        $regged = true;
                        //include ("views/content.blade.php");
                        //подключаем шаблон
                    }

                } else
                {
                    return "некорректно введены данные";
                }
            } else
            {
                $this->view();
            }
        }
        return true;
    }



}