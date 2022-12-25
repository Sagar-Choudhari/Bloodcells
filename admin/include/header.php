<?php

//      if(!$sock = @fsockopen('www.google.com', 80))
// {
//     session_destroy();
//     unset($_SESSION['access_token']);
//     unset($_SESSION['loginfbid']);
//     header("location:login.php");
// }

//uncomment this for actual functionality

?>

<?php 

//include('login_assets/server.php'); 

include('login_assets/stdserver.php'); ?>

<?php include('loginwithfb/fb-init.php'); ?>
 
<?php

if(!isset($_SESSION['access_token'])) {

  if (!isset($_SESSION['stdlogin']))  {
    //echo "sagar";
    // header('location:index.php');
    header('location:login.php');
  }
  // else {
    // header('location:login.php');
  // echo "Failed";
  // print_r(scandir((session_save_path())));
  // if (isset($_SESSION['stdlogin'])) {echo"active session";}
  // else{echo"not session";}
  // }
}
 

?>

<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="css/loading.css">
  <!-- Bloodcells icon -->
  <link rel="icon" href="../assets/logo.png" type="image/x-icon">

  <link rel="stylesheet" href="css/message.css">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="vendor/fontawesome-free/css/fontawesome.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="css/admin.min.css" rel="stylesheet">
  
