<?php
session_start() 
?>
 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Search Result</title>
    <?php include('include/common_links.php'); ?>
    <!-- css -->
    <link rel="stylesheet" href="css/request.css" type="text/css">
  </head>
  <body id="page-top">     
    <!--  Navigation bar -->
      <div class="">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item active"> <a class="nav-link navigation-icon" href="index.php">Home</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="register.php">Register</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon active" href="all_request.php">Request</a> </li>
                
                <li class="nav-item"> <a class="nav-link navigation-icon" href="camps.php">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="contact.php">Contact Us</a> </li>
                <li class="nav-item"> <a class="nav-link navigation-icon" href="about.php">About Us</a> </li>
               
<?php if (!isset($_SESSION['email'])): ?> 

    <li class="nav-item ml-5"> <a class="nav-link" href="login.php"><h6 class="login-button">Log-in</h6></a> </li>

<?php else: ?>

<?php $email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error); 
$arrayy = $user->fetch_assoc();

// SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'

?>
 <!-- <?php// echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?> -->

         <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow ml-5 border-right border-left rounded-pill border-dark px-3">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-capitalize text-dark"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
                <img class="img-profile rounded-circle" src="assets/Icon-person@2x.png" data-size="60x60"><img src="assets/ellipsis-v-solid.svg" class="ml-1 opacity-1" style="opacity: 0.5;" alt=""  width="6">
              </a>
              

              <?php include 'user/togglemenu.php'; ?>
                  

<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to logout??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="dataconn/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

            </li><?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>

      <!-- end  Navigation bar -->
      
<div class="container rounded mt-4" data-aos="fade-up">


<?php



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


$bloodgroup = '';
$state = '';
$city ='';


if (isset($_POST['search'])){

$bloodgroup = $_POST['blood'];
$state = $_POST['authors'];
$city = $_POST['books'];


  $query = $mysqli->query("SELECT * FROM `user_reg` WHERE `bgroup`='$bloodgroup' OR `state`='$state' OR `district`='$city' ORDER BY `bgroup` ASC;") or 
      die($mysqli->error);


//  $row = $query->fetch_assoc();
$errornum = mysqli_num_rows($query);

  while ($row = $query->fetch_assoc()):{
  $gfname = $row['fname'];
  $glname = $row['lname'];
  $gbgroup = $row['bgroup'];
  $ggender = $row['gender'];
  $gage = $row['age'];
  $gemail = $row['email'];
  $gpincode = $row['pincode'];
  $gphone = $row['mobno'];
  $getstate = $row['state'];
  $gettingstate = $mysqli->query("SELECT `state_name` FROM `all_states` WHERE `state_code`='$getstate';") or die($mysqli->error);
  $row = $gettingstate->fetch_assoc();
  $gstate = $row['state_name'];

  $row = $query->fetch_assoc();
  $gdist = $row['district'];
  $gcity = $row['city'];

}


?>
          
                    <div class="alert-secondary btn-outline-secondary container p-3 mb-3 row rounded" role="alert">
                        <div class="px-3 col-10">
                          <div class="row text-capitalize">
                              Name&nbsp;:&nbsp;<?php echo $gfname; ?>&nbsp;<?php echo $glname; ?>
                          </div>
                          <div class="row">
                            Gender&nbsp;:&nbsp;<?php echo $ggender; ?>&nbsp;&nbsp;&nbsp;&nbsp;Age&nbsp;:&nbsp;<?php echo $gage; ?>
                          </div>
                          <div class="row">
                            Phone no.&nbsp;:&nbsp;+91-<?php echo $gphone; ?><br>Email&nbsp;:&nbsp;<?php echo $gemail; ?>
                          </div>
                          <div class="row">
                            Address&nbsp;: 
                            <?php echo $gcity; ?>&comma;&nbsp;<?php echo $gdist; ?>&comma;&nbsp;<?php echo $gstate; ?>.<br>
                            Pincode : <?php echo $gpincode; ?>
                          </div>
                        </div>
                        <div class="row text-right col-2 float-right">
                          Bloodgroup : &nbsp;<div class="text-danger h5 font-weight-bold"><?php echo $gbgroup; ?></div>
                        </div>

                        

                    </div>



<?php endwhile; }?>



<?php if ($errornum ===0): ?>

  <div class="h4 badge-danger badge-pill text-center my-5">
    <div class="py-2">
       No data available for this search.. you can search again after some time.. sorry
    </div>
   
  </div>
        
        <?php endif; ?>
   </div>   


        <?php include 'include/footer.php'; ?>
        <!-- scripts -->
      </div>
        <?php include('include/scripts.php'); ?>
<!-- *********** disable form resubmission script ************ -->
<script>
// if ( window.history.replaceState ) {
//   window.history.replaceState( null, null, window.location.href );
// }
</script>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

      </body>
    </html>