
<?php include('include/header.php'); ?>

<title>Admin - News & Anoucements</title>

</head>
<body id="page-top">

<?php require_once 'news_assets/process.php'; ?>

<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM news") or die($mysqli->error);

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
		<h4 class="">Manage News & Anouncements</h4>
	</div>
	<form action="news_assets/process.php" name="frmUser" method="POST" class="my-5 mx-5 form-group" accept-charset="utf-8">
		<label class="py-1">Write some latest news & anouncements details here :</label>

		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="">
			
				<input name="title" class="form-control" value="<?php echo $news_title; ?>" placeholder="Enter title" autocomplete="off" required>

				<!-- <input type="text" name="detail" size="10" class="form-control my-2" value="<?php// echo $news_detail; ?>" placeholder="Write some latest news & anouncements details here..." style="height: 60px;" autocomplete="off" rows="2"  required> -->

				 <textarea name="detail" class="form-control my-3" placeholder="Enter more information" autocomplete="off" rows="4" required><?php echo $news_detail; ?></textarea> 


					<div class="col-auto">

						<?php if($update == true): ?>

						<div class="row">
							<div class="col-auto">
							<button type="submit" name="update" class="btn btn-info" style="width: 88px;">
								Update
							</button>
							</div>
							<div class="col-auto">
								<a href="./news.php" title="" class="text-white  text-decoration-none btn btn-danger">
								Cancel
							</a>
							</div>
						</div>

						<?php else: ?>

						<button type="submit" name="submit" class="btn btn-success" style="width: 100px;">
							Add
						</button>

						<?php endif; ?>

					</div>

					
			<div class="row col-4 m-auto text-center">
              <?php 
              if(isset($_SESSION['messagenews'])): ?>
                <div class="alert-<?=$_SESSION['messagenews_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>

              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['messagenews_type']?>">
                <?php 
                  echo $_SESSION['messagenews']; 
                  unset($_SESSION['messagenews']);
                ?>
              </div>
              
              <div class="alert-<?=$_SESSION['messagenews_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>

            <?php endif ?>
            </div>

					<div class="col-6"></div>
		</div>


	</form>

<!-- *********** disable form resubmission script ************ -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</div>
<div class="container">
	<div class="container px-5">

		<div class="row justify-content-center">
			<table class="table table-bordered table-hover table-striped">
				<thead class="thead-dark">
					<tr>
<!-- 					<th scope="col">No.</th> -->
						<th scope="col">Title</th>
						<th scope="col">Details</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM news ORDER BY id DESC") or die($mysqli->error);

//	pre_r($result);        /// to get record value

?> 
				<?php while ($row = $result->fetch_assoc()): ?>

				<tbody id="myTable">
					<tr>
<!-- 						<?php //echo $data; ?> -->
						<td class="font-weight-bold text-gray-900"><?php echo $row['title']; ?></td>
						<td class="font-weight-bold text-gray-900"><?php echo $row['detail']; ?></td>
						<td>
							<a href="news.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
						</td>
						<td>	
							<a href="news_assets/process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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

