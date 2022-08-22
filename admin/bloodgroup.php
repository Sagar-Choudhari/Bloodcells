<!--  <?php
// if(count($_POST)>0) {
// 	$conn = mysqli_connect("localhost","root","","bloodcells");
// 	$sql = "INSERT INTO bloodgroup (bloodgroup) VALUES ('" . $_POST["bloodgroup"] . "')";
// 	mysqli_query($conn,$sql);
// 	$current_id = mysqli_insert_id($conn);
// 	if(!empty($current_id)) {
// 		$message = "New Bloodgroup Added Successfully";
// 	}
// }
?> -->




<?php include('include/header.php'); ?>

<title>Admin - Bloodgroup</title>

</head>
<body id="page-top">

<?php require_once 'bgroup_assets/process.php'; ?>

<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM bloodgroup") or die($mysqli->error);

//	pre_r($result);        /// to get record value

?> 


<?php include('include/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">



<?php
include('include/topbar.php');
?>


<div class="container">
<div class="container justify-content-center">
	<div class="text-center my-4">
		<h4 class="">Manage Bloodgroups</h4>
	</div>
	<form action="bgroup_assets/process.php" name="frmUser" method="POST" class="my-5 mx-5 form-group form-inline" accept-charset="utf-8">
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="ml-5">
			<label class="w-100">Enter new valid bloodgroup :
			<input type="text" name="bloodgroup" class="form-control mx-4" placeholder="Bloodgroup" value="<?php echo $bloodgroup; ?>" autocomplete="off" required>
			<?php if($update == true): ?>
				<button type="submit" name="update" class="btn btn-info">Update</button>
				&nbsp;<a href="./bloodgroup.php" title="" class="text-white text-decoration-none btn btn-danger">Cancel</a>
			<?php else: ?>
			<button type="submit" name="submit" class="btn btn-success">Add</button>
			<?php endif; ?>
		</label>
		</div>

	<div class="row col-9 m-auto text-center">
              <?php 
              if(isset($_SESSION['messageblood'])): ?>
                <div class="alert-<?=$_SESSION['messageblood_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['messageblood_type']?>">
                <?php 
                  echo $_SESSION['messageblood']; 
                  unset($_SESSION['messageblood']);
                ?>
              </div>
              <div class="alert-<?=$_SESSION['messageblood_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>

	</form>

<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</div>
<div class="container w-75">
	<div class="container px-5">

		<div class="row justify-content-center table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead class="thead-dark">
					<tr>
<!-- 						<th scope="col">No.</th> -->
						<th scope="col">Bloodgroup</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM bloodgroup ORDER BY id DESC") or die($mysqli->error);

//	pre_r($result);        /// to get record value

?> 

				<?php while ($row = $result->fetch_assoc()): ?>

				<tbody id="myTable">
					<tr>
<!-- 						<?php //echo $data; ?> -->
						<td class="font-weight-bold text-gray-900"><?php echo $row['bloodgroup']; ?></td>
						<td>
							<a href="bloodgroup.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
						</td>
						<td>	
							<a href="bgroup_assets/process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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

