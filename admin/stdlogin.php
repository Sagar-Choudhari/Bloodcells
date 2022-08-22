<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="BCCA student from G.H. Raisoni CCST, Nagpur.">
  <meta name="author" content="Sagar Choudhary">

  <link rel="stylesheet" href="css/loading.css">
<link rel="icon" href="../assets/logo.png" type="image/x-icon">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="css/admin.min.css" rel="stylesheet">
  <title>Admin - Login</title>
</head>
<body class="bg-gradient-danger" style="overflow-y: hidden; overflow-x: hidden;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="mt-5 text-center d-lg-block"><img src="img/login-bg.svg" alt="" width="60%"></div>
              <div class="m-auto d-block text-center">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Welcomeback Admin</h1>
                  </div>
                  <form action="login_assets/stdserver.php" method="POST" class="user" accept-charset="utf-8">
                    <div class="row">
                        <div class="form-group col-sm-6">
                        <input type="text" class="form-control form-control-sm rounded-pill border-dark" id="" name="userid" placeholder="Enter Username.." autocomplete="off" required>
                        </div>
                        <div class="form-group col-sm-6">
                        <input type="password" name="password" class="form-control rounded-pill form-control-sm border-dark" id="" autocomplete="off" placeholder="Enter Password" required>
                        </div>
                    </div>
                     <button type="submit" class="btn btn-primary rounded-pill btn-sm btn-block font-weight-bold" name="loginadmin">Login</button>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
 </div>

<?php include('include/script.php'); ?>
</body>

</html>