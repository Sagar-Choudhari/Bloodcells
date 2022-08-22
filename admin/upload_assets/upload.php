<?php



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$title = '';
$image = '';
$details = '';






	if (isset($_POST['submit'])){

		$title = $_POST['title'];
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


           $mysqli->query("INSERT INTO `upload_img`(`title`, `image`, `details`) VALUES ('$title','$destinationfile','$details')") or die($mysqli->error());

           

            $displayquery = "SELECT * FROM upload_img";
            $querydisplay = mysqli_query($mysqli,$displayquery);

	session_start();
			$_SESSION['messageimg'] = "New image has been uploaded successfully.";
			$_SESSION['msgimg_type'] = "success";


			header("location: ../uploadimg.php");

	 }
          else {
	session_start();
          	$_SESSION['messageimg'] = "Please upload Image only. (Ex. jpeg, jpg, png)";
			$_SESSION['msgimg_type'] = "danger";
			
			header("location: ../uploadimg.php");
          }


}



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];



$result = $mysqli->query("SELECT * FROM upload_img WHERE id=$id") or die($mysqli->error());
	
	$row = $result->fetch_array();

	$deleteimg = $row['image'];

	unlink($deleteimg);



	$mysqli->query("DELETE FROM upload_img WHERE id=$id") or die($mysqli->error());

	session_start();
	$_SESSION['messageimg'] = "Image has been deleted successfully!!";
	$_SESSION['msgimg_type'] = "danger";


	header("location: ../uploadimg.php");

}



if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM upload_img WHERE id='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$title = $row['title'];
	$image = $row['image'];
	$details = $row['details'];
}


if (isset($_POST['update'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
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

           

			$mysqli->query("UPDATE upload_img SET title='$title',image='$destination',details='$details' WHERE id='$id'") or die($mysqli->error);


            $displayquery = "SELECT * FROM upload_img";
            $querydisplay = mysqli_query($mysqli,$displayquery);

	session_start();

	$_SESSION['messageimg'] = "Image & details has been updated successfully.";
	$_SESSION['msgimg_type'] = "warning";

	header('location: ../uploadimg.php');
}

}


?>