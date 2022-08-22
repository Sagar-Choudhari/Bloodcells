<?php
session_start() 
?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Contact us</title>
    <?php include 'include/common_links.php'; ?>
    <?php include('include/scripts.php'); ?>
    <link rel="stylesheet" href="css/contact.css" type="text/css">
    <link rel="stylesheet" href="css/icons.css" type="text/css">

    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

  </head>
  <body id="page-top" style="overflow-x: hidden;">
    <div class="container-fluid">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="index.php">Home</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="beforeregister.php">Register</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="all_request.php">Request</a> </li>
                
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="camps.php">Activity</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="contact.php">Contact Us</a> </li>
                <li class="nav-item menu-item"> <a class="nav-link text-danger" href="about.php">About Us</a> </li>
                
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
      </div>





<div class="container-fluid">

  <!------------- contact ussss --------->
  
  <div class="container text-center mt-5 text-gray-900">
  <h3>Contact Us</h3>
  <!-- Contact us validate form  -->

  <form action="dataconn/contact.php" method="POST" class="text-gray-900 needs-validation" accept-charset="utf-8" novalidate data-aos="fade-up">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationCustom01">Full Name : </label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Fullname" value="" name="name" autocomplete="off" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please provide a your name.
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustom02">Email : </label>
        <input type="email" class="form-control" id="validationCustom02" id="exampleInputEmail1" placeholder="Enter Email Address" value="" name="email" aria-describedby="emailHelp" autocomplete="off" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please provide a valid email.
        </div>
      </div>


      <div class="col-md-4 mb-3">
        <label for="validationCustom03">City : </label>
        <input type="text" class="form-control" id="validationCustom03" placeholder="City" autocomplete="off" name="city" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <label for="validationCustom04">Write your massage : </label>
      <textarea class="form-control" name="message" id="validationCustom04" rows="3" placeholder="Write your message" autocomplete="off" required></textarea>
      <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter your message.
        </div>
    </div>


    <div class="form-group">


<div class="row justify-content-center mt-4">
      <label for="donerornot" class="pr-5" ><h6>Have you ever donated blood?</h6>
      </label>

      <div class="">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" autocomplete="off" value="Yes" required>
          <label class="custom-control-label" for="customControlValidation2">Yes</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" autocomplete="off" value="No" required>
          <label class="custom-control-label" for="customControlValidation3">No</label>
          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
        </div>
      </div>
    </div>

      <div class="form-check mt-1">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" autocomplete="off" required>
        <label class="form-check-label" for="invalidCheck">
          Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <button class="btn btn-primary px-5" name="submitmsg" type="submit" data-toggle="modal" data-target="#sendModal">Submit</button>
    

          <div class="row col-9 m-auto text-center">
              <?php 
              if(isset($_SESSION['msgcontact'])): ?>
                <div class="alert-<?=$_SESSION['msgcontact_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['msgcontact_type']?>">
                <?php 
                  echo $_SESSION['msgcontact']; 
                  unset($_SESSION['msgcontact']);
                ?>
              </div>
              <div class="alert-<?=$_SESSION['msgcontact_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>

  <!-- Send Modal-->
  <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message Sent</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Message has been sent sucessfully</div>
      </div>
    </div>
  </div>
</form>


</div>
  
</div>

<!----------------------- join us on ----------------->


<section class="mb-5 container text-dark">
  <div class="my-5 text-center">
    <h3>Join us on</h3>
  </div>
  <div class="py-5" data-aos="fade-up">
    
    <ul id="iconul">
    <li class="iconli"><a href="https://www.facebook.com/"><i class="fab fa-3x fa-facebook-f" id="fbi" aria-hidden="true"></i></a></li>
    <li class="iconli"><a href="https://twitter.com/?lang=en"><i class="fab fa-3x fa-twitter" id="twi" aria-hidden="true"></i></a></li>
    <li class="iconli"><a href="https://accounts.google.com/"><i class="far fa-3x fa-envelope" id="gi" aria-hidden="true"></i></a></li>
    <li class="iconli"><a href="https://in.linkedin.com/"><i class="fab fa-3x fa-linkedin-in" id="lii" aria-hidden="true"></i></a></li>
    <li class="iconli"><a href="https://www.instagram.com/"><i class="fab fa-3x fa-instagram" id="igi" aria-hidden="true"></i></a></li>
    </ul>
    
  </div>
</section>


<!----------------------- enddd join us ----------------->

<?php include 'include/footer.php'; ?>


</div> <!--end home -->
<!--
<div class="container py-5">
  <h4> Welcome <?php //echo $_SESSION['username']; ?> </h4>
  <h2 class="py-5"><a href="logout.php">Logout</a></h2>
</div>
-->
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
  'use strict';
  window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
  event.preventDefault();
  event.stopPropagation();
  }
  form.classList.add('was-validated');
  }, false);
  });
  }, false);
  })();
</script>
<script>$('.carousel').carousel()</script> 


<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>