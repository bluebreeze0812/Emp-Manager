<?php

//generate a random 4 bit hexidecimal number.
$checkcode = "";
for ($i = 0; $i < 5; $i++) {
    $checkcode .= dechex(rand(0, 15));
}

//store the checkcode to session
session_start();
$_SESSION['checkcode'] = $checkcode;

//create a image and allocate color
$im = imagecreatetruecolor(100, 40);
$white = imagecolorallocate($im, 255, 255, 255);

//draw the checkcode to image
imagestring($im, rand(4, 5), rand(0, 65), rand(0, 20), $checkcode, $white);

//draw some confusion lines
for ($i = 0; $i < 5; $i++) {
    imageline($im, 0, rand(0, 40), 100, rand(0, 40), imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255)));
}

//print the image to browser
header("content-type: image/gif");
imagegif($im);

//destory image
imagedestroy($im);


?>