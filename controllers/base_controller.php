<?php
abstract class Base_Controller
{
    protected $_registry;
    protected $_template;
    protected $_layouts; //шаблон

    public $vars = array();

    function __construct($registry)
    {
        $this->_registry = $registry;

        $this->_template = new Template($this->_layouts, get_class($this));
    }

    abstract function main();
}