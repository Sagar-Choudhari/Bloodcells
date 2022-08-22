<?php

session_start();

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


$bloodgroup = '';
$state = '';
$city ='';


if (isset($_POST['search'])){

$bloodgroup = $_POST['blood'];
$state = $_POST['authors'];
$city = $_POST['books'];


	$query = $mysqli->query("SELECT * FROM `user_reg` WHERE `bgroup`='$bloodgroup' OR `state`='$state' OR `district`='$city';") or 
			die($mysqli->error);


//	$row = $query->fetch_assoc();

	while ($row = $query->fetch_assoc()){
	echo $row['bgroup'];
	$getstate = $row['state'];

	$gettingstate = $mysqli->query("SELECT `state_name` FROM `all_states` WHERE `state_code`='$getstate';") or die($mysqli->error);
	$row = $gettingstate->fetch_assoc();
	echo $row['state_name'];
	$row = $query->fetch_assoc();
	echo $row['district'];
	echo ;
}

}
?>
