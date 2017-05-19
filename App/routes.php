<?php

return array(
    '' => 'auth/home',
    'todos' => 'content/index',
    'registration' => 'auth/registration',
    'login' => 'auth/login',
    'reset_passw' => 'auth/reset',
    '404' => 'auth/error',

    'api/registration' => 'auth/registrationResponse',

    'api/login' => 'auth/loginResponse',

    'api/todos/addTask' => 'content/addTask',
    'api/todos/returnAllTasks' => 'content/loadTasks',
    'api/todos/removeTask' => 'content/removeTask',
    'api/todos/removeAllCompletedTask' => 'content/removeAllCompletedTask',
    'api/todos/toggleComplete' => 'content/toggleCompleteTask',
    'api/todos/editTask' => 'content/editTask',
    'api/todos/closeSession' => 'auth/closeSession'
);