<!DOCTYPE html>
<html>
<head>
<meta http-equiv="charset" content="UTF-8">
<title>Failed</title>
</head>
<body>
<div align="center">
<?php require_once '/program/ZendStudio/project/emp-manage2.0/controller/anti-hotlink.php';?>

<?php 
    if (isset($_GET['feedback'])) {
        $feedback = $_GET['feedback'];
    } else {
        header("Location: go-back-home.php");
    }
    
    echo "<h1>{$feedback}&nbsp;</h1>";
    
    //get the referer info (back to the previous page)
    $referer = $_SERVER['HTTP_REFERER'];
    
?>
<h1>FAILED</h1>
<a href="../controller/crud.php?operate=read&type=all">back</a>
</div>
</body>
</html>