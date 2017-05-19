<?php
namespace TodoList\Models;

use PDOException;

class Tasks_Model extends Base_Model
{
    protected $_user_login;
    protected $_task_text;
    protected $_task_id;
    protected $_task_done;
    protected $_db;
    protected $_app;

    public function __construct($inputApp)
    {
        parent::__construct($inputApp);

        $this->_user_login = "";
        $this->_task_text = "";
        $this->_task_id = "";
        $this->_task_done = "";

        $this->_app = $inputApp;
        $this->_db = $inputApp->getService('PDO');
    }

    public function setUsername($username)
    {
        $this->_user_login = $username;
    }

    public function setTaskText($data)
    {
        $this->_task_text = $data;
    }

    public function setTaskId($data)
    {
        $this->_task_id = $data;
    }

    public function setTaskDone($data)
    {
        $this->_task_done = $data;
    }

    public function fieldsTable()
    {
        return array(
            '_task_id' => 'id',
            '_user_id' => 'user_id',
            '_task_text' => 'task_content',
            '_task_done' => 'done'
        );
    }

    public function getALLTasks()
    {
        if (isset($_SESSION['test']))
        {
            $stmt = $this->_db->prepare('SELECT * FROM tasks WHERE user_name=?;');
            $stmt->execute(array($_SESSION['username']));
            return json_encode($stmt->fetchAll());
        }
    }

    public function save()
    {
        try
        {
            $stmt = $this->_db->prepare('INSERT INTO tasks(user_id, task_text, user_name) VALUES (1, :task_text, :user_name);');
            $stmt->execute(array('task_text' => $this->_task_text, 'user_name' => $this->_user_login));
            return true;
        } catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }

    public function delete()
    {
        try
        {
            $stmt = $this->_db->prepare('DELETE FROM tasks WHERE task_id = :task_id;');
            $stmt->execute(array('task_id'=> $this->_task_id));
        } catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }

    public function updateTask()
    {
        try
        {
            $stmt = $this->_db->prepare('UPDATE tasks SET task_done = :task_done WHERE task_id = :task_id;');
            $stmt->execute(array('task_done' => $this->_task_done, 'task_id' => $this->_task_id));
        } catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }

    public function deleteAllTasks()
    {
        try
        {
            $stmt = $this->_db->prepare('DELETE FROM tasks WHERE task_done = 1;');
            $stmt->execute();
        } catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }
}