<?php 

session_start();


if (isset($_POST['submit'])){

	$email = $_POST['email'];
	$mobno = $_POST['mobno'];
	$password1 = $_POST['pwd'];
	$password2 = $_POST['pwd2'];

	//form validation

	if($password1 != $password2){
		$_SESSION['pwdnotmatch'] = "Passwords does not match.";
		header("location: register.php");
	};



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM user_reg WHERE email = '$email' or mobno = '$mobno' LIMIT 1") or die($mysqli->error);

$row = $result->fetch_assoc();


if($row){
	if($row['email'] === $email){
		$_SESSION['emailexist'] = "Email already exist";
	}
	if($row['mobno'] === $mobno){
		$_SESSION['phoneexist'] = "Phone number already exist";
	}

header("location: register.php");
}

}

 ?>