
<!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input  id="myInput" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-danger" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
<h5 class="text-gray-800 font-weight-normal mt-1">Status&nbsp;:&nbsp;</h5>
<h5 id="onUpdate" class="font-weight-normal mt-1" style="text-align: center; ">I'm not sure yet!!</h5>
<script type="text/javascript">

    const onUpdate = document.getElementById("onUpdate");

    if (navigator.onLine) {
      onUpdate.textContent = "Online! :)";
      onUpdate.style.color="green";
    }

    //add event listeners
    window.addEventListener("online",function(){
      onUpdate.textContent = "Online! :)";
      onUpdate.style.color="green";
    })

    window.addEventListener("offline",function(){
      onUpdate.textContent = "Offline! :(";
      onUpdate.style.color="red";
    })

</script>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


<?php 
      $conn = mysqli_connect('localhost','root');

      mysqli_select_db($conn,'bloodcells');

      $qapp = "SELECT * FROM `appoitments`;";
      $app = mysqli_query($conn, $qapp);

    
    $qnum = mysqli_num_rows($app);


    if ($qnum>3) {
      $qfourplus= "+";
    }

    ?>

 <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-calendar-check fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo "3".$qfourplus; ?></span>
              </a>




<!--  to get appoitments -->

    <?php 

      $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
      $app = $mysqli->query("SELECT * FROM `appoitments` ORDER BY `id` DESC LIMIT 3") or die($mysqli->error);

    ?> 


              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header badge-danger">
                  Appoitments Center
                </h6>
                <?php while ($arow = $app->fetch_assoc()): ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="text-truncate"><?php echo $arow['purpose']." · ".$arow['subject']; ?></div>
                    <div class="small text-gray-600">From - <?php echo $arow['from']." · ".$arow['date']; ?></div>

                  </div>
                </a>
                <br/>
                <?php endwhile; ?>


                <a class="dropdown-item text-center small text-gray-500" href="appoitment.php">Show All Alerts</a>
              </div>
            </li>

<?php 
      $conn = mysqli_connect('localhost','root');

      mysqli_select_db($conn,'bloodcells');

      $query = "SELECT * FROM `message`;";
      $result = mysqli_query($conn, $query);

    
    $num = mysqli_num_rows($result);


    if ($num>4) {
      $fourplus= "+";
    }

    ?>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo "4".$fourplus; ?></span>
              </a>



<!--  to get message -->

    <?php 

      $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
      $message = $mysqli->query("SELECT * FROM message ORDER BY id DESC LIMIT 4") or die($mysqli->error);

    ?> 

              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <div class="bg-danger ">
                <h6 class="dropdown-header badge-danger">
                  Message Center
                </h6>
              </div>
                <?php while ($row = $message->fetch_assoc()): ?>
                <a class="dropdown-item d-flex align-items-center" href="./message.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="far fa-comments text-white"></i>
                    </div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $row['message']; ?></div>
                    <div class="small text-gray-600">From - <?php echo $row['name']; ?> · <?php echo $row['dateposted']; ?></div>
                  </div>
                </a>
                <br/>
                <?php endwhile; ?>
                
                <a class="dropdown-item text-center small text-gray-500" href="./message.php">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-capitalize text-gray-800"><?php echo $fname." ".$lname; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $arrayy['url']; ?>" data-size="60x60"><img src="img/ellipsis-v-solid.svg" class="ml-1 opacity-1" style="opacity: 0.5;" alt=""  width="6">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
<!--                 <a class="dropdown-item disabled" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item disabled" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
                   
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
