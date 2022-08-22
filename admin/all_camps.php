
<?php include('include/header.php'); ?>


  <title>Admin - All Events</title>

<link rel="stylesheet" href="css/upload.css">
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
          <h1 class="h4 mb-4 text-center text-gray-800">All Events & Campaign</h1>


<div class="container">


<div class="row">
  

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM camps ORDER BY id DESC") or die($mysqli->error);

  while ($row = $result->fetch_assoc()): 
?>
<div class="col-11">
    <div class="card mb-5 alert-secondary">
      <div class="card-body">
          <div class="row">
            <div class="col-auto">

            <div class="text-gray-800">Title&#32;&#58;&#32;<?php echo $row['title']; ?></div>
            <div class="text-gray-800">Organise by&#32;&#58;&#32;<?php echo $row['organised_by']; ?></div>
            <div class="font-weight-normal text-gray-800">Address&#32;&#58;&#32;<?php echo $row['address']; ?></div>
            <div class="font-weight-bold text-gray-800">Date&#32;&#58;&#32;<?php echo $row['date']; ?></div>
            <div class="font-weight-bold text-gray-800">Time&#32;&#58;&#32;<?php echo $row['time']; ?></div>
            <div class="font-weight-normal text-gray-800">Details&#32;&#58;&#32;<?php echo $row['details']; ?></div>
            </div>
            <div class="col-auto">
              <div class="font-weight-bold text-gray-900">
                <img src="camps_assets/<?php echo $row['poster']; ?>" alt="<?php echo $row['title']; ?>" id="myImg<?php echo $row['id']; ?>" class="myImgg rounded" width="250" height="auto">
            
              <!-- The Modal -->
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img02">
                  <div id="caption"></div>
                </div>

                <script>
                  // Get the modal
                  var modal = document.getElementById('myModal');

                  // Get the image and insert it inside the modal - use its "alt" text as a caption
                  var img = document.getElementById('myImg<?php echo $row['id']; ?>');
                  var modalImg = document.getElementById("img02");
                  var captionText = document.getElementById("caption");
                  img.onclick = function(){
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                  }

                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("close")[0];

                  // When the user clicks on <span> (x), close the modal
                  span.onclick = function() { 
                    modal.style.display = "none";
                  }
                </script>
            </div>
            </div>
            
          

        
            
          </div>
      </div>
    </div>
</div>
  <div class="col-1 mt-5">
      <a href="camps_assets/server.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
  </div>


<?php endwhile; ?>
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