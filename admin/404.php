
<?php include('include/header.php'); ?>


  <title>Admin - 404</title>


</head>

<body id="page-top">

<?php
    include('include/sidebar.php');
?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <?php
      include('include/topbar.php');
      ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="index.php">&larr; Back to Dashboard</a>
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