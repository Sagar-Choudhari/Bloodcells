


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Bloodcells</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>

  <?php include 'include/common_links.php'; ?>
  <?php include('include/scripts.php'); ?>
</head>
<body>
<?php require_once'dataconn/login_validation.php'; ?>

<?php 

if(isset($_SESSION['email'])){
  header('location:all_request.php');
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
    text: 'You entered wrong captcha code. Please enter correct captcha code to login.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['wrongcode']);

}
?>

  <?php  
if(isset($_SESSION['loginerror'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: 'Wrong Email or Password!!!',
    text: 'You entered wrong email or password. Please enter correct email and password to login.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['loginerror']);

}
?>
      
  <img class="wave img2" src="images/wave.png">
  <div class="container">
    <div class="img">
      <a href="index.php" title="Go to homepage. (Bloodecells)"><img src="images/bg.svg" class="img2"></a>
    </div>
    <div class="login-content">
      <form action="dataconn/login_request_validation.php" method="post" class="user"accept-charset="utf-8">
        <img src="images/avatar.svg" class="img2">
        <h3 class="title">Welcome</h3>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5 class="hh55">Username</h5>
                    <input type="email" class="input" name="loginid" id="exampleInputEmail" aria-describedby="emailHelp" required>
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5 class="hh55">Password</h5>
                    <input type="password" class="input" name="loginpass" id="exampleInputPassword" required>
                 </div>
              </div>


              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5 class="hh55">Captcha</h5>
                     <input type="text" class="input" name="vercode" maxlength="5" autocomplete="off"/><img src="dataconn/captcha.php" class="rounded bg-danger shadow-sm ml-5 mt-2">
                 </div>
              </div>
              <button type="submit" class="loginbtn shadow-sm" name="login">Login</button>
            </form>
            <a href="index.php" id="homebtn" class="shadow-sm" title="Go to homepage. (Bloodecells)">Homepage</a>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
</body>
</html>