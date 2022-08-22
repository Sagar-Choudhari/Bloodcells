<?php


$uid = 0;


$message = '';



if (isset($_POST['sendappoit'])){


$uid = $_POST['uid'];
$replied = "YES";
//msg
$message = $_POST['umessage'];


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$entermsg = $mysqli->query("UPDATE `appoitments` SET `replied`='$replied',`reply`='$message' WHERE `id`='$uid'") or die($mysqli->error);


	session_start();
	$_SESSION['appoit'] = "Message sent successfully.";
	$_SESSION['appoit_type'] = "success";

	header("location: ../appoitment.php");

}




if (isset($_GET['edit'])) {

	$uid = $_GET['edit'];

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM `appoitments` WHERE `id`='$uid'") or die($mysqli->error());
	$row = $result->fetch_array();
	$email = $row['from'];

	$getuserdata = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error());
	
	$udata = $getuserdata->fetch_array();
	$fname = $udata['fname'];
	$lname = $udata['lname'];

	//echo $email;
	//echo $name ;
	$_SESSION['replyappoit'] = "reply";
	
}



?>
