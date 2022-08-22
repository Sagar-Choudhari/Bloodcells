<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$ctitle = '';
$corganised = '';
$caddress = '';
$cdate = '';
$ctime = '';
$files = '';
$cdetails = '';


	if (isset($_POST['csubmit'])){

		$ctitle = $_POST['ctitle'];
		$corganised = $_POST['corganised'];
		$caddress = $_POST['caddress'];
		$cdate = $_POST['cdate'];
		$ctime = $_POST['ctime'];
		$files = $_FILES['cposter'];
	    $cdetails = $_POST['cdetails'];

          $filename = $files['name'];
          $fileerror = $files['error'];
          $filetmp = $files['tmp_name'];


          $fileext = explode('.', $filename);
          $filecheck = strtolower(end($fileext));

          $fileextstored = array('png','jpg','jpeg');



          if(in_array($filecheck,$fileextstored)){

            $destinationfile = 'images/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);


           $mysqli->query("INSERT INTO `camps`(`title`, `organised_by`, `address` , `date`, `time`, `poster`, `details`) VALUES ('$ctitle','$corganised','$caddress','$cdate','$ctime','$destinationfile','$cdetails')") or die($mysqli->error());

           

            $displayquery = "SELECT * FROM camps";
            $querydisplay = mysqli_query($mysqli,$displayquery);

			session_start();
			$_SESSION['msgcamp'] = "New Event has been added successfully.";
			$_SESSION['msgcamp_type'] = "success";


			//echo "added";
			header("location: ../camps.php");

	 }
          else {
          	session_start();
          	$_SESSION['msgcamp'] = "Please upload Image only. (Ex. jpeg, jpg, png)";
			$_SESSION['msgcamp_type'] = "danger";
			//echo "fail";
			header("location: ../camps.php");
          }


}



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];



$result = $mysqli->query("SELECT * FROM camps WHERE id=$id") or die($mysqli->error());
	
	$row = $result->fetch_array();

	$deleteimg = $row['poster'];

	unlink($deleteimg);



	$mysqli->query("DELETE FROM camps WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['msgcamp'] = "Event has been deleted successfully!!";
	$_SESSION['msgcamp_type'] = "danger";


	header("location: ../camps.php");

}



if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM camps WHERE id='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();

	$ctitle = $row['title'];
	$corganised = $row['organised_by'];
	$caddress = $row['address'];
	$cdate = $row['date'];
	$ctime = $row['time'];
	$image = $row['poster'];
	$cdetails = $row['details'];

}


if (isset($_POST['update'])){
	$id = $_POST['id'];
	$ctitle = $_POST['ctitle'];
	$corganised = $_POST['corganised'];
	$caddress = $_POST['caddress'];
	$cdate = $_POST['cdate'];
	$ctime = $_POST['ctime'];
	$image = $_FILES['cposter'];
	$cdetails = $_POST['cdetails'];



          $filename = $image['name'];
          $fileerror = $image['error'];
          $filetmp = $image['tmp_name'];


          $fileext = explode('.', $filename);
          $filecheck = strtolower(end($fileext));

          $fileextstored = array('png','jpg','jpeg');



          if(in_array($filecheck,$fileextstored)){

            $destination = 'images/'.$filename;
            move_uploaded_file($filetmp,$destination);

           

			$mysqli->query("UPDATE `camps` SET `title`='$ctitle',`organised_by`='$corganised',`address`='$caddress', `date`='$cdate', `time`='$ctime', `poster`='$destination',`details`='$cdetails' WHERE `id`='$id'") or die($mysqli->error);


            $displayquery = "SELECT * FROM camps";
            $querydisplay = mysqli_query($mysqli,$displayquery);


            session_start();
			$_SESSION['msgcamp'] = "Image & details has been updated successfully.";
			$_SESSION['msgcamp_type'] = "warning";

			header('location: ../camps.php');
}

}


?>