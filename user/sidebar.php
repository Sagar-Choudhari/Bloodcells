    <!-- Sidebar -->
    <ul class="navbar-nav text-dark sidebar accordion" id="accordionSidebar" data-aos="fade-right">


      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 14px;">
        Workstation
      </div>


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active mt-3">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      </li>
  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="donateus.php">
          <i class="fas fa-fw fa-rupee-sign"></i>
          <span>Donate us</span>
        </a>

      </li>

<?php 

$session = $_SESSION['email'];


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$msg = $mysqli->query("SELECT SUM(CASE when replied='YES' THEN 1 ELSE 0 END) AS Count from appoitments WHERE `from`='$session'") or die($mysqli->error);
$c = $msg->fetch_assoc();
$count = $c['Count'];
//$count = mysqli_num_rows($msg);
// echo $count;
if ($count>0): 

 ?>

  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="msgfromadmin.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Messages
          <span class="badge badge-danger badge-counter float-left">^_^</span>
          </span>
        </a>

      </li>

<?php endif; ?>





<?php 

$session = $_SESSION['email'];


$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$help = $mysqli->query("SELECT SUM(CASE when replied='YES' THEN 1 ELSE 0 END) AS Counthelp from request WHERE `email`='$session'") or die($mysqli->error);
 $data = $help->fetch_assoc();
$counthelp = $data['Counthelp'];
// $counthelp = mysqli_num_rows($help);
// echo $counthelp;
if ($counthelp>0): 
// SELECT replied, IF (replied IS NULL OR replied = '', 1, 0) as empty_field_count from request WHERE email = 'rak@sha'
// select SUM(CASE when replied='YES' THEN 1 ELSE 0 END) AS Count from request WHERE email='ishan@ch.com'
 ?>

  <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="helpfromadmin.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Requests help from admin
          <span class="badge badge-danger badge-counter float-left">^_^</span>
          </span>
        </a>

      </li>

<?php endif; ?>

 <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAppoitments" aria-expanded="true" aria-controls="collapseAppoitments">
          <i class="fas fa-fw fa-calendar-check"></i>
          <span>Appoitments </span>
        </a>
        <div id="collapseAppoitments" class="collapse" aria-labelledby="headingAppoitments" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fix Appoitments :</h6>
            <a class="collapse-item" href="appoitments.php">Set Appoitment</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-file-upload"></i>
          <span>Upload</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Upload to bloodcells:</h6>
            <a class="collapse-item" href="uploadtoadmin.php">Upload Images</a>

          </div>
        </div>
      </li>


      <!-- Nav Item Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCamps" aria-expanded="true" aria-controls="collapseCamps">
          <i class="fas fa-fw fa-campground"></i>
          <span>Campaign & Events</span>
        </a>
        <div id="collapseCamps" class="collapse" aria-labelledby="headingCamps" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Camps:</h6>
            <a class="collapse-item" href="camps.php">View All Camps</a>

          </div>
        </div>
      </li>

 <!-- Divider -->
      <hr class="sidebar-divider">

<!-- Nav Item Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link " href="password.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Change Password</span>
        </a>
      </li>


<!-- Nav Item Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
          <i class="fas fa-fw fa-id-badge"></i>
          <span>Profile</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingProfile" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Handle:</h6>
            <a class="collapse-item" href="userprofile.php">View Profile</a>
            <a class="collapse-item" href="editprofile.php">Edit Profile Details</a>
            <a class="collapse-item text-danger" href="deleteprofile.php">Delete Profile</a>

          </div>
        </div>
      </li>
 

    </ul>
    <!-- End of Sidebar -->