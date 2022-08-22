
<?php require_once 'dataconn/request_server.php'; ?> 

<?php

if(!isset($_SESSION['email'])){
  header('location:login_request.php');
}


if(isset($_GET['logout'])){

  session_destroy();
  unset($_SESSION['email']);
  header('location :index.php');
}

?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Post Request</title>
    <?php include('include/common_links.php'); ?>
    <!-- css -->
    <link rel="stylesheet" href="css/request.css" type="text/css">
    <?php include('include/scripts.php'); ?>


<?php 


if (isset($_SESSION['requestsuccess'])) {
  echo"<script>popup()
      function popup() {
  const Toast = Swal.mixin({
    toast: false,
    position: 'top-center',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'Request sent successfully'
  })
  }

   function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Your registration has been successfull.',

    showConfirmButton: true,
    timer: 3000
  }) 
  }
  </script>";
  unset($_SESSION['requestsuccess']);
}
?>


        <?php
 
if(isset($_SESSION['wrongcode'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'warning',
    title: 'Wrong captcha code!!!',
    text: 'You entered wrong captcha code. Please enter correct captcha code to request.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['wrongcode']);

}
?>
  </head>
  <body id="page-top"> 




    <!--  Navigation bar -->
    <div class="">
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
              <!-- Dropdown - User Information -->
             

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
      <div class="container">



<?php
        if(!isset($_SESSION['email'])) : 
        {
  $_SESSION['msg'] = "You must login to view this page";
?> 

        <div class="container my-4 py-1 text-gray-dark text-center badge-danger rounded">

          <?php echo $_SESSION['msg']; ?> </div><hr class="p-2">

<?php } ?>
<?php endif; ?>



<?php
    $email = $_SESSION['email'];

    $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
    $data = $mysqli->query("SELECT * FROM user_reg WHERE email = '$email'") or die($mysqli->error);
    // to get record value
    // pre_r($data);
  ?>



  
    <?php $row = $data->fetch_assoc() ?>


        <div class="mt-4">
          
          <form action="dataconn/request_server.php" class="needs-validation" method="post" novalidate>
            <div class="row w-75">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="fname" class="text-gray-900">First Name :</label>
                <input type="text" class="form-control text-gray-900" id="fname" value="<?php echo $row['fname']; ?>" placeholder="Enter First Name" readonly name="fname" autocomplete="off" required>


                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter first name.</div>
              </div>
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="lname" class="text-gray-900">Last Name :</label>
                <input type="text" class="form-control text-gray-900" id="lname" placeholder="Enter Last Name" value="<?php echo $row['lname']; ?>" readonly name="lname" autocomplete="off"  required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter last name.</div>
              </div>
            </div>
            <!--  to get bloodgroup selection -->
            <?php
            $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
            $bloodgroup = $mysqli->query("SELECT * FROM bloodgroup") or die($mysqli->error);
            // to get record value
            // pre_r($bloodgroup);
            ?>
            <div class="row w-75">
              <div class="form-group col-4 col-md-12 col-sm-12">
                <label for="bloodgroup" class="text-gray-900">Select Blood Group of patient :</label>
                <select name="bloodgroup" class="text-gray-900 custom-select form-control" autocomplete="off" required>
                  <option value="" selected="" disabled="">Select Bloodgroup</option>
                  <?php while ($row = $bloodgroup->fetch_assoc()): ?>
                  <option value="<?php echo $row['bloodgroup']; ?>"><?php echo $row['bloodgroup']; ?></option>
                  <?php endwhile; ?>
                </select>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please select your blood group.</div>
              </div>
              <div class="form-group col-3 col-md-12 col-sm-12">
              <label for="gender" class="text-gray-900">Select Gender of patient :</label>
<!--               <div class="form-inline form-group">
                <div class="mx-3">
                  <input type="radio" class="text-gray-900 custom-radio mx-1 radio form-control" name="gender" value="Male" autocomplete="off" required/>Male
                </div>
                  <input type="radio" class="text-gray-900 custom-radio mx-1 radio form-control" name="gender" autocomplete="off" value="Female" required/>Female

                  <div class="valid-feedback">Looks Good.</div>
                  <div class="invalid-feedback">Please select gender.</div>
                
              </div> -->

              <div class="row ml-2 mt-2">
                <div class="custom-control text-gray-900 custom-radio custom-control-inline">
                  <input type="radio" class="text-gray-900 mx-1 custom-control-input" id="customControlValidation2" name="gender" autocomplete="off" value="Male" required>
                  <label class="custom-control-label" for="customControlValidation2">Male</label>
                </div>
                <div class="custom-control text-gray-900 custom-radio custom-control-inline">
                  <input type="radio" class="text-gray-900 mx-1 custom-control-input" id="customControlValidation3" name="gender" autocomplete="off" value="Female" required>
                  <label class="custom-control-label" for="customControlValidation3">Female</label>
                  <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
                </div>
              </div>


            </div>
            <div class="form-group col-5 col-md-12 col-sm-12">
                <label for="age" class="text-gray-900">Enter Age of patient :</label>
                <input type="text" class="text-gray-900 form-control" id="age" placeholder="Enter Age" name="age" autocomplete="off" maxlength="2" pattern="[0-9]{2}" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter your current age.</div>
              </div>
              
            </div>

<?php
    $email = $_SESSION['email'];

    $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
    $data = $mysqli->query("SELECT * FROM user_reg WHERE email = '$email'") or die($mysqli->error);
    // to get record value
    // pre_r($data);
  ?>


  
  
    <?php $row = $data->fetch_assoc() ?>
            <div class="row w-75">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="email" class="text-gray-900">Email : </label>
                <input type="email" class="text-gray-900 form-control" id="email" autocomplete="off" placeholder="Enter Email" value="<?php echo $row['email']; ?>" readonly name="email" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter email.</div>
              </div>
             
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="mobno" class="text-gray-900">Mobile Number (+91) : </label>

                <input type="number" class="text-gray-900 form-control" id="mobno" placeholder="Enter Mobile Number" value="<?php echo $row['mobno']; ?>" readonly name="mobile" autocomplete="off" required>

                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter mobile number.</div>
              </div>

            </div>


    
            <div class="row form-group w-75">
                  <div class="col-lg-5 col-12 col-sm-12 col-md-12">
                  <label for="reqdate" class="text-gray-900">Required Date :</label>
                  <input type="date" name="required_date" value="" class="text-gray-900 form-control" placeholder="Select date and time" required>
                  <div class="valid-feedback">Looks Good.</div>
                  <div class="invalid-feedback">Please select a date of requirments.</div>
                </div>
                <div class="col-lg-7 col-12 col-sm-12 col-md-12">
                  <label for="city" class="text-gray-900">City :</label>
                  <input type="text" name="city" class="text-gray-900 form-control" placeholder="Enter city" required>
                  <div class="valid-feedback">Looks Good.</div>
                  <div class="invalid-feedback">Please enter city.</div>
                </div>
              </div>

              <div class="form-group pl-0 ml-0 col-12 col-sm-12 col-md-12 w-50">
                <label for="details" class="text-gray-900">Details : (Please enter necessary details like why you want blood drive, where you want, in which hospital you are, address, your address etc.)</label>
                <div class="">
                <textarea name="details" class="text-gray-900 form-control" rows="5" required></textarea>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter some necessary details like why you want blood drive, where you want, in which hospital you are, address, etc.</div>
              </div>
              </div>
              
            

            <div>
              <div class="form-group mt-3">
                  <label for="vercode" class="text-gray-900">Enter captcha : </label>
                  <div class="form-inline">
                    <input type="text" class="text-gray-900 form-control w-25" name="vercode" maxlength="5" autocomplete="off" required/>&nbsp;&nbsp;&nbsp;
                    <img src="dataconn/captcha.php" class="rounded">
                    <div class="invalid-feedback">Please enter the captcha.</div>
                  </div>
                </div>
              </div>
            <div class="form-group form-check ml-1">
              <label class="form-check-label">
                <input class="form-check-input text-gray-900" type="checkbox" name="remember" required> I agree to all terms and services.
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
              </label>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit Request</button>
          </form>
        </div>
      </div>
      <?php
          function pre_r( $array){
        echo '<pre>';
          print_r($array);
            echo '</pre>';
          }
        ?>
      <?php include 'include/footer.php'; ?>
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
      
    </body>
  </html>