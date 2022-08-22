
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>  
  <!-- <script src="js/bootstrap-4.0.0.js"></script> -->
  <script src="js/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <!-- <script src="js/jquery-3.4.1.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/admin.min.js"></script>

  <!-- ajax -->

  <script type="text/javascript" src="js/ajax.js"></script>

<!-- font awesome -->

 <script src="vendor/fontawesome-free/js/all.js"></script>




<!-- search -->

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>





     <!-- Loding screen -->

    <div class="loader-wrapper">
      <ul id="loader">
        <li class="loading-ball"></li>
        <li class="loading-ball"></li>
        <li class="loading-ball"></li>
        <li class="loading-ball"></li>
        <li class="loading-ball"></li>
      </ul>
    </div>

<!-- Script for loading screen -->

    <script>
      $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
      })
    </script>

