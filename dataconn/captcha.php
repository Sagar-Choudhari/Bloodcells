<?php 
session_start(); 

$md5_hash = md5(rand(0,999));
$text = substr($md5_hash, 15,5);
//$text = rand(10000,99999); 
$_SESSION["vercode"] = $text; 
$height = 30; 
$width = 65;   
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 222, 222, 222); 
$white = imagecolorallocate($image_p, 80, 80, 80); 
$font_size = 50; 
imagestring($image_p, $font_size, 10, 7, $text, $white); 
imagejpeg($image_p, null, 80); 
?>
