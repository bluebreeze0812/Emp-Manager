<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="utf-8">
<link rel="stylesheet" href="./css/login.css">
<title>Login</title>
</head>
<body>
<fieldset class="login_fieldset">

<legend>Login</legend>

<div class="login_div">

<form action="../controller/login-process.php" method="post">
<p>
<label for="username">Username:&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="username" id="username" value="<?php echo $_COOKIE['username']; ?>">
</p>

<p>
<label for="password">Password:&nbsp;&nbsp;&nbsp;</label>
<input type="password" name="password" id="password" value="<?php echo $_COOKIE['password']; ?>">
</p>

<p>
<label for="password">Checkcode:&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="checkcode" id="checkcode">
</p>

<p>
<img alt="checkcode" src="../model/checkcode.class.php" align="right" onclick="this.src='../model/checkcode.class.php?'+Math.random()">
</p>

<br>

<p>
<input type="checkbox" name="save_user" checked>save name and password
</p>

<p>
<font color='red'>
<?php 
//the login process is unsuccessful
if (isset($_GET['errno'])) {
    $errno = $_GET['errno'];
    if ($errno == 1) {
        //write a error message before the submit button
        echo "Username and password can NOT be null&nbsp;";
    } elseif ($errno == 2) {
        echo "Checkcode is wrong&nbsp;";
    }
}
?>
</font>
<input type="submit" value="login">
</p>
</form>

</div>

</fieldset>
</body>
</html>