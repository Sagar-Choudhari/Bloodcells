
<?php

session_start();

if(!isset($_SESSION['email'])){
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Profile</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->


    <?php include('user/nav.php'); ?>


  <!-- Page Wrapper -->
  <div id="wrapper" class="bg-light rounded container pt-5">



    <?php include('user/sidebar.php'); ?>

    

<div id="content-wrapper" class="rounded">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">



        <!-- Main Content -->
        <div id="content" class=" text-right">

          <a href="editprofile.php" title="" class="btn-warning btn text-dark text-right">Edit Profile</a>

        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-2">

<?php 

$email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$getdata = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$data = $getdata->fetch_assoc();

?>

<div class="container text-gray-800">

  <div class="text-capitalize h1 mb-3">
<?php echo "Name : ".$data['fname']." ".$data['lname']; ?>
  </div>
  <div class="text-capitalize h4 mb-4 text-danger">
<?php echo "Bloodgroup : ".$data['bgroup']; ?>
  </div>
  <div class="text-capitalize h4 mb-4">
<?php echo "Gender : ".$data['gender']; ?>
  </div>
  <div class="text-capitalize h4 mb-4">
<?php echo "Age : ".$data['age']; ?>
  </div>
  <div class="text-capitalize h4 mb-4">
<?php echo "Email : ".$data['email']; ?>
  </div>
  <div class="text-capitalize h4 mb-4">
<?php echo "Mobile : ".$data['mobno']; ?>
  </div>
  <div class="text-capitalize h4 mb-4">
<?php echo "Address : ".$data['city'].", ".$data['district'].","; 

$state = $data['state'];
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$getdata = $mysqli->query("SELECT * FROM `all_states` WHERE `state_code`='$state'") or die($mysqli->error);

$getstate = $getdata->fetch_assoc();
echo " ".$getstate['state_name'].".";
?>

  </div>
<div class="text-capitalize h4 mb-4">
<?php echo "Pincode : ".$data['pincode']; ?>
  </div>

</div>


        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
</div>
<?php include('include/footer.php'); ?>
<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
  </body>
  </html>

