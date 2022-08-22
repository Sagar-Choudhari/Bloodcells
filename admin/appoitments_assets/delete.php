<?php



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$message = '';




if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM `appoitments` WHERE `id`=$id") or die($mysqli->error());

	session_start();
	$_SESSION['appoit'] = "Appoitment has been canceled successfully!!";
	$_SESSION['appoit_type'] = "danger";


	header("location: ../appoitment.php");

}



?>