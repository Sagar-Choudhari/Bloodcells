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





<!-- <?php
// session_start();
// create_image();

// function create_image()
// {
//     // Generating Random Code
//     $md5_hash = md5(rand(0,999));
//     $captcha = substr($md5_hash, 15,5);

//     $_SESSION['captcha'] = $captcha;

//     $width = 200;
//     $height = 50;

//     $image = ImageCreate($width,$height);

//     // Colours
//     $white = imagecolorallocate($image, 255, 255, 255);
//     $black = imagecolorallocate($image, 0, 0, 0);
//     $green = imagecolorallocate($image, 0, 255, 0);
//     $brown = imagecolorallocate($image, 139, 69, 19);
//     $orange = imagecolorallocate($image, 255, 69, 0);
//     $grey = imagecolorallocate($image, 204, 204, 204);

//     // Making Background
//     imagefill($image, 0, 0, $black);

//     // Carving Text into the image
//     $font= "font.ttf";
//     imagettftext($image, 25, 10, 45, 45, $brown, $font, $captcha);

//     // Informing Browser there is a jpeg image file is coming
//     header("Content-Type: image/jpeg");

//     //Converting Image into JPEG
//     //imagejpeg($image);
//     // Clearing Cache
//     //imagedestroy($image);
// }

?> -->