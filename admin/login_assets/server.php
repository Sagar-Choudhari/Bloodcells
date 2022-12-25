<?php 

error_reporting(0);

if(isset($_POST['loginadmin']))
{

	$conn = mysqli_connect('localhost','root');
	
	if($conn){
		echo"connection succesfull..";

	} else
	{
		echo"no connection";
	}

	mysqli_select_db($conn,'bloodcells');

	$loginid = $_POST['userid'];
	$pass = $_POST['password'];
	$loginpass = md5($pass); //password decrypt

	$query = "SELECT * FROM admin WHERE emailid = '$loginid' && password = '$loginpass'";


	$result = mysqli_query($conn, $query);



	$num = mysqli_num_rows($result);

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

	$getid = $mysqli->query("SELECT * FROM admin WHERE emailid = '$loginid'") or die($mysqli->error());
		
	$row = $getid->fetch_array();


	if ($num == 1){
	
	$_SESSION['loginfbid'] = $row['id'];

	echo "server page";

	// echo $_SESSION['loginfbid'];

	header('location: ../index.php');


	}else{

	header('location: ../login.php');
		//echo "Login Failed";
	}

}
 ?>