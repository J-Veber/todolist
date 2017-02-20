<?php
use \Delight\Auth;

include '../index.php';

if (isset($_POST['submit']))
{
    $err = array();

    if (!preg_match("~^[a-zA-Z0-9]{6-19}$~" , $_POST['username']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр. 
        Длина логина должна быть от 6 до 19 символов.";
    }

//    $query =
}