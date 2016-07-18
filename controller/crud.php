<?php
require_once '/program/ZendStudio/project/emp-manage2.0/model/emp-service.class.php';
require_once '/program/ZendStudio/project/emp-manage2.0/model/page-split.class.php';
require_once '/program/ZendStudio/project/emp-manage2.0/model/display-table.class.php';
require_once '/program/ZendStudio/project/emp-manage2.0/model/display-navigator.class.php';

$empService = new EmpService();

$pageSplit = new PageSplit();

$displayTable = new DisplayTable();

$displayNavigator = new DisplayNavigator();

if (isset($_GET['operate'])) {
    $operate = $_GET['operate'];
} else {
    header("Location: ../view/go-back-home.php");
    exit();
}

if ($operate == 'create') {
    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $grade = $_POST['grade'];
    $salary = $_POST['salary'];
    
    $res = $empService->create($name, $password, $grade, $salary);
    
    if ($res) {
        //operate success
        header("Location: ../view/feedback-success.php?feedback=CREATE");
        exit();
    } else {
        //operate failed
        header("Location: ../view/feedback-fail.php?feedback=CREATE");
        exit();
    }
    
} elseif ($operate == 'read') {
    
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        
        $pageSize = 10;
        
        if (isset($_GET['pageNow'])) {
            $pageNow = $_GET['pageNow'];
        } elseif (isset($_GET['goto_pageNow'])) {
            $pageNow = $_GET['goto_pageNow'] - 1;
        } else {
            $pageNow = 0;
        }
        
        if ($type == 'id') {
            //want to search user by id
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $sql = "select * from manage_system_emp where id='{$id}';";
                
                //get the result array
                $arr = $empService->get_raw_arr($sql);
                
                //write the result array to session so that when I click other page, I can get to there.
                session_start();
                $_SESSION['search_id'] = $arr;                
            } else {
                session_start();
                $arr = $_SESSION['search_id'];
            }

            //chunk the result arr by pageSize
            $pageSplit->chunk($arr, $pageSize);
            
            //get the subarr that I want to use
            $data = $pageSplit->get_data_by_page($pageNow);
            
            $pageCount = $pageSplit->get_pageCount();
            
            $displayTable->display($data);
            
            $displayNavigator->display($type, $pageCount, $pageNow);
            
        } elseif ($type == 'name') {
            //want to search user by name
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $sql = "select * from manage_system_emp where name='{$name}';";
                
                //get the result array
                $arr = $empService->get_raw_arr($sql);
                
                //wirte the result array to session so that I can implement page split
                session_start();
                $_SESSION['search_name'] = $arr;
            } else {
                session_start();
                $arr = $_SESSION['search_name'];
            }

            
            //chunk the result arr by pageSize
            $pageSplit->chunk($arr, $pageSize);
            
            //get the subarr that I want to use
            $data = $pageSplit->get_data_by_page($pageNow);
            
            $pageCount = $pageSplit->get_pageCount();
            
            $displayTable->display($data);
            
            $displayNavigator->display($type, $pageCount, $pageNow);
            
        } elseif ($type == 'all') {
            //want to show all info from manage_system_emp table
            $sql = "select * from manage_system_emp;";
            
            //get the result array
            $arr = $empService->get_raw_arr($sql);
            
            //chunk the result arr by pageSize
            $pageSplit->chunk($arr, $pageSize);
            
            //get the subarr that I want to use
            $data = $pageSplit->get_data_by_page($pageNow);
            
            $pageCount = $pageSplit->get_pageCount();
            
            $displayTable->display($data);
            
            $displayNavigator->display($type, $pageCount, $pageNow);
            
        } else {
            header("Location: ../view/go-back-home.php");
            exit();
        }
        
    } else {
        header("Location: ../view/go-back-home.php");
        exit();
    }
    
} elseif ($operate == 'update') {
    
    $id = $_GET['id'];
    
    if (isset($_POST['update_fulfil'])) {
        //this request is contains a update data form
        $name = $_POST['name'];
        $password = $_POST['password'];
        $grade = $_POST['grade'];
        $salary = $_POST['salary'];
        
        $res = $empService->update($id, $name, $password, $grade, $salary);
        
        if ($res) {
            //operate success
            header("Location: ../view/feedback-success.php?feedback=UPDATE");
            exit();
        } else {
            //operate failed
            header("Location: ../view/feedback-fail.php?feedback=UPDATE");
            exit();
        }
        
    } else {
        //I want to send user to fulfil the update data form
        header("Location: ../view/emp-update.php?id={$id}");
        exit();
    }
    
} elseif ($operate == 'delete') {
   
    //check whether there is a id contained in the request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        return false;
    }
    
    $res = $empService->delete($id);
    
    if ($res) {
        //operate success
        header("Location: ../view/feedback-success.php?feedback=DELETE");
        exit();
    } else {
        //operate failed
        header("Location: ../view/feedback-fail.php?feedback=DELETE");
        exit();
    }
    
} else {
    header("Location: ../view/go-back-home.php");
    exit();
}

?>