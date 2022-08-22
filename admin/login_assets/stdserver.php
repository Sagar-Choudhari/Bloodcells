<?php 

error_reporting(0);

if(isset($_POST['loginadmin']))
{

$loginid = $_POST['userid'];
$pass = $_POST['password'];


if ($loginid == "Sagar" && $pass == 123){
 
$_SESSION['loginfbid'] = "login success";

header('location: ../index.php');

}else{

header('location: ../login.php');

}
}
 ?>