<?php
class Registry
{
    private $_vars = array();

    function set($key, $var)
    {
        if(isset($this->_vars[$key]))
        {
            throw new Exception('Unable to set var `' . $key . 'already set');
        }
        $this->_vars[$key] = $var;
        return true;
    }

    function get($key)
    {
        if (!isset($this->_vars[$key]))
        {
            return null;
        }
        return $this->_vars[$key];
    }

    function remove($key)
    {
        unset($this->_vars[$key]);
    }
}