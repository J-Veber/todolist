<?php
namespace TodoList\Models;

use PDOException;

class Users_Model extends Base_Model
{
    protected $_user_id;
    protected $_user_name;
    protected $_user_password;
    protected $_user_email;
    protected $_db;
    protected $_app;

    public function __construct($inputApp)
    {
        $this->_user_id = "";
        $this->_user_name = "";
        $this->_user_password = "";
        $this->_user_email = "";
        //$this->_app = $inputApp;
        $this->_db = $inputApp->getService('PDO');
    }

    public function setParams($name, $passw, $email)
    {
        $this->_user_name = $name;
        $this->_user_password = sha1($passw);
        $this->_user_email = $email;
    }

    public function setName($name)
    {
        $this->_user_name = $name;
    }

    public function setPassword($passw)
    {
        $this->_user_password = $passw;
    }

    public function setEmail($email)
    {
        $this->_user_email = $email;
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

    public function save()
    {
        try
        {
            $stmt = $this->_db->prepare("INSERT INTO user (user_name, user_passw, user_email) VALUES (:username, :password, :email);");
            $stmt->execute(array('username' => $this->_user_name,
                'password' => $this->_user_password,
                'email' => $this->_user_email));
        } catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            //echo '<br/>Error sql : ' . "'INSERT INTO $this->_table (id, name, passw, email) VALUES (*some values)'";
            exit();
        }
    }

    public function updatePassw($newpassw)
    {
        try
        {
            DB::update($this->_table,
                $this->_user_password = $newpassw);
            return true;
        } catch (MeekroDBException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "update user password";
            exit();
        }

    }

    public function deleteById($id)
    {
        try
        {
            DB::delete($this->_table, "id=%i", $id);
        } catch (MeekroDBException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "DELETE user WHERE id = $id";
            exit();
        }
    }


    /*
     * @return true - we can save new user
     * @return false - create msg
     */
    public function findByLogin()
    {
        try
        {
            $stmt = $this->_db->prepare('SELECT * FROM user WHERE user_name=?;');
            $stmt->execute(array($this->_user_name));
            if ($stmt->rowCount() == 0)
            {
                return true;
            } else
            {
                return false;
            }
        } catch (PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
        }
    }

    public function print()
    {
        return "Name: " . $this->_user_name . ". ";
    }

    public function fieldsTable()
    {
        return array(
            "_user_id" => "user_id",
            '_user_login' => 'user_name',
            '_user_email' => 'user_email',
            '_user_password' => 'user_passw'
        );
    }

    public function arrFieldsValue()
    {
        return array(
            $this->_user_id, $this->_user_name, $this->_user_password, $this->_user_email
        );
    }
}