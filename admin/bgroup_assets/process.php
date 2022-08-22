<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$bloodgroup = '';



////// to display index number

// $displayquery = "SELECT * FROM bloodgroup ";
// $numresult = mysqli_query($mysqli,$displayquery);

// if(mysqli_num_rows($numresult) > 0){

// 		$number = 1;
// 		while ($rows = mysqli_fetch_array($numresult)){

// 			$data = '<td>'.$number.'</td>';

// 		$number++;

// 		}
		
// 	}






if (isset($_POST['submit'])){

	$bloodgroup = $_POST['bloodgroup'];

	session_start();
	$_SESSION['messageblood'] = "New Bloodgroup has been added successfully.";
	$_SESSION['msgblood_type'] = "success";


	header("location: ../bloodgroup.php");



	$mysqli->query("INSERT INTO bloodgroup (bloodgroup) VALUES('$bloodgroup')") or 
			die($mysqli->error);

}



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM bloodgroup WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['messageblood'] = "Bloodgroup has been deleted successfully!!";
	$_SESSION['messageblood_type'] = "danger";


	header("location: ../bloodgroup.php");

}



if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM bloodgroup WHERE id=$id") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$bloodgroup = $row['bloodgroup'];
	
}


if (isset($_POST['update'])){
	$id = $_POST['id'];
	$bloodgroup = $_POST['bloodgroup'];

	$mysqli->query("UPDATE bloodgroup SET bloodgroup='$bloodgroup' WHERE id=$id") or die($mysqli->error);

	session_start();
	$_SESSION['messageblood'] = "Bloodgroup has been updated successfully.";
	$_SESSION['messageblood_type'] = "warning";

	header('location: ../bloodgroup.php');

}


?>