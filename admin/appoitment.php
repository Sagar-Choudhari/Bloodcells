
<?php include('include/header.php'); ?>

<title>Admin - Messages</title>
<link rel="stylesheet" href="message_assets/message.css">
</head>
<body id="page-top">

<?php require_once 'appoitments_assets/server.php'; ?>

<?php require_once 'appoitments_assets/delete.php'; ?>

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

    <div class="container">

        <?php 

          $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
          $result = $mysqli->query("SELECT * FROM `appoitments` ORDER BY `id` DESC") or die($mysqli->error);
        ?> 

<?php if (isset($_SESSION['replyappoit'])): ?>
<div class="container mb-5">


  <h5 class="modal-title">Reply to&nbsp;<b class="text-capitalize"><?php echo $fname." ".$lname; ?></b></h5>
        <form action="appoitments_assets/server.php" method="POST" class="validate" accept-charset="utf-8">
          <input type="hidden" name="uid" id="id" value="<?php echo $uid; ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control "disabled name="recipient" value="<?php echo $email; ?>" id="email" placeholder="Enter Mail Here" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="umessage" id="message-text" rows="4" placeholder="Enter your message here" required></textarea>
          </div>
          <button type="submit" name="sendappoit" class="btn text-center m-auto d-block p-2 px-5 btn-primary">Reply to&nbsp;<?php echo $fname." ".$lname; ?></button>
        </form>
</div>

<?php unset($_SESSION['replyappoit']); ?>
<?php endif; ?>


 <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
           <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['appoit'])): ?>
              <div class="alert-<?=$_SESSION['appoit_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['appoit_type']?>">
                <?php 
                  echo $_SESSION['appoit']; 
                  unset($_SESSION['appoit']);
                ?>
              </div>
               <div class="alert-<?=$_SESSION['appoit_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>


<?php 

          $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
          $app = $mysqli->query("SELECT * FROM `appoitments` ORDER BY `id` DESC") or die($mysqli->error);
          $user = $mysqli->query("SELECT * FROM `appoitments` ORDER BY `id` DESC") or die($mysqli->error);
?> 

  <div class="container">
    <div class="container">

      <div class="table-responsive">
      <table class="table table-borderless table-striped">
        <thead class="thead">
          <tr>
<!--            <th scope="col">No.</th> -->
            <th scope="col" class="h5 font-weight-bold text-primary">Appoitments</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php while ($appoit = $app->fetch_assoc()): ?>
            <tr class="table-row">
<?php      
$mail = $appoit['from'];
$user = $mysqli->query("SELECT * FROM `user_reg` WHERE `email` = '$mail'") or die($mysqli->error); 
while ($userdata = $user->fetch_assoc()):
?>
              
              <td class="font-weight-bold text-gray-900 rounded">
                <div class="mx-5">
                  <div class="row mt-2 text-capitalize">
                   
                    <img src="img/icon-person@2x.png" alt="" class="icons-person">&nbsp;
                    <?php echo $userdata['fname']." ".$userdata['lname']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/icon-location-on@2x.png" alt="" class="icons">&nbsp;

<?php echo $userdata['city'].", ".$userdata['district'].","; 

$state = $userdata['state'];
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$getdata = $mysqli->query("SELECT * FROM `all_states` WHERE `state_code`='$state'") or die($mysqli->error);

$getstate = $getdata->fetch_assoc();
echo " ".$getstate['state_name'].".";
?>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class=" text-left"><i class="fas fa-envelope"></i></i>&nbsp;
                    <?php echo $appoit['from']; ?>
                  </div>
                  </div>
                  <div class="row">
                    <div class="font-weight-bold my-3 text-gray-900 col">
                      <div><?php echo "Purpose : ".$appoit['purpose']; ?></div>
                      <div><?php echo "Subject : ".$appoit['subject']; ?></div>
                      <div><?php echo "Message : ".$appoit['message']; ?></div>
                    </div>
                    <div class="col-auto m-auto d-block text-center">

                      
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <a href="appoitment.php?edit=<?php echo $appoit['id']; ?>" title="Reply to appoitment"class="btn btn-success text-decoration-none" name="reply">Reply</a>


              <br>

                      <a href="#deleteModal" class="btn my-1 btn-danger" data-toggle="modal">Delete</a>
                 
<!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete message?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to delete this message??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="appoitments_assets/delete.php?delete=<?php echo $appoit['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>

                    </div>
                  </div>
                  <div class="row">
                    <img src="img/icon material-date-range@2x.png" alt="" class="icons">&nbsp;
                    <?php echo $appoit['date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-reply icons mt-1" ></i>&nbsp;&nbsp;<div class="text-success"><?php echo $appoit['replied']; ?></div>
                  </div>
                </div>
              </td>
            </tr>
        <?php endwhile; ?>
        <?php endwhile; ?>
      </tbody>
      </table>


      
    </div>
  

<?php 

  function pre_r( $array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
  }
?>

    </div>
  </div>




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

include('include/script.php');
?>
<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>
</body>

</html>