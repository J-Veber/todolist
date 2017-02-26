<?php
use Klein\Request;
use Klein\Response;

abstract class BaseController
{
    protected $_registry;
    protected $_template;
    protected $_layouts; //шаблон
    public $vars = array();
    function __construct()
    {
        //$this->_registry = $registry;
        //$this->_template = new Template($this->_layouts, get_class($this));
    }
    abstract function actionIndex();

    protected function savetocookie($email, $password)
    {
        setcookie("email", $email, time() + 50000, '/');
        setcookie("password", $password, time() + 50000, '/');
    }
}