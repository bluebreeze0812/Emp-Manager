<?php
//pick the broswer referer information
$referer = $_SERVER['HTTP_REFERER'];

//legel request must contain
$correct_link = "emp-manage2.0";
$res = strpos($referer, $correct_link);

if ($res === false) {
    //viewer is trying to hotlink
    header("Location: go-back-home.php");
    exit();
}
?>