<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bloodcells</title>
    <?php include 'include/common_links.php'; ?>
    <?php include('include/scripts.php'); ?>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  <body id="page-top" class="bg-danger">     
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
                <li class="nav-item active"> <a class="nav-link font-weight-bold text-danger" href="index.php">Home</a> </li>
                <li class="nav-item"> <a class="nav-link font-weight-bold text-danger" href="register.php">Register</a> </li>
                <li class="nav-item"> <a class="nav-link font-weight-bold text-danger" href="all_request.php">Request</a> </li>
                
                <li class="nav-item"> <a class="nav-link font-weight-bold text-danger" href="camps.php">Activity</a> </li>
                <li class="nav-item"> <a class="nav-link font-weight-bold text-danger" href="contact.php">Contact Us</a> </li>
                <li class="nav-item"> <a class="nav-link font-weight-bold text-danger" href="about.php">About Us</a> </li>
                <li class="nav-item ml-5"> <a class="nav-link" href="login.php"><h6 class="login-button border-danger">Log-in</h6></a> </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <!-- end  Navigation bar -->

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 bg-gradient-success shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 w-50 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12 w-50">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                  <form action="dataconn/login_validation.php" method="post" class="user"accept-charset="utf-8">
                    <div class="form-group text-white">
                      <input type="email" class="form-control text-white border-0 bg-success shadow form-control-user" name="loginid" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control text-white border-0 bg-success shadow form-control-user" name="loginpass" id="exampleInputPassword" placeholder="Password"></input>
                    </div>

                    <div class="form-group ml-1 text-center">
                      <div class="row form-inline">
                        
                        <input type="text" class="form-control1 text-white border-0 bg-success-800 shadow form-control-user mx-2 rounded-pill form-control"  name="vercode" maxlength="5" placeholder="Enter captcha" autocomplete="off"/>
                        <img src="dataconn/captcha.php" class="rounded">
                      </div>
                    </div> 

                    <button type="submit" class="btn btn-primary btn-user shadow btn-block" name="login">Login</button>
                    
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

		
</div>
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
