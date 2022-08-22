
<?php include('include/header.php'); ?>

<title>Admin - Messages</title>
<link rel="stylesheet" href="message_assets/message.css">
</head>
<body id="page-top">

<?php require_once 'message_assets/mail.php'; ?>
<?php require_once 'message_assets/delete.php'; ?>

<?php 
// if (isset($_SESSION['mail'])) {
// 	echo"<script>popup()
// 		  function popup() {
// 	const Toast = Swal.mixin({
// 	  toast: false,
// 	  position: 'top-center',
// 	  showConfirmButton: false,
// 	  timer: 2000,
// 	  timerProgressBar: true,
// 	  onOpen: (toast) => {
// 	    toast.addEventListener('mouseenter', Swal.stopTimer)
// 	    toast.addEventListener('mouseleave', Swal.resumeTimer)
// 	  }
// 	})


// 	Toast.fire({
// 	  icon: 'success',
// 	  title: 'Message sent'
// 	})
// 	}
// 	</script>";
// 	unset($_SESSION['mail']);
// } 

 ?>


<?php 
// if (isset($_SESSION['mailerror'])) {
// 	echo"<script>popup()
// 		  function popup() {
// 	const Toast = Swal.mixin({
// 	  toast: false,
// 	  position: 'top-center',
// 	  showConfirmButton: false,
// 	  timer: 2000,
// 	  timerProgressBar: true,
// 	  onOpen: (toast) => {
// 	    toast.addEventListener('mouseenter', Swal.stopTimer)
// 	    toast.addEventListener('mouseleave', Swal.resumeTimer)
// 	  }
// 	})

// 	Toast.fire({
// 	  icon: 'success',
// 	  title: 'Message not sent'
// 	})
// 	}
// 	</script>";
// 	unset($_SESSION['mailerror']);
// } 

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

		<div class="container">

				<?php 

					$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
					$result = $mysqli->query("SELECT * FROM message ORDER BY id DESC") or die($mysqli->error);


				?> 

<?php if (isset($_SESSION['replymail'])): ?>
<div class="container mb-5">
	<h5 class="modal-title">Reply to&nbsp;<b class="text-capitalize"><?php echo $name; ?></b></h5>
      	<form action="message_assets/mail.php" method="POST" class="validate" accept-charset="utf-8">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control disabled" name="recipient" value="<?php echo $email; ?>" id="email" placeholder="Enter Mail Here" required>
          </div>
          <div class="form-group">
            <label for="message-subject" class="col-form-label">Subject:</label>
            <input type="text" class="form-control" name="subject" id="recipient-name" placeholder="Enter subject" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text" rows="4" placeholder="Enter your message here" required></textarea>
          </div>
          <div class="text-center m-auto d-block p-2 px-5">
            <button type="submit" name="reply" class="btn btn-primary px-4 mx-3">Reply to&nbsp;<?php echo $name; ?></button>
            <a href="message.php" title="cancel" class="btn btn-secondary px-4 mx-3">Cancel</a>
          </div>
        </form>
</div>

<?php unset($_SESSION['replymail']); ?>
<?php endif; ?>


 <div class="text-center" style="margin-left: 370px; align-items: center; align-content: center;" align="center">
              
           <div class="row text-center"> 
              
              <?php 
              if(isset($_SESSION['mail'])): ?>
              <div class="alert-<?=$_SESSION['mail_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
              <div class="message mt-2 mx-4 badge-default text-<?=$_SESSION['mail_type']?>">
                <?php 
                  echo $_SESSION['mail']; 
                  unset($_SESSION['mail']);
                ?>
              </div>
               <div class="alert-<?=$_SESSION['mail_type']?>">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php endif ?>
            </div>
          </div>




	<div class="container">
		<div class="container">

			<div class="table-responsive">
			<table class="table table-borderless table-striped">
				<thead class="thead">
					<tr>
<!-- 						<th scope="col">No.</th> -->
						<th scope="col" class="h5 font-weight-bold text-primary">Messages</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php while ($row = $result->fetch_assoc()): ?>
						<tr class="table-row">
							
							
							<td class="font-weight-bold text-gray-900 rounded">
								<div class="mx-5">
									<div class="row mt-2 text-capitalize">
									 
										<img src="img/icon-person@2x.png" alt="" class="icons-person">&nbsp;
										<?php echo $row['name']; ?>
										
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="img/icon-location-on@2x.png" alt="" class="icons">&nbsp;
										<?php echo $row['city']; ?>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<div class=" text-left"><i class="fas fa-envelope"></i></i>&nbsp;
										<?php echo $row['email']; ?>
									</div>
									</div>
									<div class="row">
										<div class="font-weight-bold my-3 text-gray-900 col">
											<?php echo $row['message']; ?>
										</div>
										<div class="col-auto m-auto d-block text-center">

											
								<input type="hidden" name="id" value="<?php echo $id; ?>">

								<a href="message.php?edit=<?php echo $row['id']; ?>" title="Reply to message"class="btn btn-success text-decoration-none" name="reply">Reply</a>


<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="mailReply" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h5 class="modal-title" id="mailReply">Reply to<?php echo $name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<!-- <input type="hidden" id="email" value="<?php //echo $row['email']; ?>"> -->

      	<form action="message_assets/mail.php" method="POST" accept-charset="utf-8">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" name="recipient" value="<?php echo $email; ?>" disabled="true" id="email">
          </div>
          <div class="form-group">
            <label for="message-subject" class="col-form-label">Subject:</label>
            <input type="text" class="form-control" name="subject" id="recipient-name"required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text" rows="4" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="reply">Send Mail</button>
      </div>
    </div>
  </div>
</div>
											<br>

											<a href="#deleteModal<?php echo $row['id']; ?>" class="btn my-1 btn-danger" data-toggle="modal">Delete</a>
								 
<!-- Delete Modal-->
  <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete message?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you really want to delete the message of <?php echo $row['name']; ?>??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="message_assets/delete.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>




										</div>
									</div>
									<div class="row">&nbsp;
										<img src="img/icon open-droplet@2x.png" alt="" class="icons">&nbsp;Blood donated : 
										<?php echo $row['donated_bld']; ?> 
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ndash;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<img src="img/icon material-date-range@2x.png" alt="" class="icons">&nbsp;
										<?php echo $row['dateposted']; ?>
									</div>
								</div>
							</td>
						</tr>
				
				<?php endwhile; ?>
			</tbody>
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
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
include('include/footer.php');
?>
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