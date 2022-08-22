
<?php include('include/header.php'); ?>


  <title>Admin - Upload Images</title>

<link rel="stylesheet" href="css/upload.css">

</head>
<body id="page-top">


  <?php require_once 'upload_assets/upload.php'; ?>

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM upload_img") or die($mysqli->error);

//  pre_r($result);        /// to get record value

?> 



<?php include('include/sidebar.php'); ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include('include/topbar.php');
        ?>

        <!-- Begin Page Content -->
        <div class="container mx-5">

          <!-- Page Heading -->
          <h2 class="h4 mb-5 text-gray-900 text-center">Upload Images</h2>


          <div class="containe-fluid m-auto d-block">
            <form action="upload_assets/upload.php" method="POST" enctype="multipart/form-data"  accept-charset="utf-8">
              <input type="hidden" name="id" value="<?php echo $id; ?>" required>
              <div class="row">
              <div class="form-group col-lg-6">
                <label for="title" class="text-gray-900">Title:</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title here"value="<?php echo $title; ?>"  autocomplete="off" required>
              </div>

              <div class="form-group col-lg-6">
                <label for="file" class="text-gray-900">Image (less than 5MB):</label>
                <br>

            <?php if($update == true): ?>
              <div class="">
                <div class="col-auto">
                <img src="upload_assets/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="myImgg rounded" width="250" id="myImg" height="auto">
                <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content rounded" id="img02">
                <div id="caption"></div>
              </div>

              <script>
              // Get the modal
              var modal = document.getElementById('myModal');

              // Get the image and insert it inside the modal - use its "alt" text as a caption
              var img = document.getElementById('myImg');
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
              <div class="col-10 custom-file ml-2 mt-3">
                <input type="file" name="imgfile" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile" >Choose Image</label>
              </div>


    <script src="js/custom-file-input.js"></script>
    <script>
      bsCustomFileInput.init()

      var btn = document.getElementById('btnResetForm')
      var form = document.querySelector('form')
      btn.addEventListener('click', function () {
        form.reset()
      })
    </script>
              </div>

            <?php else: ?>
              <!-- <div class="card card-outline-secondary ">
                <input type="file" name="image" id="image" class="" autocomplete="off" required>
              </div> -->

               <div class="custom-file p-1 w-75">
                    <input type="file" name="image" autocomplete="off" class="custom-file-input" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose Image</label>
                  </div>
                  <script src="js/custom-file-input.js"></script>
                  <script>
                    bsCustomFileInput.init()
                    var btn = document.getElementById('btnResetForm')
                    var form = document.querySelector('form')
                    btn.addEventListener('click', function () {
                      form.reset()
                    })
                  </script>


            <?php endif; ?>

                
              </div>
       

              </div>

              <div class="form-group">
                <label for="details" class="text-gray-900">Details:</label>
                <!-- <input type="text" name="details" class="form-control" id="details" placeholder="Enter details here" value="<?php //echo $details; ?>"  autocomplete="off" required> -->
                <textarea name="details" class="form-control w-75" rows="4" placeholder="Enter image description or details" id="details" autocomplete="off" required><?php echo $details; ?></textarea>
              </div>
          <div class="row">
            <div class="col-3">
              <?php if($update == true): ?>
               <button type="submit" name="update" class="btn btn-info">Update</button>
               &nbsp;<a href="./uploadimg.php" title="" class="text-white text-decoration-none btn btn-danger">Cancel</a>
              <?php else: ?>
              <button type="submit" name="submit" class="btn btn-success">Upload</button>
              <?php endif; ?>
            </div>

            <div class="row col-9 m-auto text-center">
              <?php 
              if(isset($_SESSION['messageimg'])): ?>
                <div class="alert-<?=$_SESSION['msgimg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['msgimg_type']?>">
                <?php 
                  echo $_SESSION['messageimg']; 
                  unset($_SESSION['messageimg']);
                ?>
              </div>
              <div class="alert-<?=$_SESSION['msgimg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>
            </form>


<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
 </div>

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM upload_img order by id DESC") or die($mysqli->error);

//  pre_r($result);        /// to get record value

?> 

<div class="container mt-5 ">
  <div class="container px-5">

    <div class="row justify-content-center table-responsive">
      <table class="table table-bordered border-dark table-hover table-striped">
        <thead class="thead-dark">
          <tr>
<!--            <th scope="col">No.</th> -->
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Details</th>
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <?php while ($row = $result->fetch_assoc()): ?>


        <tbody id="myTable">
          <tr>
<!--            <?php //echo $data; ?> -->
            <td class="font-weight-bold text-gray-900"><?php echo $row['title']; ?></td>
            <td class="font-weight-bold text-gray-900">

            <img src="upload_assets/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" id="myImg<?php echo $row['id']; ?>" class="myImgg" width="250" height="auto">
            
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

            </td>
            
            <td class="font-weight-bold text-gray-900"><?php echo $row['details']; ?></td>

            <td>
              <a href="uploadimg.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
            </td> 
            <td>  
              <a href="upload_assets/upload.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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