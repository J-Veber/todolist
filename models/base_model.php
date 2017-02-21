<?php

use DB;
abstract class Base_Model
{
    protected $_table;
    protected $_dataResult;

    public function __construct()
    {
        $modelName = get_class($this);
        $arrExpr = explode('_', $modelName);
        $tableName = strtolower($arrExpr[0]);
        $this->_table = $tableName;
    }

    public function getTableName()
    {
        return $this->_table;
    }

    function getAllRows()
    {
        if (!isset($this->_dataResult) OR empty($this->_dataResult))
            return false;
        return $this->_dataResult;
    }

    function getOneRow()
    {
        if (!isset($this->_dataResult) OR empty($this->_dataResult))
            return false;
        return $this->_dataResult[0];
    }

    //получить одну запись
    function fetchOne()
    {
        if (!isset($this->_dataResult) OR empty($this->_dataResult))
            return false;
        foreach ($this->_dataResult[0] as $key => $val)
        {
            $this->$key = $val;
        }
        return true;
    }

    function getRowById($id)
    {
        try
        {
            $db = $this->_db;
            $stmt = DB::query("SELECT * FROM $this->_table WHERE id = $id");
            //$stmt = $db->query("SELECT * FROM $this->_table WHERE id = $id");
            $row = $stmt->fetch();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
        return $row;
    }

    abstract function save();

//    {
//        $arrayAllFields = array_values($this->fieldsTable());
//        print_r($arrayAllFields);
//        echo "----------------------\n";
//        $arraySetField = array();
//        $arrayData = array();
//
//        foreach ($arrayAllFields as $field)
//        {
//            if (!empty($field))
//            {
//                $arraySetField[] = $field;
//                $arrayData[] = $field;
//            }
//        }
//
//        $forQueryFields = implode(', ', $arraySetField);
//        //$rangePlace = implode(', ', );
//        //$rangePlace = array_fill(0, count($arraySetField), '?');
//        $forQueryPlace = implode(', ', $this->arrFieldsValue());
//
//        try
//        {
//            $stmt = DB::query("INSERT INTO $this->_table ($forQueryFields) VALUES ($forQueryPlace);");
//            $result = $stmt->execute($arrayData);
//        } catch(PDOException $e)
//        {
//            echo 'Error : ' . $e->getMessage();
//            echo '<br/>Error sql : ' . "'INSERT INTO $this->_table($forQueryFields) VALUES ($forQueryPlace)'";
//            exit();
//        }
//        return $result;
//    }

    //составление запроса к БД
    private function _getSelect($select)
    {
        if(is_array($select))
        {
            $allQuery = array_keys($select);
            array_walk($allQuery,
                function (&$val)
                {
                    $val = strtoupper($val);
                });

            $querysql = "";
            if(in_array("WHERE", $allQuery))
            {
                foreach ($select as $key => $val)
                {
                    if (strtoupper($key) == "WHERE")
                    {
                        $querysql .= " WHERE " . $val;
                    }
                }
            }

            if(in_array("GROUP", $allQuery))
            {
                foreach ($select as $key => $val)
                {
                    if (strtoupper($key) == "GROUP")
                    {
                        $querysql .= " GROUP BY " . $val;
                    }
                }
            }

            if(in_array("ORDER", $allQuery))
            {
                foreach ($select as $key => $val)
                {
                    if (strtoupper($key) == "ORDER")
                    {
                        $querysql .= " ORDER BY " . $val;
                    }
                }
            }

            if(in_array("LIMIT", $allQuery))
            {
                foreach ($select as $key => $val)
                {
                    if (strtoupper($key) == "LIMIT")
                    {
                        $querysql .= " LIMIT " . $val;
                    }
                }
            }
            return $querysql;
        }
        return false;
    }

    private function _getResult($sql)
    {
        try
        {
            $db = $this->_db;
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll();
            $this->_dataResult = $rows;
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
        return $rows;
    }

    public function deleteBySelect($select)
    {
        $sql = $this->_getSelect($select);
        try
        {
            $db = $this->_db;
            $result = $db->exec("DELETE FROM $this->_table " . $sql);
        } catch (PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'DELETE FROM $this->_table " . $sql . "'";
            exit();
        }
        return $result;
    }

    public function deleteRow()
    {
        $arrayAllFields = array_keys($this->fieldsTable());
        array_walk($arrayAllFields, function (&$val)
        {
            $val = strtoupper($val);
        });

        if (in_array('ID', $arrayAllFields))
        {
            try
            {
                $db = $this->_db;
                $result = $db->exec("DELETE FROM $this->_table WHERE 'id' = $this->id");
                foreach ($arrayAllFields as $onefield)
                {
                    unset($this->$onefield);
                }
            } catch (PDOException $e)
            {
                echo 'Error : ' . $e->getMessage();
                echo '<br/>Error sql : ' . "'DELETE FROM $this->_table WHERE 'id' = $this->id'";
                exit();
            }
        } else
        {
            echo "ID table `$this->_table` NOT FOUND!";
            exit();
        }
        return $result;
    }

    public function update()
    {
        $arrayAllFields = array_keys($this->fieldsTable());
        $arrayForSet = array();
        foreach ($arrayAllFields as $oneField)
        {
            if (!empty($this->$oneField))
            {
                if (strtoupper($oneField) != 'ID')
                {
                    $arrayForSet[] = $oneField . ' = "' . $this->$oneField . '"';
                } else
                {
                    $whereID = $this->$oneField;
                }
            }
        }

        if(!isset($arrayForSet) OR empty($arrayForSet))
        {
            echo "Array data table `$this->_table` empty!";
            exit;
        }

        if(!isset($whereID) OR empty($whereID))
        {
            echo "ID table `$this->_table` not found!";
            exit;
        }

        $strForSet = implode(', ', $arrayForSet);

        try
        {
            $db = $this->_db;
            $stmt = $db->perpare("UPDATE $this->_table SET $strForSet WHERE 'id' = $whereID");
            $result = $stmt->execute();
        } catch (PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            echo '<br/>Error sql : ' . "'UPDATE $this->_table SET $strForSet WHERE 'id' = $whereID'";
            exit();
        }
        return $result;
    }

    abstract function fieldsTable();
    abstract function arrFieldsValue();
}