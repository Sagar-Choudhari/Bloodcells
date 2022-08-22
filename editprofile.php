
<?php

require_once 'user/update.php';

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
    <title>Bloodcells - Edit Profile</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script type="text/javascript">
    
    $(document).ready(function(){
      $("#authors").change(function(){
        var aid = $("#authors").val();
        $.ajax({
          url: 'dataconn/data.php',
          method: 'post',
          data: 'aid=' + aid
        }).done(function(books){
          console.log(books);
          books = JSON.parse(books);
          $('#books').empty();
          $('#books').append('<option value="" selected="" disabled="">Select District</option>')
          books.forEach(function(book){
            $('#books').append('<option>' + book.city_name + '</option>')
          })
        })
      })
    })
    </script>
  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->


    <?php include('user/nav.php'); ?>
<?php 


// if(isset($_SESSION['updatesuccess'])) {
//   echo"<script>pop()
//       function popup() {
//   const Toast = Swal.mixin({
//     toast: false,
//     position: 'top-center',
//     showConfirmButton: false,
//     timer: 2000,
//     timerProgressBar: true,
//     onOpen: (toast) => {
//       toast.addEventListener('mouseenter', Swal.stopTimer)
//       toast.addEventListener('mouseleave', Swal.resumeTimer)
//     }
//   })

//   Toast.fire({
//     icon: 'success',
//     title: 'Registration successfull'
//     text: 'Your registration at bloodcells is successfull. You can login now.',
//   })
//   }

//    function pop() {
//     Swal.fire({
//     position: 'top-center',
//     icon: 'success',
//     title: 'Your registration has been successfull.',

//     showConfirmButton: true,
//     timer: 3000
//   }) 
//   }
//   </script>";
//   unset($_SESSION['updatesuccess']);
// } 
?>


<?php  
if(isset($_SESSION['updated'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Data Updated Successfully',
    text: 'Your details has been updated Successfully',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['updated']);

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
    text: 'You entered wrong captcha code. Please enter correct captcha code to register.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['wrongcode']);

}
?>

<?php  
if(isset($_SESSION['wrongpass'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: 'Wrong current password!!!',
    text: 'You entered wrong current password. Please enter correct current password to change password.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['wrongpass']);

}
?>



<?php if(isset($_SESSION['emailexist'])){
  echo"<script>pop()
  function pop() {
      Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Email already exist!!!',
      text: 'Please use diffrent email address. Email that you enterd is already exist in our database. There is an account with this email address.',
      showConfirmButton: true,
    }) 
    }
  </script>";
  unset($_SESSION['emailexist']);
}
?>


<?php if(isset($_SESSION['phoneexist'])){
  echo"<script>pop()
  function pop() {
      Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Phone number already exist!!!', 
      text: 'Please use diffrent phone number. Phone number that you enterd is already exist in our database. There is an account with this phone number.',
      showConfirmButton: true,
    }) 
    }
  </script>";
        unset($_SESSION['phoneexist']);
}
?>

<?php if(isset($_SESSION['errorep'])){
  echo"<script>pop()
  function pop() {
      Swal.fire({
      position: 'top-center',
      icon: 'error',
      title: 'Contact already exist!!!', 
      text: 'Phone number or email that you enterd is already exist in our database. There is an account with this phone number or email. Please use diffrent phone number or email.',
      showConfirmButton: true,
    }) 
    }
  </script>";
        unset($_SESSION['errorep']);
}
?>

  <!-- Page Wrapper -->
<div id="wrapper" class="bg-light rounded container pt-5">



<?php include('user/sidebar.php'); ?>

    

<div id="content-wrapper" class="rounded">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">
<?php 


$email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$data = $user->fetch_assoc();


?>

<div class="h5 ml-4 text-capitalize row text-dark"><span class="h6 mt-1">&nbsp;&nbsp;&nbsp;Welcome&nbsp;</span><?php echo $data['fname']." ".$data['lname']; ?></div>

<label class="text-center text-info h4 my-2">Update Profile Details</label>

        <!-- Main Content -->
        <div id="content" class="mt-3">


          <div class="container-fluid pb-4">

            <form action="user/update.php" method="POST" accept-charset="utf-8" class="needs-validation text-gray-900" novalidate>

              <input type="hidden" name="sessionemail" value="<?php echo $_SESSION['email']; ?>">

            <div class="row">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="fname">First Name :</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" autocomplete="off" value="<?php echo $data['fname']; ?>" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter first name.</div>
              </div>
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="lname">Last Name :</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" autocomplete="off" value="<?php echo $data['lname']; ?>" required>
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
            <div class="row">
              <div class="form-group col-4">
                <label for="bloodgroup">Select Blood Group :</label>
                <select name="bloodgroup" class="custom-select form-control" autocomplete="off" required>
                  <option value="<?php echo $data['bgroup']; ?>" selected><?php echo $data['bgroup']; ?></option>
                  <?php while ($row = $bloodgroup->fetch_assoc()): ?>
                  <option value="<?php echo $row['bloodgroup']; ?>"><?php echo $row['bloodgroup']; ?></option>
                  <?php endwhile; ?>
                </select>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please select your blood group.</div>
              </div>

<?php $gender = $data['gender']; ?>

              <div class="justify-content-center col-3">
                <label for="gender">Select Gender :</label>
                <div class="">
                  <div class="row ml-2 mt-2">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customControlValidation2" <?php if ($gender=="Male"){ echo "checked"; } ?> name="findgender" autocomplete="off" value="Male" required>
                          <label class="custom-control-label" for="customControlValidation2">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customControlValidation3" <?php if ($gender=="Female"){ echo "checked"; } ?> name="findgender" autocomplete="off" value="Female" required>
                          <label class="custom-control-label" for="customControlValidation3">Female</label>
                          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
                        </div>
                      </div>
                </div>
              </div>

              <div class="form-group col-5">
                <label for="age">Enter Your Age :</label>
                <input type="tel" class="form-control" id="age" maxlength="2" value="<?php echo $data['age']; ?>" placeholder="Enter Age" name="age" pattern="[0-9]{2}" autocomplete="off" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter your current age.</div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-8 col-12 col-sm-12 col-md-12">
                <label for="email">Email : </label>
                <input type="email" class="form-control" id="email" value="<?php echo $data['email']; ?>" autocomplete="off" placeholder="Enter Email" name="email">
              </div>
              <div class="form-group col-lg-4 col-12 col-sm-12 col-md-12">
                <label for="pincode">Pincode : </label>
                <input type="tel" class="form-control" id="pincode" autocomplete="off" placeholder="Enter Pincode"  pattern="[0-9]{6}" value="<?php echo $data['pincode']; ?>" maxlength="6" name="pincode" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter pincode.</div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="mobno">Mobile Number (+91) : </label>
                <input type="tel" class="form-control" id="mobno" value="<?php echo $data['mobno']; ?>" placeholder="Enter Mobile Number" name="mobno" pattern="[0-9]{10}"  maxlength="10" autocomplete="off" >
              
              </div>
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="state">State :</label>
<?php
    $stateid = $data['state'];
    $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
    $state = $mysqli->query("SELECT * FROM `all_states` WHERE `state_code` = '$stateid'") or die($mysqli->error);
    $state_name = $state->fetch_assoc()
?>
                <select class="custom-select form-control" name="authors" id="authors" autocomplete="off" required>
                  <option value="<?php echo $data['state']; ?>" selected><?php echo $state_name['state_name']; ?></option>
                  
                  <?php
                    require 'dataconn/data.php';
                    $authors = loadAuthors();
                    foreach ($authors as $author) {
                      echo "<option id='".$author['state_code']."' value='".$author['state_code']."'>".$author['state_name']."</option>";
                    }
                  ?>
                </select>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please select state.</div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="district">District :</label>
                <select class="custom-select form-control" name="books" id="books" autocomplete="off" required>
                  <option  value="<?php echo $data['district']; ?>" selected=""><?php echo $data['district']; ?></option>
                </select>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please select district.</div>
              </div>
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="uname">City :</label>
                <input type="text" value="<?php echo $data['city']; ?>" class="form-control" id="city" placeholder="Enter your city" name="city" autocomplete="off" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter city.</div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
                <label for="pwd">Cureent Password :</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter current password" name="pwd" autocomplete="off" required>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter the password.</div>
              </div>
            </div>
            
            <div class="form-group form-inline mt-3">
              <label>Enter captcha : </label>

              <input type="text" class="form-control ml-3" name="vercode" maxlength="5" autocomplete="off" required/>&nbsp;&nbsp;&nbsp;

              <img src="dataconn/captcha.php" class="rounded">

              <div class="invalid-feedback">Please enter the captcha.</div>

            </div>
          
            <div class="row ml-1 ">

            <button type="submit" name="update" class="btn btn-primary px-3">Update</button>

              
            </div>


            </form>
            
          </div>

        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-3">






        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
</div>
<?php include('include/footer.php'); ?>
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
<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
  </body>
  </html>

