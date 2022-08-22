
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
    <title>Bloodcells - Upload to Bloodcells</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/userupload.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->


    <?php include('user/nav.php'); ?>

  <?php require_once 'user/uploadbyuser.php'; ?>

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM uploadtoadmin") or die($mysqli->error);

?> 


  <!-- Page Wrapper -->
  <div id="wrapper" class="bg-light rounded container pt-5">



    <?php include('user/sidebar.php'); ?>

    

<div id="content-wrapper" class="rounded">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">



        <!-- Main Content -->
        <div id="content" class="h4 text-success text-center">

          Upload Your Images at Bloodcells

        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-2">


          <div class="containe-fluid m-auto d-block">
            <form action="user/uploadbyuser.php" method="POST" enctype="multipart/form-data"  accept-charset="utf-8">
              <input type="hidden" name="id" value="<?php echo $id; ?>" required>
              <input type="hidden" name="useremail" value="<?php echo $_SESSION['email']; ?>" required>
              <div class="">
              <div class="form-group">
                <label for="caption" class="text-gray-900">Caption:</label>
                <input type="text" name="caption" class="form-control" placeholder="Enter caption here"value="<?php echo $caption; ?>"  autocomplete="off" required>
              </div>

              <div class="form-group">
                <label for="file" class="text-gray-900">Image (less than 5MB):</label>
                <br>

            <?php if($update == true): ?>
              <div class="">
                <div class="col-auto">
                <img src="user/<?php echo $image; ?>" alt="<?php echo $caption; ?>" class="myImgg rounded" width="250" id="myImg" height="auto">
                <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="closse">&times;</span>
                <img class="modal-content rounded" id="img02">
                <div id="captionn"></div>
              </div>

              <script>
              // Get the modal
              var modal = document.getElementById('myModal');

              // Get the image and insert it inside the modal - use its "alt" text as a caption
              var img = document.getElementById('myImg');
              var modalImg = document.getElementById("img02");
              var captionText = document.getElementById("captionn");
              img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
              }

              // Get the <span> element that closes the modal
              var span = document.getElementsByClassName("closse")[0];

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
               &nbsp;<a href="./uploadtoadmin.php" title="" class="text-white text-decoration-none btn btn-danger">Cancel</a>
              <?php else: ?>
              <button type="submit" name="submit" class="btn btn-success"><div class="px-3">Upload</div></button>
              <?php endif; ?>
            </div>

            <div class="row col-9 m-auto text-center">
              <?php 
              if(isset($_SESSION['usermsg'])): ?>
                <div class="alert-<?=$_SESSION['usermsg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['usermsg_type']?>">
                <?php 
                  echo $_SESSION['usermsg']; 
                  unset($_SESSION['usermsg']);
                ?>
              </div>
              <div class="alert-<?=$_SESSION['usermsg_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
$email = $_SESSION['email'];
  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM `uploadtoadmin` WHERE `from` = '$email' order by `id` DESC") or die($mysqli->error);

//  pre_r($result);        /// to get record value

?> 

<div class="mt-4">
  <div class="">

    <div class="row justify-content-center table-responsive">
      <table class="table table-bordered border-dark table-hover table-striped">
        <thead class="thead-dark">
          <tr>
<!--            <th scope="col">No.</th> -->
            <th scope="col">Caption</th>
            <th scope="col">Image</th>
            <th scope="col">Details</th>
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <?php while ($row = $result->fetch_assoc()): ?>


        <tbody>
          <tr>
<!--            <?php //echo $data; ?> -->
            <td class="font-weight-bold text-gray-900"><?php echo $row['caption']; ?></td>
            <td class="font-weight-bold text-gray-900">

            <img src="user/<?php echo $row['image']; ?>" alt="<?php echo $row['caption']; ?>" id="myImg<?php echo $row['id']; ?>" class="myImgg rounded" width="250" height="auto">
            
            <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="closse">&times;</span>
                <img class="modal-content" id="img02">
                <div id="captionn"></div>
              </div>

              <script>
              // Get the modal
              var modal = document.getElementById('myModal');

              // Get the image and insert it inside the modal - use its "alt" text as a caption
              var img = document.getElementById('myImg<?php echo $row['id']; ?>');
              var modalImg = document.getElementById("img02");
              var captionText = document.getElementById("captionn");
              img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
              }

              // Get the <span> element that closes the modal
              var span = document.getElementsByClassName("closse")[0];

              // When the user clicks on <span> (x), close the modal
              span.onclick = function() { 
                modal.style.display = "none";
              }
              </script>

            </td>
            
            <td class="font-weight-bold text-gray-900"><?php echo $row['details']; ?></td>

            <td>
              <a href="uploadtoadmin.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
            </td> 
            <td>  
              <a href="user/uploadbyuser.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        </tbody>

                

        <?php endwhile; ?>
      </table>


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

