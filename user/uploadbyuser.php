<?php


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$umail ='';
$update = false;
$caption = '';
$image = '';
$details = '';



	if (isset($_POST['submit'])){

		$umail = $_POST['useremail'];
		$caption = $_POST['caption'];
	    $files = $_FILES['image'];
	    $details = $_POST['details'];


          $filename = $files['name'];
          $fileerror = $files['error'];
          $filetmp = $files['tmp_name'];


          $fileext = explode('.', $filename);
          $filecheck = strtolower(end($fileext));

          $fileextstored = array('png','jpg','jpeg');



          if(in_array($filecheck,$fileextstored)){

            $destinationfile = 'images/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);


		$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

        $mysqli->query("INSERT INTO `uploadtoadmin`(`from`, `caption`, `image`, `details`) VALUES ('$umail','$caption','$destinationfile','$details')") or die($mysqli->error());



            $displayquery = "SELECT * FROM `uploadtoadmin`";
            $querydisplay = mysqli_query($mysqli,$displayquery);

	session_start();
			$_SESSION['usermsg'] = "New image has been uploaded to admin successfully.";
			$_SESSION['usermsg_type'] = "success";


			header("location: ../uploadtoadmin.php");

	 }
          else {
	session_start();
          	$_SESSION['usermsg'] = "Please upload Image only. (Ex. jpeg, jpg, png)";
			$_SESSION['usermsg_type'] = "danger";
			
			header("location: ../uploadtoadmin.php");
          }


}



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];



$result = $mysqli->query("SELECT * FROM `uploadtoadmin` WHERE id=$id") or die($mysqli->error());
	
	$row = $result->fetch_array();

	$deleteimg = $row['image'];

	unlink($deleteimg);



	$mysqli->query("DELETE FROM `uploadtoadmin` WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['usermsg'] = "Image has been deleted successfully!!";
	$_SESSION['usermsg_type'] = "danger";


	header("location: ../uploadtoadmin.php");

}



if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM `uploadtoadmin` WHERE id='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$caption = $row['caption'];
	$image = $row['image'];
	$details = $row['details'];
}


if (isset($_POST['update'])){
	$id = $_POST['id'];
	$caption = $_POST['caption'];
	$image = $_FILES['imgfile'];
	$details = $_POST['details'];


          $filename = $image['name'];
          $fileerror = $image['error'];
          $filetmp = $image['tmp_name'];


          $fileext = explode('.', $filename);
          $filecheck = strtolower(end($fileext));

          $fileextstored = array('png','jpg','jpeg');



          if(in_array($filecheck,$fileextstored)){

            $destination = 'images/'.$filename;
            move_uploaded_file($filetmp,$destination);

           

			$mysqli->query("UPDATE `uploadtoadmin` SET `caption`='$caption',`image`='$destination',`details`='$details' WHERE `id`='$id'") or die($mysqli->error);


            $displayquery = "SELECT * FROM `uploadtoadmin`";
            $querydisplay = mysqli_query($mysqli,$displayquery);

	session_start();

	$_SESSION['usermsg'] = "Image & details has been updated successfully.";
	$_SESSION['usermsg_type'] = "warning";

	header('location: ../uploadtoadmin.php');
}

}


?>