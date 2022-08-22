<?php require_once 'dataconn/br.php'; 


if(isset($_SESSION['email'])){
  header('location:register.php');
}


?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Before Register</title>


    <?php include('include/common_links.php'); ?>


    <!-- css -->
    <link rel="stylesheet" href="css/register.css" type="text/css">
  </head>
  <body id="page-top">
       
<!--  Navigation bar -->
    <div class="container-fluid">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto font-weight-normal">
                <li class="nav-item active"> <a class="nav-link text-dark" href="index.php">Home</a> </li>
                <li class="nav-item"> <a class="nav-link text-dark" href="register.php">Register</a> </li>
                <li class="nav-item"> <a class="nav-link text-dark" href="all_request.php">Request</a> </li>
                
                <li class="nav-item"> <a class="nav-link text-dark" href="camps.php">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link text-dark" href="contact.php">Contact Us</a> </li>
                <li class="nav-item"> <a class="nav-link text-dark" href="about.php">About Us</a> </li>
                
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
      <!-- end  Navigation bar -->

<div class="container mt-3 text-dark">
<h2>Before you register as a blood donor</h2>
<p>
Most people can give blood but sometimes it is not possible to be a blood donor.<br>
Please answer all of the following five questions so that we can advise if blood donation is appropriate for you.<br>
Your responses are not recorded in any way.<br>
These questions only apply if you want to register as a new blood donor. If you are already a registered blood donor please create an online account</p>


<form action="dataconn/br.php" method="POST" accept-charset="utf-8"> 
 
<div class="mt-4">
<h5>1 : Are you 17 – 65 years old?
</h5>
<a href="question.php" title=""><p class="ml-4">
Find out more about why your age is important.</p></a>

    <div class="custom-control ml-4 custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation1" name="q1" autocomplete="off" value="Yes" required>
          <label class="custom-control-label" for="customControlValidation1">Yes</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation2" name="q1" autocomplete="off" value="No" required>
          <label class="custom-control-label" for="customControlValidation2">No</label>
          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
        </div>
</div>
<br>
<div class="mt-4">
<h5>2 : Do you currently weigh less than 50kg (7 stone 12 pounds)?
</h5>
<a href="question.php" title=""><p class="ml-4">
Find out more about why your weight is important.</p></a>

   <div class="custom-control ml-4 custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation3" name="q2" autocomplete="off" value="Yes" required>
          <label class="custom-control-label" for="customControlValidation3">Yes</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation4" name="q2" autocomplete="off" value="No" required>
          <label class="custom-control-label" for="customControlValidation4">No</label>
          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
        </div>
</div>
<br>
<div class="mt-4">
<h5>3 : Have you ever had a cancer other than basal cell carcinoma or cervical carcinoma insitu (CIN)?
</h5>
<a href="question.php" title=""><p class="ml-4">
Find out more about why it is important.</p></a>

    <div class="custom-control ml-4 custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation5" name="q3" autocomplete="off" value="Yes" required>
          <label class="custom-control-label" for="customControlValidation5">Yes</label>
        </div>
        <div class="custom-control  custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="customControlValidation6" name="q3" autocomplete="off" value="No" required>
          <label class="custom-control-label" for="customControlValidation6">No</label>
          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
        </div>
</div>
    <button type="submit" name="submit" class="btn btn-primary mt-4 px-5">Submit</button>
  </form>
</div>


  



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


<?php include('include/scripts.php'); ?>

</p></div>
<?php 


if (isset($_SESSION['correctquestion'])) {
  echo"<script>popup()
      function popup() {
  const Toast = Swal.mixin({
    toast: false,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'You are eligible to register :)'
  })
  }

  </script>";
  unset($_SESSION['correctquestion']);
} 



// if(isset($_SESSION['noweicancer'])) {
// echo"<script>pop()
// function pop() {
//     Swal.fire({
//     position: 'top-center',
//     icon: 'success',
//     title: 'Data Updated Successfully',
//     text: 'Your details has been updated Successfully',
//     showConfirmButton: true,
//   }) 
//   }
//   </script>";
//   unset($_SESSION['noweighancer']);

// }

if(isset($_SESSION['noweightcancer'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because your weight is to low and you had cancer in past. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noweightcancer']);

}


if(isset($_SESSION['nocancer'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because you had cancer in past. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['nocancer']);

}


if(isset($_SESSION['noage'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because you have to be 17 – 65 years old. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noage']);

}

if(isset($_SESSION['noweight'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because your weight is to low. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noweight']);

}

if(isset($_SESSION['noageweightcancer'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because you have to be 17 – 65 years old, your weight is to low & you had cancer in past. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noageweightcancer']);

}

if(isset($_SESSION['noagecancer'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because you have to be 17 – 65 years old & you had cancer in past. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noagecancer']);

}

if(isset($_SESSION['noageweight'])) {
echo"<script>pop()
function pop() { 
Swal.fire({
  icon: 'error',
  title: 'You are not eligible to donate!',
  text: 'You are not eligible to donate because you have to be 17 – 65 years old & your weight is to low. click the link below to know more details',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  footer: '<a href=question.php>Why I am not eligible to donate?</a>'
})
  }
  </script>";
  unset($_SESSION['noageweight']);

}
?>


</body>
</html>