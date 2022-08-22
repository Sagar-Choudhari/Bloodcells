
<?php include('include/header.php'); ?>


<title>Admin - Dashboard</title>
<?php include('include/script.php'); ?>
</head>
<body id="page-top">
<?php include('include/sidebar.php'); ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php
include('include/topbar.php');
?>

     <!-- Begin Page Content -->
        <div class="container-fluid">
<div class="">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

 <!--   <div class="h4 text-dark">
          <?php //if(isset($_SESSION['access_token'])): ?>
            <a href="loginwithfb/logout.php" title="Logout">Logout</a>
          <?php //else: ?>
          <?php //endif; ?>
    </div> -->



          <!-- Content Row -->
          <div class="row">
<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $bdrive = $mysqli->query("SELECT SUM(drives) AS sumdrive FROM blooddrive") or die($mysqli->error);

  $row = $bdrive->fetch_assoc();

  //$num = mysqli_num_rows($result);
?>

            <!-- available blood Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" >
              <a href="availableblood.php" title="" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Blood</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['sumdrive']; ?><small class="font-weight-bold"> &nbsp;Drives</small></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-tint fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>


<?php 
      $conn = mysqli_connect('localhost','root');

      mysqli_select_db($conn,'bloodcells');

      $query = "SELECT * FROM `camps`;";
      $result = mysqli_query($conn, $query);

    
    $num = mysqli_num_rows($result);

    ?> 
            <!-- Event Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="all_camps.php" title="" class="text-decoration-none">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ongoing Events</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
  <?php 
      $conn = mysqli_connect('localhost','root');

      mysqli_select_db($conn,'bloodcells');

      $query = "SELECT * FROM `request`;";
      $result = mysqli_query($conn, $query);

    
    $num = mysqli_num_rows($result);

    ?> 
            <!-- request Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="requests.php" title="" class="text-decoration-none">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Requests</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $num; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
<!-- **************** to get bloodgroup selection***************** -->
    <?php 
      $conn = mysqli_connect('localhost','root');

      mysqli_select_db($conn,'bloodcells');

      $query = "SELECT * FROM `user_reg`;";
      $result = mysqli_query($conn, $query);

    
    $num = mysqli_num_rows($result);

    ?> 
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="all_member.php" title="" class="text-decoration-none">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Registrated Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
</div>


<div class="container mt-4 text-dark">
  <label class="h5 text-danger">Add Blood drive</label>
<?php require_once 'blooddrive/server.php'; ?>
 <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
               <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['msgdrive'])): ?>
              <div class="alert-<?=$_SESSION['msgdrive_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['msgdrive_type']?>">
                <?php 
                  echo $_SESSION['msgdrive']; 
                  unset($_SESSION['msgdrive']);
                ?>
              </div>
               <div class="alert-<?=$_SESSION['msgdrive_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>
  <div>

<form action="blooddrive/server.php" method="POST" class="mt-4 w-75 was-validate text-dark" accept-charset="utf-8">
  <div>

<?php
    $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
    $camps = $mysqli->query("SELECT * FROM camps") or die($mysqli->error);
?>
        <div class="form-group">
          <label for="camps">Campaign&#32;&#58;&#32;</label>
          <select name="camps" class="custom-select form-control" autocomplete="off" required>
            <option value="" selected="" disabled="">Select&#32;Campaign</option>
            <?php while ($row = $camps->fetch_assoc()): ?>
            <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?>&#32;&#47;&#47;&#32;<?php echo $row['address']; ?>&#32;&#47;&#47;&#32;<?php echo $row['date']; ?>&#32;&#47;&#47;&#32;<?php echo $row['time']; ?></option>
            <?php endwhile; ?>
          </select>
          <div class="valid-feedback">Looks Good.</div>
          <div class="invalid-feedback">Please select your blood group.</div>
        </div>
  </div>
      <div>

<?php
    $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
    $user = $mysqli->query("SELECT * FROM user_reg ORDER BY fname ASC") or die($mysqli->error);
?>
        <div class="form-group">
          <label for="user">Username&#32;&#58;&#32;</label>
          <select name="user" class="custom-select form-control text-dark" autocomplete="off" required>
            <option value="" selected="" disabled="">Select&#32;User</option>
            <?php while ($row = $user->fetch_assoc()): ?>
            <option value="<?php echo $row['email']; ?>">

              <?php echo $row['fname']; ?>&#32;<?php echo $row['lname']; ?>&#32;&#47;&#47;&#32;
              <div class="text-danger font-weight-bold">
                <?php echo $row['bgroup']; ?> 
              </div>&#32;&#47;&#47;&#32;
              <?php echo $row['email']; ?>

            </option>
            <?php endwhile; ?>
          </select>
          <div class="valid-feedback">Looks Good.</div>
          <div class="invalid-feedback">Please select your blood group.</div>
        </div>
  </div>

  <div class="form-group">
    <label for="drive">Blood&#32;Drive&#32;&#58;&#32;</label>
    <input type="number" class="form-control" required name="nosunits" placeholder="Enter number of units">
  </div>
  <div class="form-group">
    <label for="details">Details&#32;&#58;&#32;</label>
    <textarea name="details" rows="4" placeholder="Enter Some Details" class="form-control" required></textarea>
  </div>

<div>
  <button type="submit" name="submitdrive" class="btn btn-success px-4">Submit</button>
</div>

    </form>
  </div>
</div>


<div class="container">
  
    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">

   
        <!-- Begin Page Content -->
        <div class="container-fluid mt-3">

  <table>        

<?php 



$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT * FROM `blooddrive` ORDER BY id DESC") or die($mysqli->error);

$num = mysqli_num_rows($user); ?>


<?php while ($details = $user->fetch_assoc()): ?>
<tbody id="myTable">
     <tr>
<td>
<div>
    <div class="card m-2 alert-secondary">
      <div class="card-body">
          <div class="row">
            <div class="col-auto h6">
            <div class="text-gray-900 my-2">Donated&#32;&#58;&#32;<?php echo $details['drives']." drives"; ?></div>
            <div class="text-gray-800 my-2">At&#32;&#58;&#32;<?php echo $details['campaign']; ?></div>
            <div class="font-weight-normal text-gray-800 my-2">Details&#32;&#58;&#32;<?php echo $details['details']; ?></div>

<?php 
$camp = $details['campaign'];
  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM camps WHERE `title`='$camp' ORDER BY id DESC") or die($mysqli->error);

  while ($date = $result->fetch_assoc()): 
?>



            <div class="text-gray-800 my-2">Date&#32;&#58;&#32;<?php echo $date['date']; ?></div>
            <div class="text-gray-800 my-2">Time&#32;&#58;&#32;<?php echo $date['time']; ?></div>
            </div>

      <div class="col-auto">

<?php 


 $emailuser = $details['user'];

 $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
 $userdetails = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$emailuser'") or die($mysqli->error);

 while($getname = $userdetails->fetch_assoc()):


?>

              <div class="h5 ml-4 text-capitalize">Name : <?php echo $getname['fname']." ".$getname['lname']; ?></div>
              <div class="h5 ml-4  text-danger"><span class="text-gray-900">Bloodgroup : </span><?php echo " ".$getname['bgroup']; ?></div>
            </div> 
 
          </div>
      </div>
    </div>
</div>


<?php endwhile; ?> 
<?php endwhile; ?>
<?php endwhile; ?>
</td>
</tr>
            </tbody>
             </table>
        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Content Wrapper -->
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




<?php
include('include/footer.php');
?>
      

    </div>
    <!-- End of Content Wrapper -->


  
<?php
include('include/scrolltotop.php');

include('include/logoutmodal.php');

?>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

</body>

</html>