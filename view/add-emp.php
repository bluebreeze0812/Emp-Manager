<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="UTF-8">
<link rel="stylesheet" href='./css/add-emp.css'>
<title>Add</title>
</head>
<body>
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>

<fieldset class="add_field">
<legend>Add</legend>
<div class="add_div">

<form action="../controller/crud.php?operate=create" method="post">
<p>
<label for="name">name:</label>
<input type="text" name="name" id="name">
</p>

<p>
<label for="password">password:&nbsp;&nbsp;</label>
<input type="text" name="password" id="password">
</p>

<p>
<label for="grade">grade:</label>
<input type="text" name="grade" id="grade">
</p>

<p>
<label for="salary">salary:</label>
<input type="text" name="salary" id="salary">
</p>

<p>
<input type="submit" value="add">
</p>
</form>

</div>
</fieldset>

</body>
</html>