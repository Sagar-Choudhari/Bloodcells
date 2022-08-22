<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = '';
$from = '';
$date = '';
$purpose= '';
$subject = '';
$message = '';



if (isset($_POST['appoitment'])){

if (isset($_POST['appoitment'])){

$from = $_POST['uemail'];
$date = date('Y-m-d');
$purpose= $_POST['purpose'];
$subject = $_POST['subject'];
$message = $_POST['message'];

session_start();
$_SESSION['sentappoit'] = "sent";


	header("location: ../appoitments.php");


$mysqli->query("INSERT INTO `appoitments` (`from`, `date`, `purpose`, `subject`, `message`) VALUES ('$from','$date','$purpose','$subject','$message')") or die($mysqli->error());

}

else {
session_start();
	$_SESSION['errorsent'] = "not sent";

	header("location: ../appoitments.php");

}

}



if (isset($_GET['delete'])) {

	$id = $_GET['delete'];


	session_start();
	$_SESSION['appoitcancel'] = "deleted";


	$mysqli->query("DELETE FROM `appoitments` WHERE `id`=$id") or die($mysqli->error());

	
	header("location: ../appoitments.php");

}elseif ($mysqli->error) {	

	$_SESSION['errorcancel'] = "error in delete";
	
	header("location: ../appoitments.php");

}


?>
