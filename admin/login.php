<?php
     
if(!$sock = @fsockopen('www.google.com', 80))
{
    $_SESSION['internetconnection'] = TRUE;
    include 'loginwithfb/fb-init.php'; ////disable this for actual functionality
}
 else
{
  include 'loginwithfb/fb-init.php';
}
  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BCCA student from G.H. Raisoni CCST, Nagpur.">
  <meta name="author" content="Sagar Choudhary">

  <link rel="stylesheet" href="css/loading.css">
  <!-- Bloodcells icon -->
  <link rel="icon" href="../assets/logo.png" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  
  <!-- Custom styles for this template-->
  <link href="css/admin.min.css" rel="stylesheet">
<?php //include 'include/script.php'; ?>
  <title>Admin - Login</title>

</head>
<body class="bg-gradient-danger" style="overflow-y: hidden; overflow-x: hidden;">

<!--      <div class="h4 text-dark">
          <?php //if(isset($_SESSION['access_token'])): ?>
            <a href="loginwithfb/logout.php" title="Logout">Logout</a>
          <?php //else: ?>
          <?php //endif; ?>
    </div> -->


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-9 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <?php if (isset($_SESSION['internetconnection'])):  ?>
              <div class="bg-dark m-5 rounded-pill" id="chngBg">
                <div class="text-center p-2 text-white font-weight-normal h4 m-auto d-block">

<h4 id="onUpdate" class="font-weight-normal mt-1" style="text-align: center; ">No Internet Connection :(</h4>
<script type="text/javascript">

    const onUpdate = document.getElementById("onUpdate");

    if (navigator.onLine) {
      onUpdate.textContent = "Internet Connection is available refresh Now :)";
      onUpdate.style.color="white";
    }

    //add event listeners
    window.addEventListener("online",function(){
      onUpdate.textContent = "Internet Connection is available refresh Now :)";
      onUpdate.style.color="white";
    })

    window.addEventListener("offline",function(){
      onUpdate.textContent = "No Internet Connection :(";
      onUpdate.style.color="white";
    })

</script>



                </div>
              </div>
           
            <?php endif; ?>
            <!-- unset($_SESSION['internetconnection']); -->
             
            <div class="">
              <div class="mt-5 text-center d-lg-block"><img src="img/login-bg.svg" alt="" width="60%"></div>
              <div class="m-auto d-block text-center">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Welcomeback Admin</h1>
                  </div>

          <form class="user">
<!--                   <form action="login_assets/server.php" method="POST" class="user" accept-charset="utf-8">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="userid" aria-describedby="emailHelp" placeholder="Enter Email id.." autocomplete="off" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" autocomplete="off" placeholder="Password" required>
                    </div>

                     <button type="submit" class="btn btn-primary btn-user btn-block" name="loginadmin">Login</button>
                    <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a> -->

  <?php             if (!isset($_SESSION['internetconnection'])):  ?>

                    <div class="text-center m-auto d-block row">
                      
                    
                    <a href="<?php echo $login_url; ?>" class="btn btn-facebook rounded-pill btn-user ">
                      <div class="mx-5"><i class="fab fa-facebook-f fa-fw"></i> Login with Facebook</div>
                    </a>
                    </div>
                    <small class="mt-5">You can only login with facebook</small>
<?php endif; ?>

 <?php unset($_SESSION['internetconnection']); ?>
                    <div class="mt-2 mb-0">
                      <a href="stdlogin.php">Login with standerd methods (Username - Password)</a>
                    </div>
                  </form>
                
                  
<!--                   <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                </div>
              </div>
              <!-- <div class="col-lg-6 d-none d-lg-block">

                <img src="img/undraw_posting_photo.svg" alt="" width="100%"></div> 
            </div> -->

          </div>
        </div>

     
        
    </div>
 </div>
  </div>

<?php include('include/script.php'); ?>
</body>

</html>