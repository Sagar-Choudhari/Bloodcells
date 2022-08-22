<?php include('include/header.php'); ?>

  <title>Admin - Events & Campaign</title>
<link rel="stylesheet" href="css/upload.css">
</head>
<body id="page-top">

<?php require_once 'camps_assets/server.php'; ?>

<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM camps") or die($mysqli->error);


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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h4 mb-4 text-center text-gray-800">Add new Campaign or Events</h1>
            
            <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
               <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['msgcamp'])): ?>
                <div class="alert-<?=$_SESSION['msgcamp_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['msgcamp_type']?>">
                <?php 
                  echo $_SESSION['msgcamp']; 
                  unset($_SESSION['msgcamp']);
                ?>
              </div>
              <div class="alert-<?=$_SESSION['msgcamp_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>

          <div class="container text-gray-800">
            <div>
              <form action="camps_assets/server.php" class="form-group needs-validation text-gray-900 w-75" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                  <label for="title">Title : </label>
                  <input type="text" class="form-control" name="ctitle" value="<?php echo $ctitle; ?>" placeholder="Enter camp title here" required>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter title.</div>
                </div>
                <div class="form-group">
                  <label for="organised-by">Organised-by : </label>
                  <input type="text" class="form-control" name="corganised" value="<?php echo $corganised; ?>" placeholder="Organised by.." required>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter who organised?.</div>
                </div>
                <div class="form-group">
                  <label for="address">Address : </label>
                  <textarea name="caddress" class="form-control" placeholder="Address" required><?php echo $caddress; ?></textarea>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter address.</div>
                </div>
                <div class="row">
                <div class="form-group col-6">
                  <label for="date-time">Date : </label>
                  <input type="date" class="form-control" name="cdate" value="<?php echo $cdate; ?>" placeholder="" required>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter date.</div>
                </div>
                <div class="form-group col-6">
                  <label for="date-time">Time : </label>
                  <input type="time" class="form-control" name="ctime" value="<?php echo $ctime; ?>" placeholder="" required>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter time.</div>
                </div>
</div>
                <div class="form-group">
                <label for="file" class="text-gray-900">Poster (less than 5MB):</label>
                <br>

            <?php if($update == true): ?>
              <div class="">
                <div class="row">
                  
                
                <div class="col-auto">
                <img src="camps_assets/<?php echo $image; ?>" alt="<?php echo $ctitle; ?>" class="myImgg rounded" width="250" id="myImg" height="auto">
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
              <div class="custom-file col-4">
                <input type="file" name="cposter" class="custom-file-input" id="customFile" required>
                <label class="custom-file-label" for="customFile">Choose Image</label>
                <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please choose file.</div>
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
              </div>

            <?php else: ?>
              <!-- <div class="card card-outline-secondary ">
                <input type="file" name="image" id="image" class="" autocomplete="off" required>
              </div> -->

                  <div class="custom-file">
                    <input type="file" name="cposter" autocomplete="off" class="custom-file-input" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please choose file.</div>
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

               
                <div class="form-group">
                  <label for="details">Details : </label>
                  <textarea name="cdetails" class="form-control" placeholder="Enter more details here.." rows="4" required><?php echo $cdetails; ?></textarea>
                  <div class="valid-feedback">Looks Good.</div>
                <div class="invalid-feedback">Please enter details.</div>
                </div>
                <div class="form-group">
                  <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-info">Update</button>
                    &nbsp;<a href="camps.php" title="" class="text-white text-decoration-none btn btn-danger">Cancel</a>
                  <?php else: ?>
                  <button type="submit" name="csubmit" class="btn btn-primary" value="Add"><div class="px-4">Add</button>
                  <?php endif; ?>
                </div>




              </form>
            </div>
          </div>



<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


<div class="container-fluid">
  <div class="">

    <div class="row justify-content-center table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
          <tr>
             
            <th scope="col">Title</th>
            <th scope="col">OrganiseBy</th>
            <th scope="col">Addres</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th> 
            <th scope="col">Poster</th> 
            <th scope="col">Details</th> 
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
<?php 

  $mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM camps ORDER BY id DESC") or die($mysqli->error);

//  pre_r($result);        /// to get record value

?> 

        <?php while ($row = $result->fetch_assoc()): ?>

        <tbody id="myTable">
          <tr>
<!--            <?php //echo $data; ?> -->
            <td class="font-weight-bold text-gray-900"><?php echo $row['title']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['organised_by']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['address']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['date']; ?></td>
            <td class="font-weight-bold text-gray-900"><?php echo $row['time']; ?></td>
            <td class="font-weight-bold text-gray-900">
                <img src="camps_assets/<?php echo $row['poster']; ?>" alt="<?php echo $row['title']; ?>" id="myImg<?php echo $row['id']; ?>" class="myImgg" width="250" height="auto">
            
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
              <a href="camps.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
            </td>
            <td>  
              <a href="camps_assets/server.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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

      <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
                });
                }, false);
                })();
      </script>

      <script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

</body>

</html>