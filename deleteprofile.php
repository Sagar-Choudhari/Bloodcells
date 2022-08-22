
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
    <title>Bloodcells - Delete Profile</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->

<?php include('user/nav.php'); ?>

<?php include('user/delete.php'); ?>  

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

<div class="container ml-4 my-5">
<h5>Do you really want to delete your account from bloodcells.</h5>

<h6>Please enter your password to confirm its you.!!</h6>
</div>
<div class="container w-50 float-left text-left ml-4 mt-3">



  <form action="user/delete.php" method="POST" class="needs-validation text-gray-900" accept-charset="utf-8" novalidate>

    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">

    <div class="form-group">
      <label>Enter password : </label>
      <input type="password" name="password" class="form-control" value="" placeholder="" required>
      <div class="valid-feedback">Looks Good.</div>
      <div class="invalid-feedback">Please enter the current password.</div>
    </div>

    <div class="form-group">
      <button type="submit" name="delete" class="btn btn-primary">Delete Account</button>
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

