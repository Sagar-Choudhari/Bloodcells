<?php

include 'login_validation.php';
include 'login_request_validation.php';
session_destroy();
unset($_SESSION['email']);
header('location:../index.php');


?>