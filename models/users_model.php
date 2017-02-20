<?php
namespace userModel;

use baseModel\Base_Model;

class Users_Model extends Base_Model
{
    protected $_user_id;
    protected $_user_name;
    protected $_user_password;
    protected $_user_email;

    public function fieldsTable()
    {
        return array(
            '_user_id' => 'id',
            '_user_login' => 'name',
            '_user_email' => 'email',
            '_user_password' => 'password'
        );
    }

    public function getUserId()
    {
        return $this->_user_id;
    }

    public function getUserName()
    {
        return $this->_user_name;
    }

    public function getUserPassword()
    {
        return $this->_user_password;
    }

    public function getUserEmail()
    {
        $this->_user_email;
    }

    public function setUserPassword($passw)
    {
        $this->_user_password = $passw;
    }
}