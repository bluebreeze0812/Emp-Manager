<?php
require_once '/program/ZendStudio/project/mysql/tool/SqlTool.class.php';

class PageSplit {
    private $arr_chunked;
    private $rowCount;
    private $pageSize;
    private $pageCount;
    private $pageNow;
    
    //get mysql connection in construct function
/*     function __construct() {
        $this->sqlTool = new SqlTool();
        $this->sqlTool->connect('localhost', 'root', 'root', 'mydb');
    } */
    
/*     function page_split($tableName, $pageSize, $pageNow) {
        $this->tableName = $tableName;
        $this->pageSize = $pageSize;
        $this->pageNow = $pageNow;
        
        //get the number of rows
        $sql = "select count(name) from $tableName";
        $arr = $this->sqlTool->return_result($sql);
        $this->rowCount = $arr[0][0];
        
        //get the number of pages after calculation
        $this->pageCount = ceil($this->rowCount / $this->pageSize);
        
        //get and return the data that should show in this page
        $sql2 = "select * from {$this->tableName} limit " . ($this->pageNow - 1) * $this->pageSize . ", {$this->pageSize}";
        $arr2 = $this->sqlTool->return_result($sql2);
        return $arr2;
    } */
    
    function chunk($arr, $pageSize) {
        $this->pageSize = $pageSize;
    
        //get the number of rows
        $this->rowCount = count($arr);
    
        //get the number of pages after calculation
        $this->pageCount = ceil($this->rowCount / $this->pageSize);
    
        //chunk the input arr
        $this->arr_chunked = array_chunk($arr, $pageSize);
    }
    
    function get_pageCount() {
        return $this->pageCount;
    }
    
    function get_data_by_page($pageNow) {
        $arr = $this->arr_chunked[$pageNow];
        return $arr;
    }

    //shut down connection
/*     function __destruct() {
        $this->sqlTool->disconn();
    } */
}
?>