<?php



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$from = '';
$caption = '';
$image = '';
$details = '';






if (isset($_POST['sendappoit'])){


			$caption = $_POST['captionbyadmin'];
			$details = $_POST['detailsbyadmin'];
		    $file = "C:/xampp/htdocs/Bloodcells/user/".$_POST['image'];

		    $newfile = $_POST['image'];
			
			if (!copy($file, $newfile)) {
			    echo "failed to copy $file...\n";


			}else{
			    echo "copied $file into $newfile\n";
			


            $mysqli->query("INSERT INTO `upload_img`(`title`, `image`, `details`) VALUES ('$caption','$newfile','$details')") or die($mysqli->error());


            $displayquery = "SELECT * FROM `uploadtoadmin`";
            $querydisplay = mysqli_query($mysqli,$displayquery);

			session_start();
			$_SESSION['usupmsg'] = "New image has been uploaded successfully.";
			$_SESSION['usupmsg_type'] = "success";


			header("location: ../upfromuser.php");

}

}











if (isset($_GET['delete'])) {

	$id = $_GET['delete'];



$result = $mysqli->query("SELECT * FROM `uploadtoadmin` WHERE `id`='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();

	$deleteimg = "../user/".$row['image'];

	unlink($deleteimg);


	$mysqli->query("DELETE FROM `uploadtoadmin` WHERE `id`='$id'") or die($mysqli->error());

	session_start();
	$_SESSION['usupmsg'] = "Post has been deleted successfully!!";
	$_SESSION['usupmsg_type'] = "danger";


	header("location: ../upfromuser.php");

}











if (isset($_GET['upload'])) {

	$id = $_GET['upload'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM `uploadtoadmin` WHERE `id`='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$from = $row['from'];
	$caption = $row['caption'];
	$image = $row['image'];
	$details = $row['details'];


	$name = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$from'") or die($mysqli->error());

	$getname = $name->fetch_array();
	$fname = $getname['fname'];
	$lname = $getname['lname'];

	
	$_SESSION['uploading'] = "uploading";
}









// if (isset($_POST['update'])){
// 	$id = $_POST['id'];
// 	$title = $_POST['title'];
// 	$image = $_FILES['imgfile'];
// 	$details = $_POST['details'];


//           $filename = $image['name'];
//           $fileerror = $image['error'];
//           $filetmp = $image['tmp_name'];


//           $fileext = explode('.', $filename);
//           $filecheck = strtolower(end($fileext));

//           $fileextstored = array('png','jpg','jpeg');



//           if(in_array($filecheck,$fileextstored)){

//             $destination = 'images/'.$filename;
//             move_uploaded_file($filetmp,$destination);

           

// 			$mysqli->query("UPDATE `uploadtoadmin` SET title='$title',image='$destination',details='$details' WHERE id='$id'") or die($mysqli->error);


//             $displayquery = "SELECT * FROM `uploadtoadmin`";
//             $querydisplay = mysqli_query($mysqli,$displayquery);

// 	session_start();

// 	$_SESSION['usupmsg'] = "Image & details has been updated successfully.";
// 	$_SESSION['usupmsg_type'] = "warning";

// 	header('location: ../uploadimg.php');
// }

// }


?>