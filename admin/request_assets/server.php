<?php


$id = 0;
$replied = "";
$reply = "";




if (isset($_GET['edit'])){

	$rid = $_GET['edit'];

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$getrdata = $mysqli->query("SELECT * FROM `request` WHERE `id`='$rid'") or die($mysqli->error());
	
	$getr = $getrdata->fetch_array();
	$fname = $getr['fname'];
	$lname = $getr['lname'];
	$bg = $getr['bgroup'];
	$gender = $getr['gender'];
	$age = $getr['age'];
	$email = $getr['email'];
	$mobile = $getr['mobile'];
	$city = $getr['city'];
	$rqrdate = $getr['required_date'];
	$rstdate = $getr['requested_date'];
	$details = $getr['details'];

	$_SESSION['helpuser'] = "help";
}

if (isset($_POST['reply'])){

	$id = $_POST['id'];
	$replied = $_POST['replied'];
	$reply = $_POST['help'];

	
	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$help = $mysqli->query("UPDATE `request` SET `replied`='$replied',`reply`='$reply' WHERE `id`='$id'") or die($mysqli->error);


	session_start();
	$_SESSION['rqst'] = "Message sent successfully.";
	$_SESSION['rqst_type'] = "success";

	header("location: ../requests.php");


}


?>