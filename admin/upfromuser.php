
<?php include('include/header.php'); ?>


  <title>Admin - Blank</title>
<link rel="stylesheet" href="css/upload.css">

</head>
<body id="page-top">
<?php include('include/sidebar.php'); ?>

<?php require_once 'upload_assets/fromuser.php'; ?>

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

          // $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
          // $result = $mysqli->query("SELECT * FROM `uploadtoadmin` ORDER BY `id` DESC") or die($mysqli->error);
?> 

  <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
           <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['usupmsg'])): ?>
              <div class="alert-<?=$_SESSION['usupmsg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['usupmsg_type']?>">
                <?php 
                  echo $_SESSION['usupmsg']; 
                  unset($_SESSION['usupmsg']);
                ?>
              </div>
               <div class="alert-<?=$_SESSION['usupmsg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>




<?php if (isset($_SESSION['uploading'])): ?>
<div class="container mb-5">


  <h5 class="modal-title">Upload from&nbsp;<b class="text-capitalize"><?php echo $fname." ".$lname; ?></b></h5>
        <form action="upload_assets/fromuser.php" method="POST" class="validate" accept-charset="utf-8">
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caption:</label>
            <input type="text" class="form-control " name="captionbyadmin" value="<?php echo $caption; ?>" id="captionnn" placeholder="Enter Caption Here" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Details:</label>
            <textarea name="detailsbyadmin" class="form-control " rows="4" id="details" placeholder="Enter Details Here" required><?php echo $details; ?></textarea>
          </div>
          <div class="form-group col-auto">
              <div class="font-weight-bold text-center m-auto d-block text-gray-900">

                <input type="hidden" name="image" value="<?php echo $image; ?>">

                <img src="../user/<?php echo $image; ?>" alt="<?php echo $caption; ?>" id="myImg<?php echo $id; ?>" class="myImgg rounded shadow-sm" width="500" height="auto">
            
              <!-- The Modal -->
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img02">
                  <div id="captionn"></div>
                </div>

                <script>
                  // Get the modal
                  var modal = document.getElementById('myModal');

                  // Get the image and insert it inside the modal - use its "alt" text as a caption
                  var img = document.getElementById('myImg<?php echo $id; ?>');
                  var modalImg = document.getElementById("img02");
                  var captionText = document.getElementById("captionn");
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

            <div class="text-center m-auto d-block row p-2 px-5">
            <button type="submit" name="sendappoit" class="btn shadow-sm px-5 btn-success">Upload to bloodcells</button>
            <a href="upfromuser.php" title="cancel" class="btn btn-secondary px-4 mx-3">Cancel</a>
          </div>
        </form>


<?php unset($_SESSION['uploading']); ?>
<?php endif; ?>
</div>


          <!-- Page Heading -->
          <h1 class="h4 mb-4 text-center text-gray-800">Images From Users</h1>



          <div class="container">


<div class="row">
  

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM `uploadtoadmin` ORDER BY `id` DESC") or die($mysqli->error);

  while ($row = $result->fetch_assoc()): 
?>
<div class="col-11">
    <div class="card mb-5 alert-light shadow-sm">
      <div class="card-body">
          <div class="row">
            <div class="col-auto">

            <div class="text-gray-800">From&#32;&#58;&#32;<?php echo $row['from']; ?></div>
            <div class="text-gray-800">Caption&#32;&#58;&#32;<?php echo $row['caption']; ?></div>

            <div class="font-weight-normal text-gray-800">Details&#32;&#58;&#32;<?php echo $row['details']; ?></div>
            </div>
            <div class="col-auto">
              <div class="font-weight-bold text-gray-900">
                <img src="../user/<?php echo $row['image']; ?>" alt="<?php echo $row['caption']; ?>" id="myImg<?php echo $row['id']; ?>" class="myImgg rounded shadow-sm" width="250" height="auto">
            
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
  <div class="col-1 mt-5 text-center">
     <a href="upfromuser.php?upload=<?php echo $row['id']; ?>" title="Reply to message"class="btn btn-info text-decoration-none text-center shadow-sm">Upload</a><br>

<!--       <a href="upload_assets/fromuser.php?delete=<?php //echo $row['id']; ?>" class="text-center btn my-2 btn-danger">Delete</a>
 -->

    <a href="#deleteModal" class="btn my-4 btn-danger shadow-sm" data-toggle="modal">Delete</a>
                 
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
        <div class="modal-body">Do you really want to delete this post??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="upload_assets/fromuser.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>


  </div>


<?php endwhile; ?>
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