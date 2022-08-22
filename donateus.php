
<?php

session_start();

if(!isset($_SESSION['email'])){
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Donate Us</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->


    <?php include('user/nav.php'); ?>


  <!-- Page Wrapper -->
  <div id="wrapper" class="bg-light rounded container pt-5">



    <?php include('user/sidebar.php'); ?>

    

<div id="content-wrapper" class="rounded">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">



        <!-- Main Content -->
        <div id="content" class=" text-center">


          <h5 class="h4 text-success">Donate Us</h5>

          <p></p>
        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="">
            <div class=" ml-2  mb-4 text-dark text-center">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can scan this QR-Code to donate us.
            </div>

            <div class="w-50 mb-5" style="margin: auto; display: block; justify-content: center;" data-aos="fade-right">
              <img src="user/qrcode.png" class="rounded shadow img-fluid" alt="" >
            </div>
        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
</div>
<?php include('include/footer.php'); ?>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

  </body>
  </html>

