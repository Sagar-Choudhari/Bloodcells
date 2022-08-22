<?php





$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$camp = '';
$user = '';
$drive = '';
$details = '';



if (isset($_POST['submitdrive'])){

	$camp = $_POST['camps'];
	$user = $_POST['user'];
	$drive = $_POST['nosunits'];
	$details = $_POST['details'];


	$getuserbg = $mysqli->query("SELECT `bgroup` FROM `user_reg` WHERE `email` ='$user'") or die($mysqli->error);
  	$getbg = $getuserbg->fetch_assoc();

  	$bg = $getbg['bgroup'];

	session_start();
	$_SESSION['msgdrive'] = "New drive has been posted successfully.";
	$_SESSION['msgdrive_type'] = "success";


	$mysqli->query("INSERT INTO blooddrive (campaign,user,bloodgroup,drives,details) VALUES('$camp','$user','$bg','$drive','$details')") or 
			die($mysqli->error);


	header("location: ../index.php");

}


?>