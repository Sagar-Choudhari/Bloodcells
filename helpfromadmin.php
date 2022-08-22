
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
    <title>Bloodcells - Help From Bloodcells</title>
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
        <div id="content" class=" text-right">


        </div>
        <!-- End of Main Content -->
          

        <!-- Begin Page Content -->
        <div class="container-fluid mt-2">

<?php 
require_once 'user/dltrequest.php';
 
if(isset($_SESSION['deleted'])) {
echo"<script>pop()
function pop() {
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Request Deleted',
    text: 'Your request has been deleted succesfully.',
    showConfirmButton: true,
  }) 
  }
  </script>";
  unset($_SESSION['deleted']);

}


$email = $_SESSION['email'];
$yes = "YES";
$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$getdata = $mysqli->query("SELECT * FROM `request` WHERE `replied` = '$yes' AND `email`='$email'") or die($mysqli->error);

    while ($data = $getdata->fetch_assoc()):

?>
<div class="container row alert-light shadow-sm my-4 p-4 px-5 pb-1 rounded text-gray-800" data-aos="fade-up">
<div class="col-11">
<div>Your requests and reply from bloodcells</div>
<!--   <div class="text-capitalize h4 mb-3">
<?php //echo "Purpose : ".$data['purpose']; ?>
  </div> -->
  <div class="text-uppercase h5 mb-4 text-danger">
<?php echo "Subject : ".$data['bgroup']; ?>
  </div>
  <div class="h5 mb-4">
<?php echo "Message : ".$data['details']; ?>
  </div>
 <div class="text-dark"> Reply from bloodcells:</div> 
<div class="text-capitalize h3 text-success mb-4">
<?php echo $data['reply']; ?>
  </div>

</div>
<div class="col-1  text-right align-text-top">
  <a href="user/dltrequest.php?delete=<?php echo $data['id']; ?>" title="" class="btn shadow-sm btn-warning">Delete</a>
</div>
</div>
<?php endwhile; ?>
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

