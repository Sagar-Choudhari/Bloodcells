
<?php include('include/header.php'); ?>


  <title>Admin - Blank</title>


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
        <div class="container">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-center text-gray-800">Available Blood</h1>

            <div class="container justify-content-center table-responsive" align="center" style="margin: auto; display: block; justify-content: center; align-items: center; ">




<table class="table text-center w-50 table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th>Bloodgroup</th>
      <th>Drives</th>
    </tr>
  </thead>
  <tbody id="myTable">

    <?php 
// SELECT SUM(drives) FROM `blooddrive` WHERE user='nisha@kushwaha'
  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));


  $bg = $mysqli->query("SELECT * FROM `bloodgroup`") or die($mysqli->error);

  while ($getbg = $bg->fetch_assoc()):

  $b = $getbg['bloodgroup']; 

  $getbgcount = $mysqli->query("SELECT SUM(drives) FROM `blooddrive` WHERE `bloodgroup` = '$b'") or die($mysqli->error);

while ($bgcount = $getbgcount->fetch_assoc()):

?> 


    <tr>
      <td class="text-gray-800 font-weight-bold"><?php echo $getbg['bloodgroup']; ?></td>
      <td class="text-gray-800 font-weight-bold"><?php echo $bgcount['SUM(drives)']; ?></td>
    </tr>



  <?php 

  endwhile; 
  endwhile;



  ?>
  </tbody>
</table>



              




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