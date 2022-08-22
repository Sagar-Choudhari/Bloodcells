

<?php 

session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        // "" ;
	$_SESSION['wrongcode'] = "wrong code";

	header('location: ../register.php');
    } 
 
else{

//connect to db
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


//initialising variables

$id = 0;
$error = 0;
$update = false;
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
$password1 = "";
$password2 = "";


if (isset($_POST['submit'])){


//Register users

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
$password1 = $_POST['pwd'];
$password2 = $_POST['pwd2'];


//form validation

// if($password1 != $password2){
// 	echo "Password does not match";
// 	$_SESSION['pwdnotmatch'] = "Passwords does not match.";
// 	$error=1;
// };


// check db for existing user with same data
$result = $mysqli->query("SELECT * FROM user_reg WHERE email = '$email' or mobno = '$mobno' LIMIT 1") or die($mysqli->error);

$row = $result->fetch_assoc();

$errornum = mysqli_num_rows($result);

//echo $errornum;

if($row){
	if($row['email'] === $email){
		echo "Email already exist";
		$_SESSION['emailexist'] = "Email already exist";
		$error=1;

	}
	if($row['mobno'] === $mobno){
		echo "Phone number already exist";
		$_SESSION['phoneexist'] = "Phone number already exist";
		$error=2;
	}
	header('location: ../register.php');

}



//Register the user if no error

if(mysqli_num_rows($result) == 0){

$password = md5($password1); //this will encrypt the password

 $mysqli->query("INSERT INTO user_reg (fname, lname, bgroup, gender, age, email, pincode, mobno, state, district, city, pwd) VALUES ('$fname','$lname','$bloodgroup','$gender','$age','$email','$pincode','$mobno','$state' ,'$district' ,'$city' ,'$password')") or die($mysqli->error);


	$_SESSION['formsubmitted'] = "success";
	$_SESSION['formsubmitted'] = true;

	header('location: ../register.php');

}
}
}
}
// if (isset($_SESSION['formsubmitted']) && $_SESSION['formsubmitted'] === true) {
// 	echo"<script>alert('Invalid User Name Or Password');window.location='register.php'</script>";
// 	unset($_SESSION['formsubmitted']);
// }
?>




















<!-- <?php

// session_start();
// header('location: ../login.php');


// $conn = mysqli_connect('localhost','root');
// if($conn){
// 	echo"Connection Succesfull";

// }else
// {
// 	echo"No Connection";
// }

// mysqli_select_db($conn,'bloodcells');	


// 	//Register users

// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $bloodgroup = $_POST['bloodgroup'];
// $findgender = $_POST['findgender'];
// $age = $_POST['age'];
// $email = $_POST['email'];;
// $pincode = $_POST['pincode'];
// $mobno = $_POST['mobno'];
// $state = $_POST['authors'];
// $district = $_POST['books'];
// $city = $_POST['city'];
// $password1 = $_POST['pwd'];
// $password2 = $_POST['pwd2'];



// $query = "SELECT * FROM user_reg WHERE email = '$email' && mobno = '$mobno' LIMIT 1";

// $result = mysqli_query($conn, $query);

// $num = mysqli_num_rows($result);

// if ($num == 1) {
// 	echo "duplicate data";

// } 
// else{
// 	$password = md5($password1); //this will encrypt the password
//  	$qy = "INSERT INTO user_reg (fname, lname, bgroup, gender, age, email, pincode, mobno, state, district, city, pwd) VALUES ('$fname','$lname','$bloodgroup','$findgender','$age','$email','$pincode','$mobno','$state' ,'$district' ,'$city' ,'$password')";
//  	mysqli_query($conn, $qy);
// }






?>

 -->
<!--
<?php 

//session_start();

//initialising variables


// $fname = "";
// $lname = "";
// $bloodgroup = "";
// $gender = "";
// $age = "";
// $email = "";
// $pincode = "";
// $mobno = "";
// $state = "";
// $district = "";
// $city = "";



// $errors = array();

// //connect to db

// $conn = mysqli_connect('localhost', 'root', '', 'bloodcells') or die("could not connect to database");

// //Register users

// $fname = $_POST['fname']);
// $lname = $_POST['lname']);
// $bloodgroup = $_POST['bloodgroup']);
// $gender = $_POST['gender']);
// $age = $_POST['age']);
// $email = $_POST['email']);;
// $pincode = $_POST['pincode']);
// $mobno = $_POST['mobno']);
// $state = $_POST['authors']);
// $district = $_POST['books']);
// $city = $_POST['city']);
// $password1 = $_POST['pwd']);
// $password2 = $_POST['pwd2']);


// //form validation

// //if($password1 != $password2){array_push($errors, "Passwords does not match.")};

// // check db for existing user with same data
// $user_check_query = "SELECT * FROM user_reg WHERE email = '$email' or mobno = '$mobno' LIMIT 1";

// $results = mysqli_query($conn, $user_check_query);
// $user = mysqli_fetch_assoc($results);

// if($user){
// 	if($user['email'] === $email){array_push($errors, "Email already exists");}
// 	if($user['mobno'] === $mobno){array_push($errors, "Phone number already exists");}

// }

// //Register the user if no error

// if(count($errors) == 0){

// 	$password = md5($password1); //this will encrypt the password
// 	$query = "INSERT INTO user_reg (fname, lname, bgroup, gender, age, email, pincode, mobno, state, district, city, pwd) VALUES ('$fname','$lname','$bloodgroup','$gender','$age','$email','$pincode','$mobno','$state' ,'$district' ,'$city' ,'$password')";

// 	mysqli_query($conn, $query);
// 	$_SESSION['fname'] = $fname;
// 	$_SESSION['success'] = "You are now logged in";

// 	header('location: index.php');

// }

?> -->