<?php
class Index_Controller extends Base_Controller
{
    public $layouts = 'index.blade.php';

    function index()
    {
        $model = new UserModel();
        $userInfo = $model->getUser();
        $this->template->vars('userInfo', $userInfo);

        $this->template->view('index');
    }
}