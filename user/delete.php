<?php 


error_reporting(0);


//connect to db
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


$email = "";
$password = "";



if (isset($_POST['delete'])){

$email = $_POST['email'];
$password = $_POST['password'];



$cpassmd = md5($password); //this will encrypt the password

$getpass = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$pass = $getpass->fetch_assoc();

$currentpass = $pass['pwd'];

// echo $currentpass."  ";

// echo $cpassmd;


if ($currentpass != $cpassmd) {
	session_start();
	$_SESSION['wrongpass'] = "wrong password";

	header('location: ../deleteprofile.php');

} else {

	session_start();
	$_SESSION['deletesuccess'] = "Profile deleted.";
	
	$mysqli->query("DELETE FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);
	$mysqli->query("DELETE FROM `appoitments` WHERE `from`='$email'") or die($mysqli->error);
	//$mysqli->query("DELETE FROM `blooddrive` WHERE `user`='$email'") or die($mysqli->error);
	$mysqli->query("DELETE FROM `message` WHERE `email`='$email'") or die($mysqli->error);
	$mysqli->query("DELETE FROM `request` WHERE `email`='$email'") or die($mysqli->error);
	$mysqli->query("DELETE FROM `uploadtoadmin` WHERE `from`='$email'") or die($mysqli->error);
	
	unset($_SESSION['email']);
	header('location: ../index.php');
	
}




}

