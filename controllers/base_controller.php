<?php
abstract class Base_Controller
{
    protected $registry;
    protected $template;
    protected $layouts; //шаблон

    public $vars = array();

    function __construct($registry)
    {
        $this->registry = $registry;

        $this->template = new Template($this->layouts, get_class($this));
    }

    abstract function index();
}