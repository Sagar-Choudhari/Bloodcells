<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;


if (isset($_GET['delete'])) {

	$id = $_GET['delete'];

	$mysqli->query("DELETE FROM `appoitments` WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['deleted'] = "deleted";


	header("location: ../msgfromadmin.php");

}



?>