<?php
session_start() 
?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - About us</title>
        <?php include 'include/common_links.php'; ?>
        <?php include 'include/scripts.php'; ?>
<!-- Bloodcells icon -->
<link rel="icon" href="assets/logo.png" type="image/x-icon">

<!-- hind font -->
<link rel="stylesheet" href="css/font.css">

<!-- bootstrap -->
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
    
<!-- Loading animation -->

<link rel="stylesheet" href="css/loading.css">


<link href="css/custom_bootstrap.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/about.css" type="text/css">

  </head>
  <body id="page-top">
<div class="welcome">



    <div class="container-fluid">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="index.php">Home</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="beforeregister.php">Register</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="all_request.php">Request</a> </li>
                
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="camps.php">Activity</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="contact.php">Contact Us</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-white" href="about.php">About Us</a> </li>
                
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
            <li class="nav-item dropdown no-arrow ml-5 border-right border-left rounded-pill border-white px-3">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-capitalize text-white"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
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
      </div>
      <!-- end  Navigation bar -->


<div class="container"data-aos="fade-up">      
<div class="my-4">&nbsp;</div>
<div class="text-white text-wrap text-monospace text-justify" style="font-size: 17px;">
        Bloodcells is a browser based database system that is to be used by the blood banks or blood centers as a means to advertise the nationwide blood donation events to the public and at the same time allow the public to make online reservation and request for the blood. Bloodcells is designed to store, process, retrieve and analyze information concerned with the administrative and inventory management within a blood bank. This project aims at maintaining all the information pertaining to blood donors, different blood groups available in each blood bank and helps them manage in a better way. Aim is to provide transparency in this field, make the process of obtaining blood from a blood bank hassle free and corruption free and make the system of blood bank management effective. Blood bank is a place where blood bag that is collected from blood donation event is stored in one place.
</div>
<div class="my-4">&nbsp;</div>
</div>



        <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded-circle" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<!--- footerrr ---->
<div class="mt-5 container">
  <div class="mt-4 text-white">
    
    <!-- Footer -->
    <footer id="footer">
      <div class="footer-top mt-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 footer-info">
              <h3 class="text-danger">Bloodcells</h3>
              <p class="w-75">Blood donation is a wonderful way of giving back a life, but to ensure the safety of both donors and recipients there are few requirements you should keep in mind.</p>
            </div>
            <div class="col-lg-2 footer-links">
              <h4 class="text-primary">Links</h4>
              <ul>
                <li><a href="index.php" title="Go to bloodcells homepage">Homepage</a></li>
                <li><a href="register.php" title="Register to donate a blood or host a blood drive">Register</a></li>
                <li><a href="login.php.php" title="Log-in to get more control">Login</a></li>
                <li><a href="contact.php" title="If you want to contact us">Contact Us</a></li>
                <li><a href="about.php" title="If you want to know more about us">About Us</a></li>
              </ul>
            </div>
            <div class="col-lg-3 footer-contact">
              <h4 class="text-success">Contact</h4>
              <p>Sagar Choudhary<br>
                Nagpur&comma;<br>
                Maharashta.<br>Pin: 441002
              <br><strong>Phone: </strong>&nbsp;9876543210
            <br><strong>Phone: </strong>&nbsp;9638520741</p>
            
          </div>
        
        
        </div>

        <div class="container mb-1 row">
          <div class="copyright col-6 text-center">
             copyright &copy; 2019-<?php echo date("Y");?>        <strong class="text-danger">Bloodcells</strong>&reg; All right reserved 
          </div>
          <div class="credits col-6 text-center">
            Designed By <a href="http://www.wordpress.sagarsphotoworks.com" title="Sagar Choudhary's Website">Sagars Photo Works&trade;</a>
          </div>
        </div>

      </div>
    </div>
  </footer>
    <!-- Footer -->
</div>
</div>



        </div> <!--end home --> 
        <!-- <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap-4.0.0.js"></script>
        <script src="./js/custom.min.js"></script>
        <script src="./js/custom.js"></script>

         <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script -->>

        <!-- Core plugin JavaScript-->
        <!--  <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>
 -->
 </div>       
<div id="particles-js"></div>
<script src="js/particles.js"></script>
<script src="js/app.js"></script>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

    </body>
</html>