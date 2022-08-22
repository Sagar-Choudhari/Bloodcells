<div>
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span> </button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent1">
							<ul class="navbar-nav ml-auto font-weight-normal">
								<li class="nav-item active"> <a class="nav-link text-white" href="index.php">Home</a> </li>
								<li class="nav-item"> <a class="nav-link text-white" href="beforeregister.php">Register</a> </li>
								<li class="nav-item"> <a class="nav-link text-white" href="all_request.php">Request</a> </li>
								
								<li class="nav-item"> <a class="nav-link text-white" href="camps.php">Activity</a> </li>
								<li class="nav-item"> <a class="nav-link text-white" href="index.php#contact">Contact Us</a> </li>
								<li class="nav-item"> <a class="nav-link text-white" href="about.php">About Us</a> </li>


<?php if (!isset($_SESSION['email'])): ?> 

		<li class="nav-item ml-5"> <a class="nav-link" href="login.php"><h6 class="login-button">Log-in</h6></a> </li>

<?php else: ?>

<?php $email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error); 
$arrayy = $user->fetch_assoc();

// SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'

?>
	<!-- <?php// echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?> -->

					<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow ml-5 border-right border-left rounded-pill border-white px-3">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-capitalize text-white"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
								<img class="img-profile rounded-circle" src="assets/Icon-person@2x.png" data-size="60x60"><img src="assets/ellipsis-v-solid.svg" class="ml-1 opacity-1" style="opacity: 0.5;" alt=""  width="6">
							</a>

							<?php include 'user/togglemenu.php'; ?>
									

<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Do you really want to logout??</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="dataconn/logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>

						</li>

<?php endif; ?>
							</ul>
						</div>
					</div>
				</nav>
			</div>