<?php
require_once '/program/ZendStudio/project/mysql/tool/SqlTool.class.php';

class AdminService {
    
    private $sqlTool;
    
    //get the mysql connection in the construct function
    function __construct() {
        $this->sqlTool = new SqlTool();
        $this->sqlTool->connect('localhost', 'root', 'root', 'mydb');
    }
    
    function check_user($username, $password) {
        //user has not fufill the input
        if ($username == null || $password == null) {
            return false;
        } else {
            //get the true password that stored in the database
            $sql = "select password from manage_system_admin where name = '$username';";
            $arr = $this->sqlTool->return_result($sql);
            $password_valid = $arr[0][0];
            
            if ($password == $password_valid) {
                //user is legel
                return true;
            } else {
                //user is ilegel
                return false;
            }
        }
    }
    
    //disconnect the mysql connection in the destruct function
    function __destruct() {
        $this->sqlTool->disconn();
    }
    
}
?>