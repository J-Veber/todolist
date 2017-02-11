<?php
class Template
{
    private $_template;
    private $_contoller;
    private $_layouts;
    private $_vars = array();

    function __construct($layouts, $controllerName)
    {
        $this->_layouts = $layouts;
        $arr = explode('_', $controllerName);
        $this->_contoller = strtolower($arr[1]);
    }

    //устанавливаем переменные для отображения
    function vars($varName, $value)
    {
        if(isset($this->_vars[$varName]))
        {
            trigger_error('Unable to set var `' . $varName
            . '`. Already set, ans overwrite not allowed.',
                E_USER_NOTICE);

            return false;
        }
        $this->_vars[$varName] = $value;
        return true;
    }

    function view($name)
    {
        $pathLayout = SITE_PATH . 'views' . DS .
            'layouts' . DS . $this->_layouts . 'php';
        $contentPage = SITE_PATH . 'views' . DS . $this->_contoller .
            DS . $name . 'php';

        if(!file_exists($pathLayout))
        {
            trigger_error('Layout `' . $this->_layouts .
                '` does not exist.', E_USER_NOTICE);
            return false;
        }
        if(!file_exists($contentPage))
        {
            trigger_error ('Template `' . $name .
                '` does not exist.', E_USER_NOTICE);
            return false;
        }

        foreach ($this->_vars as $key => $value)
        {
            $$key = $value;
        }

        include ($pathLayout);
    }
}