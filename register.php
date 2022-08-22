<!-- <?php
//if(isset($_POST['login']))
{
//code for captach verification
//if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
//echo "<script>alert('Incorrect verification code');</script>" ;
}
//else { ?> -->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register - New Member</title>
		<?php include 'include/common_links.php'; ?>
		<?php include('include/scripts.php'); ?>
		<link rel="stylesheet" href="css/register.css" type="text/css">
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
					$('#books').append('<option value="" selected="" disabled="">Select District</option>')
					books.forEach(function(book){
						$('#books').append('<option>' + book.city_name + '</option>')
					})
				})
			})
		})
		</script>
	</head>
	<body id="page-top">

<?php require_once'dataconn/register_server.php'; ?>
<?php require_once'dataconn/br.php'; ?>


	<div class="home container-fluid">
			<div>
				<nav class="navbar text-md-center navbar-expand-lg navbar-light">
					<div class="container text-md-center">
						<a class="navbar-brand text-uppercase font-weight-bold" id="logo-name"href="index.php"><img src="assets/Component.png" id="logo1" alt="component">Bloodcells</a>
						<button class="navbar-toggler text-md-center" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span> </button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent1">
							<ul class="navbar-nav ml-auto font-weight-normal">
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="index.php">Home</a> </li>
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="register.php">Register</a> </li>
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="all_request.php">Request</a> </li>
								
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="camps.php">Activity</a> </li>
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="contact.php">Contact Us</a> </li>
								<li class="nav-item menu-item"> <a class="nav-link text-danger" href="about.php">About Us</a> </li>
								
<?php if (!isset($_SESSION['email'])): ?> 

    <li class="nav-item ml-lg-5"> <a class="nav-link float-sm-left" href="login.php"><h6 class="login-button">Log-in</h6></a> </li>

<?php else: ?>

<?php $email = $_SESSION['email'];

$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
$user = $mysqli->query("SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'") or die($mysqli->error); 
$arrayy = $user->fetch_assoc();

// SELECT SUBSTRING(fname,1,1),SUBSTRING(lname,1,1) FROM `user_reg` WHERE `email`='$email'

?>
 <!-- <?php// echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?> -->

         <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow ml-5 border-right border-dark border-left rounded-pill px-3">
              <a class="nav-link text-dark dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-capitalize text-dark"><?php echo $arrayy['SUBSTRING(fname,1,1)'].". ".$arrayy['SUBSTRING(lname,1,1)']."."; ?></span>
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

<?php if (isset($_SESSION['email'])): ?> 

	<div class="container badge-danger shadow-sm rounded-pill" data-aos="fade-up">
		<div class="p-2">
			You already registrated yourself. if you want to update your details you can go to <a href="userprofile.php" title="Go to User Control Panel" class="text-black-50">User Control Panel. </a> or if you want to register someone else please use different Email address and Phone number. 
		</div>
	</div>

<?php endif; ?>


			<div class="container mt-4 flex-column">
				<div class="text-gray-900">
					<h2>Resitration New Doner</h2>
					<p>By signing up for an online account you will be able to do the following:
						<ul class="ml-4">
							<li>Find out where you can donate</li>
							<li>View, change or cancel appointments</li>
							<li>Update your personal details</li>
							<li>View your recent donation history</li>
						</ul>
					You must use a unique email address that can only be accessed by yourself. This service is for registrating a user in our site who can able to donate in India only.</p></div>
<?php 



if (isset($_SESSION['correctquestion'])) {
  echo"<script>popup()
      function popup() {
  const Toast = Swal.mixin({
    toast: false,
    position: 'top-center',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'You are eligible to register :)'
  })
  }

  </script>";
  unset($_SESSION['correctquestion']);
} 



if (isset($_SESSION['formsubmitted'])) {
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
	  title: 'Registration successfull'
	})
	}

	</script>";
	unset($_SESSION['formsubmitted']);
} 
?>
<?php  
if(isset($_SESSION['wrongcode'])) {
echo"<script>pop()
function pop() {
	  Swal.fire({
	  position: 'top-center',
	  icon: 'warning',
	  title: 'Wrong captcha code!!!',
	  text: 'You entered wrong captcha code. Please enter correct captcha code to register.',
	  showConfirmButton: true,
	}) 
	}
	</script>";
	unset($_SESSION['wrongcode']);

}
?>


<?php if(isset($_SESSION['emailexist'])){
	echo"<script>pop()
	function pop() {
		  Swal.fire({
		  position: 'top-center',
		  icon: 'error',
		  title: 'Email already exist!!!',
		  text: 'Please use diffrent email address. Email that you enterd is already exist in our database. There is an account with this email address.',
		  showConfirmButton: true,
		}) 
		}
	</script>";
	unset($_SESSION['emailexist']);
}
?>


<?php if(isset($_SESSION['phoneexist'])){
 	echo"<script>pop()
	function pop() {
		  Swal.fire({
		  position: 'top-center',
		  icon: 'error',
		  title: 'Phone number already exist!!!', 
		  text: 'Please use diffrent phone number. Phone number that you enterd is already exist in our database. There is an account with this phone number.',
		  showConfirmButton: true,
		}) 
		}
	</script>";
        unset($_SESSION['phoneexist']);
}
?>

     



<?php 

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM user_reg") or die($mysqli->error);

?> 
					<form action="dataconn/register_server.php" onsubmit="return check()" class="needs-validation text-gray-900" method="post" novalidate>
						<input type="hidden" name="id" value="<?php echo $id; ?>">

						<div class="row w-auto">
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="fname">First Name :</label>
								<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter first name.</div>
							</div>
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="lname">Last Name :</label>
								<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter last name.</div>
							</div>
						</div>
						<!--  to get bloodgroup selection -->
						<?php
							$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
							$bloodgroup = $mysqli->query("SELECT * FROM bloodgroup") or die($mysqli->error);
							// to get record value
							// pre_r($bloodgroup);
						?>
						<div class="row w-auto">
							<div class="form-group col-4">
								<label for="bloodgroup">Select Blood Group :</label>
								<select name="bloodgroup" class="custom-select form-control" autocomplete="off" required>
									<option value="" selected="" disabled="">Select Bloodgroup</option>
									<?php while ($row = $bloodgroup->fetch_assoc()): ?>
									<option value="<?php echo $row['bloodgroup']; ?>"><?php echo $row['bloodgroup']; ?></option>
									<?php endwhile; ?>
								</select>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please select your blood group.</div>
							</div>


							<div class="justify-content-center col-3">
								<label for="gender">Select Gender :</label>
								<div class="">
									<div class="row ml-2 mt-2">
								        <div class="custom-control custom-radio custom-control-inline">
								          <input type="radio" class="custom-control-input" id="customControlValidation2" name="findgender" autocomplete="off" value="Male" required>
								          <label class="custom-control-label" for="customControlValidation2">Male</label>
								        </div>
								        <div class="custom-control custom-radio custom-control-inline">
								          <input type="radio" class="custom-control-input" id="customControlValidation3" name="findgender" autocomplete="off" value="Female" required>
								          <label class="custom-control-label" for="customControlValidation3">Female</label>
								          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
								        </div>
								        <div class="custom-control custom-radio custom-control-inline">
								          <input type="radio" class="custom-control-input" id="customControlValidation4" name="findgender" autocomplete="off" value="Others" required>
								          <label class="custom-control-label" for="customControlValidation4">Others</label>
								          <div class="invalid-feedback text-left ml-4">Please check any one of this</div>
								        </div>
								      </div>
								</div>
							</div>

							<div class="form-group col-5">
								<label for="age">Enter Your Age :</label>
								<input type="tel" class="form-control" id="age" maxlength="2" placeholder="Enter Age" name="age" pattern="[0-9]{2}" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter your current age.</div>
							</div>
						</div>
						<div class="row w-auto">
							<div class="form-group col-lg-8 col-12 col-sm-12 col-md-12">
								<label for="email">Email : </label>
								<input type="email" class="form-control" id="email" autocomplete="off" placeholder="Enter Email" name="email" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter email.</div>
							</div>
							<div class="form-group col-lg-4 col-12 col-sm-12 col-md-12">
								<label for="pincode">Pincode : </label>
								<input type="tel" class="form-control" id="pincode" autocomplete="off" placeholder="Enter Pincode"  pattern="[0-9]{6}"  maxlength="6" name="pincode" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter pincode.</div>
							</div>
						</div>
						<div class="row w-auto">
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="mobno">Mobile Number (+91) : </label>
								<input type="tel" class="form-control" id="mobno" placeholder="Enter Mobile Number" name="mobno" pattern="[0-9]{10}"  maxlength="10" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter 10 digit mobile number.</div>
							</div>
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="state">State :</label>
								<select class="custom-select form-control" name="authors" id="authors" autocomplete="off" required>
									<option value="" selected="" disabled="">Select State</option>
									
									<?php
										require 'dataconn/data.php';
										$authors = loadAuthors();
										foreach ($authors as $author) {
											echo "<option id='".$author['state_code']."' value='".$author['state_code']."'>".$author['state_name']."</option>";
										}
									?>
								</select>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please select state.</div>
							</div>
						</div>
						<div class="row w-auto">
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="district">District :</label>
								<select class="custom-select form-control" name="books" id="books" autocomplete="off" required>
									<option value="" selected="" disabled="">Select District</option>
								</select>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please select district.</div>
							</div>
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="uname">City :</label>
								<input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter city.</div>
							</div>
						</div>
						<div class="row w-auto">
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="pwd">Password :</label>
								<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please enter the password.</div>
							</div>
							<div class="form-group col-lg-6 col-12 col-sm-12 col-md-12">
								<label for="pwd2">Re-enter Password :</label>
								<input type="password" class="form-control" id="pwd2" placeholder="Re-enter password" name="pwd2" autocomplete="off" required>
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Please re-enter the password.</div>
							</div>
						</div>
						<div id="showErrorPwd"></div>	
						<script>
							$(document).ready(function(){
									
								$('#pwd2').keyup(function(){
									var pwd = $('#pwd').val();
									var pwd2 = $('#pwd2').val();

									if (pwd2!=pwd||pwd!=pwd2) {
										$('#showErrorPwd').html('**Password does not match.');
										$('#showErrorPwd').css('color','red');
										
										$('#submitbtnn').attr("disabled",true);
										return false;
									}
									else {
										$('#showErrorPwd').html('**Password matched.');
										$('#showErrorPwd').css('color','#28A745');
										$('#submitbtnn').attr("disabled",false);
										return true;
									}

								});

								$('#pwd').keyup(function(){
									var pwd = $('#pwd').val();
									var pwd2 = $('#pwd2').val();

									if (pwd2!=pwd||pwd!=pwd2) {
										$('#showErrorPwd').html('**Password does not match.');
										$('#showErrorPwd').css('color','red');
										
										$('#submitbtnn').attr("disabled",true);
										return false;
									}
									else {
										$('#showErrorPwd').html('**Password matched.');
										$('#showErrorPwd').css('color','#28A745');
										$('#submitbtnn').attr("disabled",false);
										return true;
									}

								});

							});
							</script>
						<div class="form-group col-md-12 form-inline mt-3">
							<label>Enter captcha : </label>

							<input type="text" class="form-control ml-3" name="vercode" maxlength="5" autocomplete="off" required/>&nbsp;&nbsp;&nbsp;

							<img src="dataconn/captcha.php">

							<div class="invalid-feedback">Please enter the captcha.</div>

						</div>
						<div class="form-group form-check ml-1 mb-3">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="remember" required> I agree to all terms and services.
								<div class="valid-feedback">Looks Good.</div>
								<div class="invalid-feedback">Check this checkbox to continue.</div>
							</label>
						</div>
						<div class="row ml-1 ">

						<button type="submit" name="submit" id="submitbtnn" class="btn disabledbtn btn-primary px-5 mt-3" onsubmit="pop()">Register</button>

							<div class="text-gray-900 mt-3"><span style="font-size: 27px;"> &nbsp;&nbsp;&#124;&nbsp;&nbsp;</span>Already registrated!
								<a href="login.php" title=""><b>Log-in</b></a>
							</div>
						</div>

					</form>
					<!-- Delete Modal-->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registration Successful</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Your registration in bloodcells is successfull. Account is created you can login now.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Login</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
				</div>

<?php 
	// if ($_SESSION['wrongcode']) {
	 // echo "string"; }
 ?>

<script>


// $(window).load(function(){
// $('pop()').modal('show');
// });

	// $("form").on('submit',function(){
	// 	$('pop()').show();
	// });


  function pop() {

  Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Your registration has been successfull.',
  showConfirmButton: true,
  timer: 1500

}) 
}
</script> 
					
				<!-- *************** to get array values from table fetch it ************* -->
				<?php
					function pre_r( $array){
				echo '<pre>';
					print_r($array);
						echo '</pre>';
					}
				?>
				<div class="container mt-5">
					<hr>
				</div>
				
				<?php include 'include/footer.php'; ?>
				</div>



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