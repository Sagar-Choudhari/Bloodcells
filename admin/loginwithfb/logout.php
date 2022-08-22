<?php

include 'fb-init.php';
session_destroy();
unset($_SESSION['access_token']);
unset($_SESSION['loginfbid']);
header("location:../login.php");

 ?>