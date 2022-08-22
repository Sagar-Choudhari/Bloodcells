
<?php include('include/header.php'); ?>


  <title>Admin - Blank</title>


</head>
<body id="page-top">

<?php require_once 'request_assets/server.php'; ?>
<?php require_once 'request_assets/delete.php'; ?>


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

    

        <?php 

          $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
          $result = $mysqli->query("SELECT * FROM message ORDER BY id DESC") or die($mysqli->error);


        ?> 

<?php if (isset($_SESSION['helpuser'])): ?>
<div class="container mb-5 text-gray-800">
  <h5 class="modal-title">Help to&nbsp;<b class="text-capitalize"><?php echo $fname." ".$lname; ?></b></h5>


        <div class="h5 ml-0 row mt-4 font-weight-bold"><small class="small mt-1">Name : &nbsp;</small><?php echo $fname." ".$lname; ?>
        <div class="h5 ml-5 row pl-3"><small class="small mt-1">Bloodgroup : &nbsp;</small>
          <h5 class="h5 ml-2 mt-0 font-weight-bold text-danger"><?php echo $bg; ?>  
          </h5></div>
        <div class="h5 ml-5 pl-3 font-weight-bold"><small class="small mt-1">Gender : &nbsp;</small><?php echo $gender; ?></div>
        <div class="h5 ml-5 pl-3 font-weight-bold"><small class="small mt-1">Age : &nbsp;</small><?php echo $age; ?></div>
        </div>
        <div class="h5 ml-0 row mt-2 font-weight-bold"><small class="small mt-1">Email : &nbsp;</small><?php echo $email; ?>
        <div class="h5 ml-5 pl-3 font-weight-bold"><small class="small mt-1">Phone No. : &nbsp;</small><?php echo $mobile; ?></div>
        <div class="h5 ml-5 pl-3 font-weight-bold"><small class="small mt-1">City : &nbsp;</small><?php echo $city; ?></div>
        <div class="h5 ml-5 pl-3 text-danger font-weight-bold"><small class="small mt-1">Required Date : &nbsp;</small><?php echo $rqrdate; ?></div>
        </div>
        <div class="h5 ml-0 row mt-2 font-weight-bold"><small class="small mt-1">Details : &nbsp;</small><?php echo $details; ?>
           <div class="h5 ml-5 pl-3 font-weight-bold"><small class="small mt-1">Requested Date : &nbsp;</small><?php echo $rstdate; ?></div>
        </div>

         <form action="request_assets/server.php" method="POST" class="validate" accept-charset="utf-8">
          <input type="hidden" name="id" id="id" value="<?php echo $rid; ?>">

          <div class="form-group mt-5">
            <input type="hidden" name="replied" id="replied" value="YES">
            <label for="message-text" class="col-form-label">Enter message that how you are helping <?php echo $fname." ".$lname; ?>:</label>
            <textarea class="form-control" name="help" id="help" rows="4" placeholder="Enter your helping information here" required></textarea>
          </div>

          <div class="text-center m-auto d-block p-2 px-5">
            <button type="submit" name="reply" class="btn btn-primary px-4 mx-3">Send to&nbsp;<?php echo $fname." ".$lname; ?></button>
            <a href="requests.php" title="cancel" class="btn btn-secondary px-4 mx-3">Cancel</a>
          </div>
        </form>
</div>

<?php unset($_SESSION['helpuser']); ?>
<?php endif; ?>


 <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
        <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['rqst'])): ?>
              <div class="alert-<?=$_SESSION['rqst_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['rqst_type']?>">
                <?php 
                  echo $_SESSION['rqst']; 
                  unset($_SESSION['rqst']);
                ?>
              </div>
               <div class="alert-<?=$_SESSION['rqst_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
        </div>
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
            <div class="row justify-content-center">
              <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="font-weight-normal">Required Date</th>
                    <th scope="col" class="font-weight-normal">Name</th>
                    <th scope="col" class="font-weight-normal">Bloodgroup</th>
                    <th scope="col" class="font-weight-normal">Details</th>
                    <th scope="col" class="font-weight-normal">Help</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  <?php while ($row = $request->fetch_assoc()): ?>
                  <tr>

                    <td class="text-gray-900"><?php echo $row['required_date']; ?></td>

                    <td class="text-gray-900"><div class="text-capitalize"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></div></td>

                    <td class="font-weight-bold text-danger text-center"><?php echo $row['bgroup']; ?></td>


                    <td class="text-gray-900"><?php echo $row['details']; ?></td>

                    <td class="text-gray-900 text-center"><a href="requests.php?edit=<?php echo $row['id']; ?>" title="Help the user" class="btn mb-1 btn-success">Help</a><br>
                    <a href="#deleteModal<?php echo $row['id']; ?>" class="btn my-1 btn-danger" data-toggle="modal">Delete</a>
                  </td>
                 
<!-- Delete Modal-->
  <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete message?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to delete the request of <?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?>??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="request_assets/delete.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>

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

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

   <?php
include('include/footer.php');
?>
    

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


    
<?php
include('include/scrolltotop.php');

include('include/logoutmodal.php');

include('include/script.php');
?>
<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
</body>

</html>