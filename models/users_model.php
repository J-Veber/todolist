<?php
include ('base_model.php');

class Users_Model extends Base_Model
{
    protected $_user_id;
    protected $_user_name;
    protected $_user_password;
    protected $_user_email;


    public function __construct($id, $name, $passw, $email)
    {
        $modelName = get_class($this);
        $arrExpr = explode('_', $modelName);
        $tableName = strtolower($arrExpr[0]);
        $this->_table = $tableName;

        $this->_user_id = $id;
        $this->_user_name = $name;
        $this->_user_password = $passw;
        $this->_user_email = $email;
    }

    /**
     * @return string
     */
    public function save()
    {
        try
        {
            DB::insert($this->_table, array(
                'id' => $this->_user_id,
                'name' => $this->_user_name,
                'password' => md5(md5(trim($this->_user_password))),
                'email' => $this->_user_email
            ));
        } catch(MeekroDBException $e)
        {
            return 'Error : ' . $e->getMessage() . '<br/>Error sql : ' . "'INSERT INTO $this->_table (id, name, passw, email) VALUES (*some values)'";
        }
        return true;
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

    public function findById($id)
    {
        try
        {
            $mysqli_result = DB::query("SELECT * FROM $this->_table WHERE id=%i" , $id);
            return $mysqli_result;
        } catch (MeekroDBException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "FIND user WHERE id = $id";
            exit();
        }
    }

    public function findByLoginAndPassw($login, $passw)
    {
        try
        {
            $mysqli_result = DB::query("SELECT * FROM $this->_table WHERE $login=%s" , $login, "$passw=%s", md5(md5($passw)));
            return $mysqli_result;
        } catch (MeekroDBException $e)
        {
            return 'Error : ' . $e->getMessage() . "<br/>Error sql : " . "FIND user WHERE login = $login and passw = $passw";
        }
    }

    public function findByEmail($email)
    {
        try
        {
            $mysqli_result = DB::query("SELECT * FROM $this->_table WHERE $email=%s" , $email);
            return $mysqli_result;
        } catch (MeekroDBException $e)
        {
            return 'Error : ' . $e->getMessage() . "<br/>Error sql : " . "FIND user WHERE email = $email";
        }
    }

    public function print()
    {
        return "Name: " . $this->_user_name . ". ";
    }

    public function fieldsTable()
    {
        return array(
            "_user_id" => "id",
            '_user_login' => 'name',
            '_user_email' => 'email',
            '_user_password' => 'password'
        );
    }

    public function arrFieldsValue()
    {
        return array(
            $this->_user_id, $this->_user_name, $this->_user_password, $this->_user_email
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