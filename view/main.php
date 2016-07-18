<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="utf-8">
<link rel="stylesheet" href="./css/main.css">
<title>Welcome</title>
</head>
<body>
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>
<?php require_once '/program/ZendStudio/project/emp-manage2.0/model/some-function.php';?>
<div class="main_div">
<h1>Welcome</h1>
<?php get_last_visit(); ?>
<a href='../controller/crud.php?operate=read&type=all'>employee management</a>
<br>
<a href='add-emp.php'>add new employee</a>
<br>
<a href='search-emp.php'>search employee</a>
<br>
<a href='login.php'>logout</a>
</div>
</body>
</html>