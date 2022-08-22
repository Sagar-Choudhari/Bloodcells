<?php 
session_start();

error_reporting(0);


if(isset($_POST['update'])){


if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        // "" ;
	$_SESSION['wrongcode'] = "wrong code";

//echo "wrong code";
	header('location: ../editprofile.php');

    } 
 
else{


//connect to db
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


//initialising variables

$id = 0;
$error = 0;
$sessionemail = "";
$fname = "";
$lname = "";
$bloodgroup = "";
$gender = "";
$age = "";
$email = "";
$pincode = "";
$mobno = "";
$state = "";
$district = "";
$city = "";
$password = "";


//get users data
$sessionemail = $_POST['sessionemail'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bloodgroup = $_POST['bloodgroup'];
$gender = $_POST['findgender'];
$age = $_POST['age'];
$email = $_POST['email'];
$pincode = $_POST['pincode'];
$mobno = $_POST['mobno'];
$state = $_POST['authors'];
$district = $_POST['books'];
$city = $_POST['city'];
$cpassword = $_POST['pwd'];



$cpassmd = md5($cpassword); //this will encrypt the password

$getpass = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$sessionemail'") or die($mysqli->error);

$pass = $getpass->fetch_assoc();

$currentpass = $pass['pwd'];


if ($currentpass != $cpassmd) {
	session_start();
	$_SESSION['wrongpass'] = "wrong password";
//echo "wrong password";
	header('location: ../editprofile.php');

} else {

$getemail = $mysqli->query("SELECT * FROM `user_reg` WHERE `email` = '$sessionemail'") or die($mysqli->error);

$getcontact = $getemail->fetch_assoc();

$umail = $getcontact['email'];
$umob = $getcontact['mobno'];


if($umail != $email or $umob != $mobno){

// check db for existing user with same data
$result = $mysqli->query("SELECT * FROM `user_reg` WHERE NOT (`email` = '$email' AND `mobno` = '$mobno')") or die($mysqli->error);

$row = $result->fetch_assoc();


	if($row){

	if($row['email'] === $email){

		$error=$error+1;
		//echo "Email already exist"."<br>";
		$_SESSION['emailexist'] = "Email already exist";

		//echo $error."<br>";

	}
	if($row['mobno'] === $mobno){

		$error=$error+1;
		$_SESSION['phoneexist'] = "Phone number already exist";
		
		//echo "Phone number already exist";
		//echo $error."<br>";
	}

	//echo "Phone number email already exist"."<br>";
	header('location: ../editprofile.php');
	//echo $error."<br>";
}





// $errornum = mysqli_num_rows($result);

//echo $errornum;
//echo $error."<br>";


}



//Register the user if no error

if ($error==0) {


 // $mysqli->query("UPDATE `user_reg` SET `fname`='$fname', `lname`='$lname', `bgroup`='$bloodgroup', `gender`='$gender', `age`='$age', `email`='$email', `pincode`='$pincode', `mobno`='$mobno', `state`='$state', `district`='$district', `city`='$city' WHERE `email`='$sessionemail'");

// or die($mysqli->error);
if (!$mysqli->query("UPDATE `user_reg` SET `fname`='$fname', `lname`='$lname', `bgroup`='$bloodgroup', `gender`='$gender', `age`='$age', `email`='$email', `pincode`='$pincode', `mobno`='$mobno', `state`='$state', `district`='$district', `city`='$city' WHERE `email`='$sessionemail'")) {

	session_start();
	$_SESSION['errorep'] = mysqli_error($mysqli);
	header('location: ../editprofile.php');
}else{

 

session_start();

$_SESSION['updated'] = "updated";

	header('location: ../editprofile.php');
}

}

}

}

}
?>
