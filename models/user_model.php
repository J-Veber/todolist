<?php
class UserModel extends BaseModel
{
    public $_users_id;
    public $_users_login;
    public $_users_password;

    public function fieldsTable()
    {
        return array(
            '_users_id' => 'id',
            '_users_login' => 'login',
            '_users_password' => 'password'
        );
    }
}