
<?php include('include/header.php'); ?>


<title>Admin - Dashboard</title>

</head>
<body id="page-top">
<?php include('include/sidebar.php'); ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php include('include/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container">
<div class="container">
        <div class="container"> 
        	<div class="row">
         <!-- Page Heading -->
	            <h2 class="h2 col-3 text-gray-800">Admin Profile</h2>
	            <h4 class="col-auto"><a href="loginwithfb/logout.php" class="btn-outline-danger btn" title=""><div class="font-weight-bold mx-3">Logout</div></a></h4>
	        </div>
        </div>
<!-- 
$fname
$lname
$email
$birthday
$gender
$arrayy['url'];
 -->

 <div class="container mt-4 text-gray-800 table-responsive">
 	<table class="table table-active table-borderless text-gray-800">
 		<tbody id="myTable">
 			<tr>
 				<td>	
					<div class="display-4">
						ID&nbsp;:&nbsp;<?php echo $id; ?> 	 	
				 	 </div>
				</td>
 			</tr>
 			<tr>
 				<td>
 					<div class="h4">
						Name&nbsp;:&nbsp;<?php echo $fname." ".$lname; ?>	
					</div>
				</td>
				<td >	
					<div class="h4">Profile Picture :
				 	 	<img src="<?php echo $arrayy['url']; ?>" alt="Profile Image">
				 	 </div>
				</td>
 			</tr>
 			<tr>
 				<td>	
					<div class="h4">
						Email&nbsp;:&nbsp;<?php echo $email; ?> 	 	
				 	 </div>
				</td>
 			</tr>
 			<tr>
 				<td>	
					 <div class="h4">
				 	 	Gender&nbsp;:&nbsp;<?php echo $gender; ?>
				 	 </div>
				</td>
 			</tr>
 			<tr>
 				<td>	
					<div class="h4">
				 	 	Birthday&nbsp;:&nbsp;<?php echo $birthday; ?>
				 	</div>
				</td>
 			</tr>

 		</tbody>
 	</table>


 </div>


</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include('include/footer.php'); ?>
      
    </div>
    <!-- End of Content Wrapper -->
 

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