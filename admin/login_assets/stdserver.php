<?php 

error_reporting(0);

session_start();

if(isset($_POST['loginadmin']))
{

$loginid = $_POST['userid'];
$pass = $_POST['password'];


if ($loginid == "Sagar" && $pass == 123){
 
    $_SESSION['stdlogin'] = $loginid;

    // if (isset($_SESSION['stdlogin'])) 
    //     {
    //         // echo"active session";
    //         // echo "|".$loginid."|";
    //         // echo "<br>";
    //         // echo $pass;
    //     }
    // else {
    //     // echo"not session";
    // }

    // echo"session activated";

    header('location: ../index.php');

}else{

    // header('location: ../login.php');
    echo"session not active";

}
}
 ?>