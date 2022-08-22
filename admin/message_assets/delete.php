<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$message = '';




if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM message WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['mail'] = "Message has been deleted successfully!!";
	$_SESSION['mail_type'] = "danger";


	header("location: ../message.php");

}



?>