<?php




$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;




if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM user_reg WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['msgmember'] = "Member has been deleted successfully!!";
	$_SESSION['msgmember_type'] = "danger";


	header("location: ../all_member.php");

}


?>


