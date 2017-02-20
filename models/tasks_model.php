<?php
use baseModel\Base_Model;

class Tasks_Model extends Base_Model
{
    public $_task_id;
    public $_user_id;
    public $_task_text;
    public $task_done;

    public function fieldsTable()
    {
        return array(
            '_task_id' => 'id',
            '_user_id' => 'user_id',
            '_task_text' => 'task_content',
            '_task_done' => 'done'
        );
    }
}