<?php
include_once "BaseController.php";
class ContentController extends BaseController
{
    public $_layouts = 'index.php';

    function actionIndex()
    {
        echo 'In ContentController';
        return true;
//        $model = new UserModel();
//        $userInfo = $model->getUser();
//        $this->_template->vars('userInfo', $userInfo);
//
//        $this->_template->view('main');
    }

    function actionEmptyIndex()
    {
        echo 'когда новостей нет';
        return true;
    }

}