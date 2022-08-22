
<?php require_once 'member_assets/delete.php'; ?>

<?php include('include/header.php'); ?>


  <title>Admin - All Registrated Members</title>


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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-center text-gray-800">All Registrated Members</h1>

 
    <div class="my-4 row">
       <?php 
        if(isset($_SESSION['msgmember'])): ?> 
          <div class=" text-center m-auto d-block">
           <div class="alert-<?=$_SESSION['msgmember_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
             <div class="message mx-4 badge-default text-<?=$_SESSION['msgmember_type']?>">
              <?php 
                echo $_SESSION['msgmember']; 
                unset($_SESSION['msgmember']);
               ?>
            </div>
          <div class="alert-<?=$_SESSION['msgmember_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
        </div>
           <?php endif ?>
    
  </div>

<div class="container">
  <div >

    <div class="row justify-content-center table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fullname</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Delete Account</th>
          </tr>
        </thead>
<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM user_reg ORDER BY id DESC") or die($mysqli->error);

?> 

        <?php while ($row = $result->fetch_assoc()): ?>

        <tbody id="myTable">
          <tr>
<!--        <?php //echo $data; ?> -->
            <td class="font-weight-bold text-gray-900"><?php echo $row['id']; ?></td>
            <td class="font-weight-bold text-gray-900 text-capitalize"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['bgroup']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['gender']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['age']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['mobno']; ?>&nbsp;&#124;&nbsp;<?php echo $row['email']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['city']; ?>&comma;&nbsp;<?php echo $row['district']; ?>&comma;
              <?php
              $state = $row['state'];
              $stateresult = $mysqli->query("SELECT * FROM all_states WHERE state_code = '$state'") or die($mysqli->error);?>
              <?php $statename = $stateresult->fetch_assoc() ?>
              <?php echo $statename['state_name']; ?>
                
              </td>





            <td>  
              <a href="#deleteModalMember" class="btn btn-danger" data-toggle="modal">Delete</a>
  <!-- Delete Modal-->
  <div class="modal fade" id="deleteModalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Account?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to delete the account of this member??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="member_assets/delete.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>
    
            </td>
          </tr>
        </tbody>

        <?php endwhile; ?>
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