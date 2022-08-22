
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

    

<div id="content-wrapper" class="rounded pb-5">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">
<?php 


$email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT fname,lname FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$name = $user->fetch_assoc();


?>

<div class="h5 ml-4 text-capitalize row"><span class="h6 mt-1">&nbsp;&nbsp;&nbsp;Welcome&nbsp;</span><?php echo $name['fname']." ".$name['lname']; ?></div>


        <!-- Main Content -->
        <div id="content" class="">


<?php 


$email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT SUM(drives) FROM `blooddrive` WHERE `user`='$email'") or die($mysqli->error);
$drive = $user->fetch_assoc();


$check = $mysqli->query("SELECT * FROM `blooddrive` WHERE `user`='$email'") or die($mysqli->error);
$num = mysqli_num_rows($check);

?>

<?php if ($num>0): ?> 

          <!-- Earnings (Monthly) Card Example -->
            <div class="col-4 ml-4 mt-2" data-aos="fade-right">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Blood Donated</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $drive['SUM(drives)']." Drives"; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tint fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php endif; ?>

        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-3">

<?php 


$email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT * FROM `blooddrive` WHERE `user`='$email' ORDER BY id DESC") or die($mysqli->error);

$num = mysqli_num_rows($user); ?>


<?php if($num==0): ?>
  
  <div class="container mt-3" data-aos="fade-right">
    <h5 class="">You have not donated any blood drive at <a href="index.php" title="" class="text-danger">Bloodcells.</a></h5>
    <h5 class="">We suggest you to join our <a href="camps.php" title="" class="">events</a> or fix any <a href="appoitment.php" title="" class="">appoitment</a> or <a href="meet.php" title="" class="">meeting</a> with our admins. <a href="contact.php" title="" class="text-success">Contact us</a> for more information. <a href="index.php" title="" class="text-danger"> : Bloodcells.</a></h5>
  </div>

<?php  else:  ?>



<?php while ($details = $user->fetch_assoc()): ?>


<div class=""data-aos="fade-right">
    <div class="card m-2 alert-secondary">
      <div class="card-body">
          <div class="row">
            <div class="col-auto">
<?php  ?>
            <div class="text-gray-800">Donated&#32;&#58;&#32;<?php echo $details['drives']." drives"; ?></div>
            <div class="text-gray-800">At&#32;&#58;&#32;<?php echo $details['campaign']; ?></div>
            <div class="font-weight-normal text-gray-800">Details&#32;&#58;&#32;<?php echo $details['details']; ?></div>

<?php 
$camp = $details['campaign'];
  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM camps WHERE `title`='$camp' ORDER BY id DESC") or die($mysqli->error);

  while ($date = $result->fetch_assoc()): 
?>



            <div class="font-weight-bold text-gray-800">Date&#32;&#58;&#32;<?php echo $date['date']; ?></div>
            <div class="font-weight-bold text-gray-800">Time&#32;&#58;&#32;<?php echo $date['time']; ?></div>
            </div>
 
          </div>
      </div>
    </div>
</div>



<?php endwhile; ?>
<?php endwhile; ?>
<?php endif; ?>
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

