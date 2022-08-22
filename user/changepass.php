<?php 


error_reporting(0);


//connect to db
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


$email = "";
$cpass = "";
$password1 = "";
$password2 = "";


if (isset($_POST['changepassword'])){

$email = $_POST['email'];
$cpass = $_POST['cpass'];
$password1 = $_POST['pwd'];
$password2 = $_POST['pwd2'];


//pass validation
if($password1 != $password2){
	session_start();
	//echo "Password does not match";
	$_SESSION['wrongmatch'] = "Passwords does not match.";
	header('location: ../password.php');

} else{



$cpassmd = md5($cpass); //this will encrypt the password

$getpass = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$pass = $getpass->fetch_assoc();

$currentpass = $pass['pwd'];

// echo $currentpass."  ";

// echo $cpassmd;


if ($currentpass != $cpassmd) {
	session_start();
	$_SESSION['wrongpass'] = "wrong password";

	header('location: ../password.php');

} else {

$password = md5($password1); //this will encrypt the password


	session_start();
	$_SESSION['passchange'] = "Password changed";
	
	$mysqli->query("UPDATE `user_reg` SET `pwd`='$password' WHERE `email`='$email'") or die($mysqli->error);
	
	
	header('location: ../password.php');
	
}


} 

}

