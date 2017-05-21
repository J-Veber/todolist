<?php

$link = mysqli_connect('localhost', 'root', 'passw');

$db_selected = mysqli_select_db($link, 'todomvc_db');

if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = 'CREATE DATABASE todomvc_db';

    mysqli_query($link, $sql);
}

mysqli_close($link);
exec("mysql -uroot -ppassw todomvc_db < src/todomvc_db.sql");