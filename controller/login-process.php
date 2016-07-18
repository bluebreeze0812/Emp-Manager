<?php
require_once '/program/ZendStudio/project/emp-manage2.0/model/admin-service.class.php';

//receive user input
$username = $_POST['username'];
$password = $_POST['password'];

//check whether user want to save login info
if (isset($_POST['save_user'])) {
    //save login info for 2 weeks
    setcookie("username", $username, time() + 60*60*24*14, "/");
    setcookie("password", $password, time() + 60*60*24*14, "/");
} else {
    //delete login info that already stored in cookie
    if (isset($_COOKIE['username'])) {
        setcookie("username", $username, time() - 1, "/");
    }
    
    if (isset($_COOKIE['password'])) {
        setcookie("password", $password, time() - 1, "/");
    }
}

//ready for user validate
$adminService = new AdminService();

if ($adminService->check_user($username, $password)) {
    //user is legel
    header("Location: ../view/main.php");
    exit();
} else {
    //user is ilegel
    header("Location: ../view/login.php?errno=1");
    exit();
}

?>