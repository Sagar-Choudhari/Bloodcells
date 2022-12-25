<?php

include 'fb-init.php';
// session_destroy();

$_SESSION = array();
if (ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(),'',time() -42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

unset($_SESSION['access_token']);
unset($_SESSION['loginfbid']);
unset($_SESSION['stdlogin']);
session_unset();
session_destroy();
header("location:../login.php");

?>