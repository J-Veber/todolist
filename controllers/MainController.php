<?php
include_once "BaseController.php";
class MainController extends BaseController
{
    public $_layouts = 'index.php';

    function actionIndex()
    {
        echo 'Hello from my MVC system';
        return true;
//        $model = new UserModel();
//        $userInfo = $model->getUser();
//        $this->_template->vars('userInfo', $userInfo);
//
//        $this->_template->view('main');
    }

}