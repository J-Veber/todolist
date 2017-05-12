<?php
namespace TodoList\Controllers;

abstract class BaseController
{
    protected $_registry;
    protected $_template;
    protected $_layouts; //шаблон
    public $vars = array();
    function __construct()
    {    }
    abstract function actionIndex();
}