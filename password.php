
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
    <title>Bloodcells - Change Password</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->
<?php require_once 'user/changepass.php'; ?>


<?php include('user/nav.php'); ?>

   

<?php  
if(isset($_SESSION['passchange'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Password Changed :)',
    text: 'Password has been succesfully changed.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['passchange']);

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


<?php  
if(isset($_SESSION['wrongmatch'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'warning',
    title: 'Re-entered wrong new password!!!',
    text: 'You re-entered wrong new password. Please enter same password in both new password field.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['wrongmatch']);

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
$user = $mysqli->query("SELECT fname,lname FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error);

$name = $user->fetch_assoc();


?>

<div class="h5 ml-4 text-capitalize row text-gray-900"><span class="h6 mt-1">&nbsp;&nbsp;&nbsp;Welcome&nbsp;</span><?php echo $name['fname']." ".$name['lname']; ?></div>


        <!-- Main Content -->
        <div id="content" class="">




<div class="container w-50 mt-3">
  <form action="user/changepass.php" method="POST" class="needs-validation text-gray-900" accept-charset="utf-8" novalidate>

    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">

    <div class="form-group">
      <label>Enter current password : </label>
      <input type="password" name="cpass" class="form-control" value="" placeholder="" required>
      <div class="valid-feedback">Looks Good.</div>
      <div class="invalid-feedback">Please enter the current password.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Enter new password : </label>
      <input type="password" class="form-control" value="" placeholder="" id="pwd" name="pwd" required>
      <div class="valid-feedback">Looks Good.</div>
      <div class="invalid-feedback">Please enter the new password.</div>
    </div>
    <div class="form-group">
      <label for="pwd2">Re-enter new password : </label>
      <input type="password" class="form-control" value="" placeholder="" id="pwd2" name="pwd2" required>
      <div class="valid-feedback">Looks Good.</div>
      <div class="invalid-feedback">Please re-enter the new password.</div>
    </div>
    <div id="showErrorPwd" class="m-2"></div> 
            <script>
              $(document).ready(function(){
                  
                $('#pwd2').keyup(function(){
                  var pwd = $('#pwd').val();
                  var pwd2 = $('#pwd2').val();

                  if (pwd2!=pwd||pwd!=pwd2) {
                    $('#showErrorPwd').html('**Password does not match.');
                    $('#showErrorPwd').css('color','red');
                    
                    $('#submitbtnn').attr("disabled",true);
                    return false;
                  }
                  else {
                    $('#showErrorPwd').html('**Password matched.');
                    $('#showErrorPwd').css('color','#28A745');
                    $('#submitbtnn').attr("disabled",false);
                    return true;
                  }

                });

                $('#pwd').keyup(function(){
                  var pwd = $('#pwd').val();
                  var pwd2 = $('#pwd2').val();

                  if (pwd2!=pwd||pwd!=pwd2) {
                    $('#showErrorPwd').html('**Password does not match.');
                    $('#showErrorPwd').css('color','red');
                    
                    $('#submitbtnn').attr("disabled",true);
                    return false;
                  }
                  else {
                    $('#showErrorPwd').html('**Password matched.');
                    $('#showErrorPwd').css('color','#28A745');
                    $('#submitbtnn').attr("disabled",false);
                    return true;
                  }

                });

              });
              </script>
    <div class="form-group">
      <button type="submit" id="submitbtnn" name="changepassword" class="btn btn-primary">Change Password</button>
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

