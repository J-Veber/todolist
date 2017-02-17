<?php
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
}