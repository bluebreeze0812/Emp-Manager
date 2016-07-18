<?php
require_once '/program/ZendStudio/project/mysql/tool/SqlTool.class.php';

class EmpService {
    private $sqlTool;
    
    function __construct() {
        $this->sqlTool = new SqlTool();
        $this->sqlTool->connect('localhost', 'root', 'root', 'mydb');
    }
    
    function delete($id) {
        $sql = "delete from manage_system_emp where id='{$id}';";
        if ($this->sqlTool->just_do($sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function update($id, $name, $password, $grade, $salary) {
        $sql = "update manage_system_emp set name='{$name}', password='{$password}', grade='{$grade}', salary='{$salary}' where id='{$id}';";
        if ($this->sqlTool->just_do($sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function get_empinfo($id) {
        $sql = "select name, password, grade, salary from manage_system_emp where id={$id};";
        $arr = $this->sqlTool->return_result($sql);
        return $arr;
    }
    
    function create($name, $password, $grade, $salary) {
        $sql = "insert into manage_system_emp (name, password, grade, salary) values ('{$name}', '{$password}', '{$grade}', '{$salary}');";
        
        if ($this->sqlTool->just_do($sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function get_raw_arr($sql) {
        $arr = $this->sqlTool->return_result($sql);
        return $arr;
    }
    
    function __destruct() {
        $this->sqlTool->disconn();
    }
}
?>