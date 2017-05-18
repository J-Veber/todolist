<?php
namespace TodoList\Models;
use DB;

class Tasks_Model extends Base_Model
{
    public $_task_id;
    public $_user_id;
    public $_task_text;
    public $_task_done;

    public function fieldsTable()
    {
        return array(
            '_task_id' => 'id',
            '_user_id' => 'user_id',
            '_task_text' => 'task_content',
            '_task_done' => 'done'
        );
    }

    function save()
    {
        try
        {
            DB::insert($this->_table, array(
                'user_id' => $this->_user_id,
                'task_text' => $this->_task_text,
                'task_done' => $this->_task_done,
            ));
        } catch(MeekroDBException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'INSERT INTO $this->_table (user_id, task_text, task_done) VALUES (*some values)'";
            exit();
        }
    }

    function arrFieldsValue()
    {
        // TODO: Implement arrFieldsValue() method.
    }
}