<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;


if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM `request` WHERE `id`='$id'") or die($mysqli->error());

	session_start();
	$_SESSION['rqst'] = "Request has been deleted successfully!!";
	$_SESSION['rqst_type'] = "danger";

	header("location: ../requests.php");

}



?>