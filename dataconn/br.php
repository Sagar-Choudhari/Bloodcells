<?php

session_start();

$q1 = '';
$q2 = '';
$q3 ='';

if (isset($_POST['submit'])){


$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];

if ($q1=="Yes" && $q2=="Yes" && $q3=="Yes") {
	// echo "Sorry you cant donate blood... because of weight & cancer problem";
	$_SESSION['noweightcancer'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="Yes" && $q2=="No" && $q3=="Yes") {
	// echo "Sorry you cant donate blood... because of cancer problem";
	$_SESSION['nocancer'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="Yes" && $q2=="No" && $q3=="No") {
	// echo "Yess you can donate blood... because no problem";
	$_SESSION['correctquestion'] = "true";
	header('location: ../register.php');


}elseif ($q1=="No" && $q2=="No" && $q3=="No") {
	// echo "Sorry you cant donate blood... because of age problem";
	$_SESSION['noage'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="Yes" && $q2=="Yes" && $q3=="No") {
	// echo "Sorry you cant donate blood... because of weight problem";
	$_SESSION['noweight'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="No" && $q2=="Yes" && $q3=="Yes") {
	
	// echo "Sorry you cant donate blood... because of age, weight & cancer problem";
	$_SESSION['noageweightcancer'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="No" && $q2=="No" && $q3=="Yes") {
	// echo "Sorry you cant donate blood... because of age & cancer problem";
	$_SESSION['noagecancer'] = "false";
	header('location: ../beforeregister.php');


}elseif ($q1=="No" && $q2=="Yes" && $q3=="No") {	
	// echo "Sorry you cant donate blood... because of age & weight problem";
	$_SESSION['noageweight'] = "false";
	header('location: ../beforeregister.php');

}


}

// $_SESSION['msgcontact'] = "true";


// header("location: ../index.php");




// yes no
// yes no
// yes no


// yes yes yes
// no no no

// yes no no
// no yes yes

// yes yes no
// no no yes

// yes no yes
// no yes no




 ?>