<?php

class SqlTool {
    private $host, $un, $pw, $dbn, $mysqli;
    
    function connect($host, $un, $pw, $dbn) {
        $this->host = $host;
        $this->un = $un;
        $this->pw = $pw;
        $this->dbn = $dbn;
        
        $this->mysqli = new mySqli($host, $un, $pw, $dbn);
        
        if ($this->mysqli->connect_error) {
            die($this->mysqli->connect_error);
        }
    }
    
    function exec_dql($sql) {
        $res = $this->mysqli->query($sql);
        $res_arr = $res->fetch_assoc();
        
        foreach ($res_arr as $key => $val) {
            echo "$key---$val";
            echo "<br>";
        }
        
        $res->free();
    }
    
    function return_result($sql) {
        $res = $this->mysqli->query($sql);
        $res_arr = array();
        if ($res) {
            $res_arr = $res->fetch_all($resulttype = MYSQLI_BOTH);
            //$res->free();
            return $res_arr;
        } else {
            //$res->free();
            echo "FAILED".$this->mysqli->error;
        } 
    }
    
    function exec_dml($sql) {
        $res = $this->mysqli->query($sql);
        if ($res) {
            echo "OK";
        } else {
            echo "FAILED ".$this->mysqli->error;
        }
    }
    
    function just_do($sql) {
        $res = $this->mysqli->query($sql);
        return $res;
    }
    
    function multi_dql($sqls) {
        if ($this->mysqli->multi_query($sqls)) {
            do {
                if ($res = $this->mysqli->store_result()) {
                    $res_arr = $res->fetch_assoc();
                    foreach ($res_arr as $key => $val) {
                        echo "$key ---$val";
                        echo '<br>';
                    }
                    $res->free();
                }
                if ($this->mysqli->more_results()) {
                    echo "---------------------------------<br>";
                }
                
            } while ($this->mysqli->next_result());
        }
    }
    
    function multi_dml($sqls) {
        if ($this->mysqli->multi_query($sqls)) {
            echo "OK";
        } else {
            echo "FAILED ".$this->mysqli->error;
        }
    }
    
    function showAll($show) {
        if ($res = $this->mysqli->query($show)) {
            echo "<table border='1'><tr>";
            while ($info = $res->fetch_field()) {
                echo "<th>{$info->name}</th>";
            }
            echo "</tr>";
            while ($row = $res->fetch_row()) {
                echo "<tr>";
                foreach ($row as $val) {
                    echo "<td>{$val}</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        $res->free();
    }
    
    function disconn() {
        $this->mysqli->close();
    }
    
}

?>