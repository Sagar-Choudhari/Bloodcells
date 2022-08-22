
<?php

session_start();

if(!isset($_SESSION['email'])){
  header('location:login.php');
}

require_once 'user/sendappoit.php'; 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodcells - Appoitments</title>
    <?php include('include/common_links.php'); ?>
   
    <!-- scripts -->
    <?php include('include/scripts.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/profile.css">

  </head>
  
  <body id="page-top" class="" >
    <!-- style="overflow-x: hidden; overflow-y: hidden;" -->


    <?php include('user/nav.php'); ?>


<?php  
if(isset($_SESSION['sentappoit'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Appoitment sent successfully',
    text: 'Your request for appoitment has been recieved. we will reply you as possible as can',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['sentappoit']);

}
?>


<?php  
if(isset($_SESSION['errorsent'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: 'Something went wrong!!!',
    text: 'Your appoitment request has not been sent. Something is wrong we will correct it as possible as can.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['errorsent']);

}
?>

<?php  
if(isset($_SESSION['appoitcancel'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Appoitment Canceled',
    text: 'Your appoitment request has been cenceled.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['appoitcancel']);

}
?>

<?php  
if(isset($_SESSION['errorcancel'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: 'Something went wrong!!!',
    text: 'Your appoitment has not been canceled. Something is wrong we will correct it as possible as can.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['errorcancel']);

}
?>


  <!-- Page Wrapper -->
  <div id="wrapper" class="bg-light rounded container pt-5">



    <?php include('user/sidebar.php'); ?>

    

<div id="content-wrapper" class="rounded">


    <!-- Content Wrapper -->
    <div id="" class="d-flex flex-column">


        <!-- Main Content -->
        <div id="content" class="m-0 text-center text-dark">

              <h3 class="">Appoitments</h3>

        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-2">


  <!------------- contact ussss --------->
  
  <div class="">
  
  <!-- Contact us validate form  -->

  <form action="user/sendappoit.php" method="POST" class="text-gray-900 needs-validation" accept-charset="utf-8" novalidate>

    <input type="hidden" name="uemail" value="<?php echo $_SESSION['email']; ?>">
    
<div class="row">

<div class="form-group col-6">
        <label for="validationCustom01">Purpose : </label>
         <input type="text" class="form-control" id="validationCustom01" placeholder="Purpose" autocomplete="off" name="purpose" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter your purpose of appoitment.
        </div>
      </div>

</div>


    <div class="form-group">
        <label for="validationCustom02">Subject : </label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Subject" autocomplete="off" name="subject" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter subject.
        </div>
      </div>


    <div class="form-group">
      <label for="validationCustom03">Write your massage : </label>
      <textarea class="form-control" name="message" id="validationCustom03" rows="3" placeholder="Write your message" autocomplete="off" required></textarea>
      <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter your message.
        </div>
    </div>


    <div class="form-group mt-2">

 <button class="btn btn-primary w-100" name="appoitment" type="submit">Send Appoitment</button>
    </div>
   
    


</form>


</div>

        </div>
        <!-- /.container-fluid -->



<?php 

$email = $_SESSION['email'];
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$app = $mysqli->query("SELECT * FROM `appoitments` WHERE `from` = '$email' order by `id` DESC") or die($mysqli->error);

?> 

        <div class="container-fluid">
          

          <div class="mt-4">
  <div class="">

    <div class="row justify-content-center table-responsive">
      <table class="table table-bordered border-dark table-hover table-striped">
        <thead class="thead-dark">
          <tr>
<!--            <th scope="col">No.</th> -->
            <th scope="col">Purpose</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Cancel Appoitment</th>
          </tr>
        </thead>

        <?php while ($getapp = $app->fetch_assoc()): ?>


        <tbody>
          <tr>
<!--            <?php //echo $data; ?> -->
            <td class="font-weight-bold text-gray-900 col-auto"><?php echo $getapp['purpose']; ?></td>
            
            <td class="font-weight-bold text-gray-900 col-auto"><?php echo $getapp['subject']; ?></td>

            <td class="font-weight-bold text-gray-900 col-auto"><?php echo $getapp['message']; ?></td> 
            <td class="w-25 text-center">  
              <a href="user/sendappoit.php?delete=<?php echo $getapp['id']; ?>" class="btn btn-danger">Cancel</a>
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




    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
</div>
<?php include('include/footer.php'); ?>
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
<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<script src="js/aos.js"></script>

<script>
  AOS.init();
</script>

  </body>
  </html>

