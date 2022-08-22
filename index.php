
<?php require_once'dataconn/contact.php'; ?>
<?php require_once'user/delete.php'; ?>
	<!-- LANAGUAGE USED ==>  html, php, css, sql, javascript, bootstrap, jquery, ajax, particle.js, json -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bloodcells</title>
		<?php include('include/common_links.php'); ?>
		<!-- css -->
		
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/icons.css" type="text/css">

		<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
		<script src="main.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- scripts -->
		<?php include('include/scripts.php'); ?>

		<!-- Core CSS file -->
		<link rel="stylesheet" href="PhotoSwipe-4.1.3/dist/photoswipe.css"> 

		<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
		     In the folder of skin CSS file there are also:
		     - .png and .svg icons sprite, 
		     - preloader.gif (for browsers that do not support CSS animations) -->
		 <link rel="stylesheet" href="PhotoSwipe-4.1.3/dist/default-skin/default-skin.css"> 
		


		<!-- to get values of state and city -->
		<script type="text/javascript">

		$(document).ready(function(){
			$("#authors").change(function(){
				var aid = $("#authors").val();
				$.ajax({
					url: 'dataconn/data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(books){
					console.log(books);
					books = JSON.parse(books);
					$('#books').empty();
					$('#books').append('<option value="" selected="" disabled="">Select City</option>')
					books.forEach(function(book){
						$('#books').append('<option>' + book.city_name + '</option>')
					})
				})
			})
		})
	</script>
	</head>
	
	<body id="page-top" style="overflow-x: hidden;">
		

		<!--  Navigation bar -->
		<div class="home container-fluid text-dark">
			

			<?php require 'include/header.php'; ?>


			<!-- end  Navigation bar -->

<!-- <div class="container">

<h1 class="h1">This is the homepage</h1>
	<?php //if(isset($_SESSION['success'])) : ?>

	<div>
		<h2 class="h2">
			<?php 
			//echo $_SESSION['success'];
			//unset($_SESSION['success']);
			?>

		</h2>
	</div>

<?php //endif; ?>  -->

<!-- if the user logs in print info about him -->

<!-- <?php// if(isset($_SESSION['fname'])) : ?>

	<h3>Welcome <strong><?php// echo $_SESSION['fname']; ?></strong></h3>

	<button type="" class="btn btn-danger"><a href="index.php?logout='1'" class="text-justify text-white">Logout</a></button>

</div> -->

<?php  
if(isset($_SESSION['deletesuccess'])) {
echo"<script>pop()
function pop() {
		Swal.fire({
		position: 'top-center',
		icon: 'success',
		title: 'Profile deleted succesfully.',
		text: 'Your profile from bloodcells has been deleted succesfully. If you want you can register again and start using our services again.',
		showConfirmButton: true,
	}) 
	}
	</script>";
	unset($_SESSION['deletesuccess']);
	unset($_SESSION['email']);

}
?>

<?php 
if (isset($_SESSION['msgcontact'])) {
	echo"<script>popup()
			function popup() {
	const Toast = Swal.mixin({
		toast: false,
		position: 'top-center',
		showConfirmButton: false,
		timer: 2000,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'success',
		title: 'Your message has been sent.',
		text: 'Bloodcells will contact soon.'
	})
	}
	</script>";
	unset($_SESSION['msgcontact']);
} 
?>
<?php
if (isset($_SESSION['errormsg'])) {
	echo"<script>popup()
			function popup() {
	const Toast = Swal.mixin({
		toast: false,
		position: 'top-center',
		showConfirmButton: false,
		timer: 2000,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	Toast.fire({
		icon: 'error',
		title: 'Something wrong',
		text: 'Somthing is wrong in sending message. we will corret it as possible as'
	})
	}
	</script>";
	unset($_SESSION['errormsg']);
} 
?>



			<!--  Home start -->
			<!--- save life become hero -->
			<div class="container">
				<div class="row">
					
					<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
						<section class="header-section">
							<div class="left-div">
								<div class="container text-center mt-2" id="hero">
									<h1 class="font-weight-bolder save">Save Life</h1>
									<h2 class="font-weight-bolder hero">Become A Hero</h2>
									<p class="save-hero text-gray-900">Join our cause and help us save more lives. Everyone should have right to get a blood transfusion.</p>
								</div>
								<div class="text-center mt-5 ">
									<div class="wrapper"> </div><a href="beforeregister.php">
								<button class="button_hover" type="submit">Register Now</button></a>
							</div>
						</div>
					</section>
				</div>
				<!-- end save life become hero ---->
				<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
					<img src="assets/home1.gif" alt="" id="gif">
				</div>
			</div>
		</div>
		<!--- save life become hero -->
		<!------------- search doner section -------->
		<section class="search-section">
			<div class="container"data-aos="fade-up">
				<div class="row">
					<div class="search-text">
						<h2 class="search-heading"><img src="assets/Icon awesome-search@2x.png" class="search-icon" alt=""> Search Blood Donors</h2>
						<p class="search-para text-gray-900">get connected with donor in matter of minutes at zero cost. Our website with a smart system that finds the closest blood donors.</p>
					</div>
				</div>
			</div>
			



<!-- **************** to get bloodgroup selection***************** -->
		<?php 

			$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
			$bloodgroup = $mysqli->query("SELECT * FROM bloodgroup") or die($mysqli->error);

		//  pre_r($bloodgroup);        /// to get record value

		?> 

			
			<div class="container search-div" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="center-bottom">
				<div class="search-border">
					<form action="searchbld.php" role="form" class="form-row" method="post" accept-charset="utf-8" validate>
						<div class="container flex-row">
							<div class="row">
								<div class="col-sm-3">
									<div class="form-inline form-group">
										<div class="input-group w-100">
											<div class="input-group-prepend"><span class="input-group-text"><img src="assets/Icon open-droplet@2x.png" alt="" class="search-icons"></span>
											</div>
											<select name="blood" class="custom-select text-gray-900 form-control" autocomplete="off" required>
												<option value="" selected="" class="text-gray-900" disabled>Select Bloodgroup</option>
												<?php while ($row = $bloodgroup->fetch_assoc()): ?>
												<option value="<?php echo $row['bloodgroup']; ?>" class="text-gray-900 text-uppercase"><?php echo $row['bloodgroup']; ?></option>
												<?php endwhile; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-inline form-group">
										<div class="input-group w-100">
											<div class="input-group-prepend"><span class="input-group-text">
												<img src="assets/Icon-location-on@2x.png" alt="" class="search-icons">
											</span>
										</div>
										<select class="form-control custom-select text-gray-900" id="authors" name="authors" required>
													<option selected="" value="" class="text-gray-900" disabled>Select State</option>
													<?php 
														require 'dataconn/data.php';
														$authors = loadAuthors();
														foreach ($authors as $author) {
															echo "<option id='".$author['state_code']."' value='".$author['state_code']."'>".$author['state_name']."</option>";
														}
														?>
												</select>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-inline">
									<div class="input-group w-100">
										<div class="input-group-prepend"><span class="input-group-text">
											<img src="assets/Icon material-location-city@2x.png" alt="" class="search-icons">
										</span>
										</div>
										
										<select class="form-control text-gray-900 custom-select" id="books" name="books" autocomplete="off" required>
												<option disabled class="text-gray-900" selected="">Select City</option>       
										</select>
									</div>
								</div>
							</div>
								<div class="col-sm-3">
									<div class="form-inline">
										<div class="input-group ml-5 w-75">
											<button type="submit" class="btn btn-outline-dark w-100 form-control" name="search"><img src="assets/Icon awesome-search2@2x.png" alt="" class="search-btn-icon">  Search  </button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>


<!-- *************** to get array values from table fetch it ************* -->


							<?php 

								function pre_r( $array){
									echo '<pre>';
									print_r($array);
									echo '</pre>';
								}
							?>



	
	<!-- ############################    custom form with icon example
	<div class="row">
		<label class="col-md-12">Amount</label>
	</div>
	<div class="form-inline">
		<div class="input-group">
			<div class="input-group-prepend"><span class="input-group-text">$</span></div>
			<input type="text" class="form-control text-right" id="exampleInputAmount" placeholder="39" autocomplete="off">
			<div class="input-group-append"><span class="input-group-text">.00</span></div>
		</div>
	</div>
	<hr>
	###########################   End custom form ################ -->
	
	<!-- ----------- end  search doner section ------ -->


	<?php 

			$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
			$request = $mysqli->query("SELECT * FROM request ORDER BY id DESC LIMIT 4") or die($mysqli->error);

			// to get record value
			// pre_r($request);
		?> 


<!-----------  recent blood request ----------->

<section class="container recent-request-123">

		<div class="container row recent-request">

			<div class="col-lg-1"></div>

				<div class="col-lg-5" data-aos="zoom-out-right" data-aos-duration="1000">
							<div class="card recent-request-0 recent-request-1">
								<div class="card-body">
									<label for="request" class="text-danger font-weight-bold">Recent Blood Request</label>
										<div class="">
											<?php while ($row = $request->fetch_assoc()): ?>
											<div class="alert-secondary shadow-sm overflow-hidden mb-2 row rounded recent-card" role="alert">
												<div class="col-10 recent-card-left">
													<div class="row text-center">
														<img src="assets/Icon-person@2x.png" class="recent-card-icon-person" alt="">&nbsp;
														<p class="text-capitalize"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></p>&nbsp;&nbsp;
														<img src="assets/Icon-location-on@2x.png" class="recent-card-icon-location" style="color: blue;" alt="">&nbsp;
<?php 
$remail = $row['email'];
$getmaill = $mysqli->query("SELECT * FROM `user_reg` WHERE `email`='$remail'") or die($mysqli->error); ?> 
<?php $maill = $getmaill->fetch_assoc(); ?>
														<p class="text-capitalize"><?php echo $maill['district']; ?></p>

													</div>
													<div class="row text-center">
														<img src="assets/Icon material-date-range@2x.png" class="recent-card-icon-date" alt="">&nbsp;
														<p class="text-center"><?php echo "Required : ".$row['required_date']; ?></p>&nbsp;&nbsp;
														<img src="assets/Icon-time@2x.png" class="recent-card-icon-time" alt="">&nbsp;
														<p>
																			
<?php  

$timess = $row['requested_date'];

require('include/timestamp.php');

?>

														</p>


													</div>
												</div>
												<div class="col-2 mb-2 row recent-card-right">
													<a href="all_request.php" title="">
													<b class="text-danger text-uppercase"><?php echo $row['bgroup']; ?></b><br>
													<img src="assets/Icon awesome-search2@2x.png" class="recent-card-icon-search" alt=""></a>
													
												</div>
											</div>
												<?php endwhile; ?>
										</div>

										<!-- <div class="">
														<div class="">

																<?php //while ($row = $request->fetch_assoc()): ?>

																<span style="font-weight:bold">
																	<b class="text-gray-900"><?php //echo $row['fname']; ?></b>
																	<p class="text-gray-900"><?php //echo $row['lname']; ?></p>
																</span>
															
															</div> 
																<br/>
															<?php //endwhile; ?>

														</div> -->
														<div class="mt-2">
														<a href="all_request.php" style="" title="View all blood request">View All..</a>
													</div>
								</div>
							</div>
				</div>

				<div class="col-lg-1"></div>


<!--  to get news -->

		<?php 

			$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
			$news = $mysqli->query("SELECT * FROM news ORDER BY id DESC LIMIT 2") or die($mysqli->error);

			// to get record value
			// pre_r($news);
		?> 


				<div class="col-lg-5"  data-aos="zoom-out-left" data-aos-duration="1000">
							<div class="card  recent-request-0 recent-request-2">
								<div class="card-body recent-card-body2 overflow-hidden">
									<label for="news" class="text-primary font-weight-bold">News & Anouncements</label>
									<!-- <marquee class="overflow-hidden" direction="up" scrolldelay="1"> -->
										
													<div class="">
														<div >

																<?php while ($row = $news->fetch_assoc()): ?>
																	<div class="pt-1 shadow-sm alert-secondary row rounded">
																	<span style="" class="mx-2">
																		<b class="text-gray-900 text-capitalize"><?php echo $row['title']; ?></b>
																		<p class="text-gray-900 text-justify"> &nbsp;&nbsp;&nbsp; <?php echo $row['detail']; ?></p>
																	</span>
																	</div>
															</div> 
																<br/>
															<?php endwhile; ?>

														</div>
												<!--  </marquee> -->
												<a href="all_news.php" class="mt-2 mb-3" title="View more News's & Anouncements">View All..</a>
								</div>
							</div>
				</div>
				


			<div class="col-lg-1"></div>

		</div>  

	</section>
	<!-----------   endd recent blood request    ------------->





<!-- ------------------- information about blood --------------- -->

<section class="container section-info">

<div class="row info-title"><img src="assets/Icon feather-info@2x.png" class="info-icon" alt="info-icon">
	<h3 class="text-danger info-title-text font-weight-bold">Facts and information about blood donation process.</h3>
</div>
<div class="row">

	<div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
					<!--Accordion wrapper-->
<div class="accordion shadow-sm mt-3" id="accordionExample">
	<div class="card">
		<div class="card-header" id="headingOne">
				<button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<h5 class="mb-0">
						Why should I donate blood?
					</h5>
				</button>
		</div>

		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			<div class="card-body text-gray-900">
							The need for blood affects us all. Eight out of ten people need blood or blood products at some time in our lives. One out of every ten patients in hospital requires blood transfusion. The number of blood donations that patients receive depends on their medical condition. Although an average of three donations is transfused to a patient, some patients require many more. 
							<a href="question.php" title="Read more questions about & all.." class="text-danger ml-1 font-weight-bold">Read More</a>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingTwo">
			
				<button class="btn btn-link collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<h5 class="mb-0">
									How does the blood donation process work?
								</h5>
				</button>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			<div class="card-body text-gray-900">
							Step 1 : Registration <br>
							Step 2 : Health History and Mini Physical<br>
							Step 3 : Donation<br>
							Step 4 : Refreshments<br>

							<a href="question.php" title="Read more questions about & all.." class="text-danger font-weight-bold">Read More</a>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingThree">
				<button class="btn btn-link collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<h5 class="mb-0">
									Who may donate blood?
								</h5>
				</button>
		</div>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			<div class="card-body text-gray-900">
							Donors should be between the ages of 18 and 65, weigh at least 50 kg and not have donated blood within the previous 12 weeks (for males). The criteria, which are applied before a person can be accepted as a blood donor, are very strict. Not everyone can be a blood donor. This is designed to protect the health of the donor as well as the health of the patient who receives the blood.
							<a href="question.php" title="Read more questions about & all.." class="text-danger ml-1 font-weight-bold">Read More</a>
			</div>
		</div>
	</div>

				<!-- Accordion card -->

					<!-- Accordion card -->
				<div class="card">

					<!-- Card header -->
					<div class="card-header" id="headingFour">
								<button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<h5 class="mb-0">
								<a href="question.php" title="Read more questions about & all.." class="row ml-1">Read More&nbsp;<div class="text-danger">Questions!</div> </a>
					</h5>
				</button>
					</div>

					

				</div>
				<!-- Accordion card -->

			</div>
			<!-- Accordion wrapper -->
	</div>
		

	<div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
	
			<div class="que-illust">
				<img src="assets/group 3.png" class="que-illust-img" alt="event-ilust">
			</div>
	
	</div>
</div>

</section>


<!-- ------------------- endd information about blood --------------- -->




<!-- ------------------- upcoming event --------------- -->

<div class="mt-3">&nbsp;</div>


	<section class="container my-5" data-aos="fade-up">

		<div class="mt-4">
					<div class="container text-center">
		<h5 class="font-weight-light mb-4 text-gray-800">Recents Events & Campaigns Activity</h5>
				<div class="row mx-auto my-auto">
						<div>
								<div class="container">
<?php 
	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM upload_img order by id DESC") or die($mysqli->error);
?>
										<!-- <div class="carousel-item <?= $actives; ?>">
												<div class="col-lg-4 col-md-6">
														<img class="img-fluid rounded" src="admin/upload_assets/<?php //echo $row['image']; ?>" alt="<?php //echo $row['title']; ?>" id="" >

												</div>
										</div> -->
	
	<!-- Swiper -->
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php while($row = $result->fetch_assoc()): ?>



			<div class="swiper-slide"><a href="images.php" title="View Image"><img class="img-fluid rounded" src="admin/upload_assets/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" style="height: 240px; object-fit: cover; object-position: center center;"></a></div>
			


			<?php endwhile; ?>


		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination shadow-sm" style=""></div>

			<!-- Add Arrows -->
		<div class="swiper-button-next shadow-sm"></div>
		<div class="swiper-button-prev shadow-sm"></div>

	</div>

	<!-- Swiper JS -->
	<script src="js/swiper.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 3,
			spaceBetween: 1,
			slidesPerGroup: 3,
			loop: true,
			centeredSlides: false,
			loopFillGroupWithBlank: false,
			grabCursor: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
				dynamicBullets: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	</script>


								</div>
								
								
						</div>
				</div>
		</div>

		</div>
	
</section>


<!-- <section class="container my-5">

		<div class="mt-4">
					<div class="container text-center">
				<h5 class="font-weight-light mb-4 text-gray-800">Recents Events & Campaigns Activity</h5>
				<div class="row mx-auto my-auto">
						<div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
								<div class="carousel-inner w-100" role="listbox">
<?php 
	//$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	//$result = $mysqli->query("SELECT * FROM upload_img order by id DESC") or die($mysqli->error);
?>
									<?php //while($row = $result->fetch_assoc()): ?> 

						<?php 
									// $i=1;
									// foreach ($result as $row){
									//  $actives = '';
									//  if($i == 1){
									//    $actives = 'active';
									//  }
						?>

										<div class="carousel-item <?= $actives; ?>">
												<div class="col-lg-4 col-md-6">
														<img class="img-fluid rounded" src="admin/upload_assets/<?php //echo $row['image']; ?>" alt="<?php //echo $row['title']; ?>" id="" >

												</div>
										</div>

<?php //$i++; } ?>

								</div>
								<?php //endwhile; ?>
								<a class="carousel-control-prev bg-dark w-auto rounded" href="#myCarousel" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next bg-dark w-auto rounded" href="#myCarousel" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
								</a>
						</div>
				</div>
		</div>

		</div>
	
</section>


<script src="js/carousel.js"></script> -->


<!-- ------------------- endd upcoming event --------------- -->


<div class="mt-5">&nbsp;</div>

<!-- ------------------- Video --------------- -->


<div class="card-body">

<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM camps ORDER BY id DESC LIMIT 1") or die($mysqli->error);
	?>

<section class="container">
	<div class="row">
		<div class="col-sm-8" data-aos="fade-right" data-aos-duration="1000" data-aos-offset="80">
			
			<div class="card">


			<div class="card-body">
		
			<label for="events" class="text-center m-auto d-block pb-3 h6 text-primary">Events & Campaign</label>
			
				<?php while ($row = $result->fetch_assoc()): ?>
					<div class="row py-3 mb-2 shadow-sm alert-secondary rounded">
						<div class="col-sm-8">
							<div class="text-gray-800 font-weight-bold text-danger">Title&#32;&#58;&#32;<?php echo $row['title']; ?></div>
							<div class="text-gray-800">Organise by&#32;&#58;&#32;<?php echo $row['organised_by']; ?></div>
							<div class="font-weight-normal text-gray-800">Address&#32;&#58;&#32;<?php echo $row['address']; ?></div>
							<div class="font-weight-bold text-gray-800">Date&#32;&#58;&#32;<?php echo $row['date']; ?>&#32;&nbsp;&#32;Time&#32;&#58;&#32;<?php echo $row['time']; ?></div>
							<div class="font-weight-normal text-gray-800">Details&#32;&#58;&#32;<?php echo $row['details']; ?></div>
						</div>
					<div class="col-sm-4 font-weight-bold text-gray-900">	
<?php 
$loc = 'admin/camps_assets/'.$row['image'];

list($width,$height) = getimagesize($loc); 
 ?>
						
						
						<figure>
					      <a href="admin/camps_assets/<?php echo $row['poster']; ?>"  itemprop="contentUrl" data-size="<?php echo $width."x".$height; ?>">
					          <img src="admin/camps_assets/<?php echo $row['poster']; ?>" alt="Image description" class="rounded shadow-sm myImgg imgdisplay image" itemprop="thumbnail" width="300" height="auto"/>
					      </a>
					         <figcaption itemprop="caption description"><?php echo $row['title']; ?></figcaption>
					                                          
					    </figure>
					<?php endwhile; ?>
						</div>

						
					</div>



<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <!--  Controls are self-explanatory. Order can be changed. -->
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

<!-- Core JS file -->
<script src="PhotoSwipe-4.1.3/dist/photoswipe.min.js"></script> 
<!-- UI JS file -->
<script src="PhotoSwipe-4.1.3/dist/photoswipe-ui-default.min.js"></script>
<script>
var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');

</script>

					<div class="text-center">
						<a href="camps.php" title="View all Events & Campaign" class="m-0 p-0">View All..</a>
					</div>
		
			</div>

			</div>
	
		</div>



		<div class="col-sm-4 eventrightpng" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="80"> 
			<div class="w-50">
				<img src="assets/preview_70401021.png" alt="video-ilust">
			</div>
		</div> 
	</div>
</section>


<!-- ------------------- endd Video --------------- -->


<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM message") or die($mysqli->error);

//  pre_r($result);        /// to get record value

?> 


	<!------------- contact ussss --------->
	
	<div class="container text-center text-dark mt-5" id="contact" data-aos="fade-up">
	<h3>Contact Us</h3>
	<!-- Contact us validate form  -->

	<form action="dataconn/contact.php" method="POST" class="needs-validation" accept-charset="utf-8" novalidate>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-row">
			<div class="col-md-4 mb-3">
				<label for="validationCustom01">Full Name : </label>
				<input type="text" class="form-control" id="validationCustom01" placeholder="Enter Fullname" value="" name="name" autocomplete="off" required>
				<div class="valid-feedback">
					Looks good!
				</div>
				<div class="invalid-feedback">
					Please provide a your name.
				</div>
			</div>
			<div class="col-md-4 mb-3">
				<label for="validationCustom02">Email : </label>
				<input type="email" class="form-control" id="validationCustom02" id="exampleInputEmail1" placeholder="Enter Email Address" value="" name="email" aria-describedby="emailHelp" autocomplete="off" required>
				<div class="valid-feedback">
					Looks good!
				</div>
				<div class="invalid-feedback">
					Please provide a valid email.
				</div>
			</div>

			<div class="col-md-4 mb-3">
				<label for="validationCustom03">City : </label>
				<input type="text" class="form-control" id="validationCustom03" placeholder="City" autocomplete="off" name="city" required>
				<div class="valid-feedback">
					Looks good!
				</div>
				<div class="invalid-feedback">
					Please provide a valid city.
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label for="validationCustom04">Write your massage : </label>
			<textarea class="form-control" name="message" id="validationCustom04" rows="3" placeholder="Write your message" autocomplete="off" required></textarea>
			<div class="valid-feedback">
					Looks good!
				</div>
				<div class="invalid-feedback">
					Please enter your message.
				</div>
		</div>


		<div class="form-group">


<div class="row justify-content-center mt-4">
			<label for="donerornot" class="pr-5" ><h6>Have you ever donated blood?</h6>
			</label>

			<div class="">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" autocomplete="off" value="Yes" required>
					<label class="custom-control-label" for="customControlValidation2">Yes</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" autocomplete="off" value="No" required>
					<label class="custom-control-label" for="customControlValidation3">No</label>
					<div class="invalid-feedback text-left ml-4">Please check any one of this</div>
				</div>
			</div>
		</div>

			<div class="form-check mt-1">
				<input class="form-check-input" type="checkbox" value="" id="invalidCheck" autocomplete="off" required>
				<label class="form-check-label" for="invalidCheck">
					Agree to terms and conditions
				</label>
				<div class="invalid-feedback">
					You must agree before submitting.
				</div>
			</div>
		</div>
		<button class="btn btn-primary" name="submitmsg" type="submit">Submit</button>
</form>


</div>


<!------------ enddd contact ----------->


<!----------------------- join us on ----------------->


<section class="mb-5 container text-dark">
	<div class="my-5 text-center">
		<h3>Join us on</h3>
	</div>
	<div class="py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="center-bottom">
		
		<ul id="iconul">
		<li class="iconli"><a href="https://www.facebook.com/"><i class="fab fa-3x fa-facebook-f" id="fbi" aria-hidden="true"></i></a></li>
		<li class="iconli"><a href="https://twitter.com/?lang=en"><i class="fab fa-3x fa-twitter" id="twi" aria-hidden="true"></i></a></li>
		<li class="iconli"><a href="https://accounts.google.com/"><i class="far fa-3x fa-envelope" id="gi" aria-hidden="true"></i></a></li>
		<li class="iconli"><a href="https://in.linkedin.com/"><i class="fab fa-3x fa-linkedin-in" id="lii" aria-hidden="true"></i></a></li>
		<li class="iconli"><a href="https://www.instagram.com/"><i class="fab fa-3x fa-instagram" id="igi" aria-hidden="true"></i></a></li>
		</ul>
		
	</div>
</section>


<!----------------------- enddd join us ----------------->



<?php include 'include/footer.php'; ?>


</div> <!--end home -->
<!--
<div class="container py-5">
	<h4> Welcome <?php //echo $_SESSION['username']; ?> </h4>
	<h2 class="py-5"><a href="logout.php">Logout</a></h2>
</div>
-->

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
<script>//$('.carousel').carousel()</script> 


<script src="js/aos.js"></script>

<script>
	AOS.init();
</script>

</body>
</html>