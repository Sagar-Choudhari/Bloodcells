<?php 

session_start();
error_reporting(0);
if(isset($_POST['login']))
{
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        // "" ;
	$_SESSION['wrongcode'] = "wrong code";

	header('location: ../login_request.php');
    }
 
else{

$conn = mysqli_connect('localhost','root');
if($conn){
	echo"connection succesfull";

}else
{
	echo"no connection";
}

mysqli_select_db($conn,'bloodcells');

$loginid = $_POST['loginid'];
$pass = $_POST['loginpass'];
$loginpass = md5($pass); //password decrypt

$query = "SELECT * FROM user_reg WHERE email = '$loginid' && pwd = '$loginpass'";

$result = mysqli_query($conn, $query);

$num = mysqli_num_rows($result);

if ($num == 1){
	
	//echo "  Login succesfull";
	 $_SESSION['email'] = $loginid;
	 header('location: ../request.php');


}else{
	//echo "  Login Failed";
	$_SESSION['loginerror'] = "Login Error";
	header('location: ../login_request.php');
	
	
}
}
}
 ?>