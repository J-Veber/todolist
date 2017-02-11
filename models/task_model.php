<?php
class TaskModel extends BaseModel
{
    public $_task_id;
    public $_user_login;
    public $_task_text;
    public $task_done;

    public function fieldsTable()
    {
        return array(
            '_task_id' => 'id',
            '_user_login' => 'login',
            '_task_text' => 'text',
            '_task_done' => 'done'
        );
    }
}