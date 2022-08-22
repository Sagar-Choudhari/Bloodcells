<?php


session_start();

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;

$name = '';
$email = '';
$city ='';
$message = '';
$donated_blood = '';
$date = '';



if (isset($_POST['submitmsg'])){

if (isset($_POST['submitmsg'])){
$name = $_POST['name'];
$email = $_POST['email'];;
$city = $_POST['city'];
$message = $_POST['message'];
$donated_blood = $_POST['radio-stacked'];
$date = date('Y-m-d');



	$_SESSION['msgcontact'] = "true";


	header("location: ../index.php");



	$mysqli->query("INSERT INTO message (name, email, city, message, donated_bld, dateposted) VALUES ('$name','$email','$city','$message','$donated_blood','$date')") or 
			die($mysqli->error);

}

else {

	$_SESSION['errormsg'] = "true";

	header("location: ../index.php");

}
}
?>
