<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$news_title = '';
$news_detail = '';



if (isset($_POST['submit'])){

	$news_title = $_POST['title'];
	$news_detail = $_POST['detail'];

	session_start();
	$_SESSION['messagenews'] = "New News has been posted successfully.";
	$_SESSION['messagenews_type'] = "success";


	header("location: ../news.php");



	$mysqli->query("INSERT INTO news (title,detail) VALUES('$news_title','$news_detail')") or 
			die($mysqli->error);

}



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM news WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['messagenews'] = "News has been deleted successfully!!";
	$_SESSION['messagenews_type'] = "danger";


	header("location: ../news.php");

}



if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM news WHERE id=$id") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$news_title = $row['title'];
	$news_detail = $row['detail'];
	
}


if (isset($_POST['update'])){
	$id = $_POST['id'];
	$news_title = $_POST['title'];
	$news_detail = $_POST['detail'];

	$mysqli->query("UPDATE news SET title='$news_title',detail='$news_detail' WHERE id=$id") or die($mysqli->error);

	session_start();
	$_SESSION['messagenews'] = "News has been updated successfully.";
	$_SESSION['messagenews_type'] = "warning";

	header('location: ../news.php');

}


?>