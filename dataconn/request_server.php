
<?php 
session_start();
error_reporting(0);
if(isset($_POST['submit']))
{
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        // echo "code wrong" ;
	session_start();
	$_SESSION['wrongcode'] = "wrong code";

	header('location: ../request.php');
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
$mobno = "";
$rqrddate = "";
$city = "";
$rqstdate = "";
$details = "";



if (isset($_POST['submit'])){


//Register users

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$bloodgroup = $_POST['bloodgroup'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$mobno = $_POST['mobile'];
$city = $_POST['city'];
$rqrddate = $_POST['required_date'];

date_default_timezone_set('Asia/Kolkata');  
$rqstdate =   date('Y/m/d H:i:s', time());


// $rqstdate = strtotime(date('Y-m-d H:i:s'));
$details = $_POST['details'];

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

	$mysqli->query("INSERT INTO `request` (`fname`, `lname`, `bgroup`, `gender`, `age`, `email`, `mobile`,`city`,  `required_date`, `requested_date`, `details`) VALUES ('$fname','$lname','$bloodgroup','$gender','$age','$email','$mobno','$city','$rqrddate','$rqstdate','$details')") or die($mysqli->error);

	// echo "success";

	session_start();
	$_SESSION['requestsuccess'] = "success";

	header('location: ../request.php');

}
}
}
?> 