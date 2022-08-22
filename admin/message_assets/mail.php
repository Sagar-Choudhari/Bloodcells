<?php

// // subject
// $subject = "dsajbhsubject";

// //msg
// $msg = "msg gere heger egegh";

// //reciver mail here

// $reciver = "sagarsphotoworks@gmail.com";

// // send mail code
// if (mail($reciver,$subject,$msg)) {
// 	echo "msg send";
// }
// else {
// 	echo "error";
// }



$id = 0;
$recipient = '';
$subject = '';
$message = '';



if (isset($_POST['reply'])){

	//reciver mail here
	$recipient = $_POST['recipient'];

	// subject
	$subject = $_POST['subject'];

	//msg
	$message = $_POST['message'];

//echo $recipient;
//echo $subject;
//echo $message;
	// send mail code
	if (mail($recipient,$subject,$message)) {
		$send = TRUE;
	}
	else {
		$send = FALSE;
	}


	if ($send = TRUE) {
		//echo "sent";
	session_start();
	$_SESSION['mail'] = "Message sent successfully.";
	$_SESSION['mail_type'] = "success";

	header("location: ../message.php");

}
else {
 //echo "fail";
	session_start();
	$_SESSION['mail'] = "Something is wrong. Please check your internet connection..";
	$_SESSION['mail_type'] = "danger";

	header("location: ../message.php");
}

}


if (isset($_GET['edit'])) {
	$id = $_GET['edit'];

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM `message` WHERE `id`='$id'") or die($mysqli->error());
	
	$row = $result->fetch_array();
	$email = $row['email'];
	$name = $row['name'];
	//echo $email;
	//echo $name ;

	$_SESSION['replymail'] = "reply";
	
}



?>
