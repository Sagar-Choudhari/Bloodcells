<?php
session_start() 
?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Requests</title>
    <?php include'include/common_links.php'; ?>
    <!-- scripts -->
    <?php include'include/scripts.php'; ?>
    <!-- css -->
    <link rel="stylesheet" href="css/all_request.css" type="text/css">
    
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
      <!-- end  Navigation bar -->

  
<!--  <div class="container p-5 mt-3 box">
        <a href="request.php" title="If you want a blood for any you can post a blood request." class="btn btn-outline-success post-btn">Post Blood Request</a>
      </div> -->

<div class="container mt-3 left-img" data-aos="fade-up">
  <img src="assets/bloodtransfer.png" class="w-25 mr-5 float-left" alt="bloodtranfer">
  <a href="request.php" title="If you want a blood for any you can post a blood request." class="btn btn-danger ml-5 shadow-sm">
    Post Request for Blood
  </a>
</div>




<?php 

      $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
      $request = $mysqli->query("SELECT * FROM request ORDER BY id DESC") or die($mysqli->error);

      // to get record value
      // pre_r($request);
    ?> 

        <div class="container">
          <div class="mt-5">
            <div class="text-gray-900 text-center"><h4 class="pb-2">- Requests For Blood -</h4></div>
            <div class="row justify-content-center" data-aos="fade-up">
              <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="font-weight-normal">Required Date</th>
                    <th scope="col" class="font-weight-normal">Name</th>
                    <th scope="col" class="font-weight-normal">Bloodgroup</th>
                    <th scope="col" class="font-weight-normal">Contacts</th>
                    <th scope="col" class="font-weight-normal">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $request->fetch_assoc()): ?>
                  <tr>

                    <td class="text-gray-900"><?php echo $row['required_date']; ?></td>

                    <td class="text-gray-900"><div class="text-capitalize"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></div></td>

                    <td class="font-weight-bold text-danger text-center"><?php echo $row['bgroup']; ?></td>

                    <td class="text-gray-900"><?php echo $row['mobile']; ?>&comma;&nbsp;<?php echo $row['email']; ?></td>

                    <td class="text-gray-900"><?php echo $row['details']; ?></td>

                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
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
      </div> <!-- first div -->

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

    </body>
  </html>