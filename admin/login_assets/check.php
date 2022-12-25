<?php 

error_reporting(0);
session_start();

if (isset($_SESSION['stdlogin'])) 
    {
        echo"session is active";
    }




else {
    echo"session is not active";
    echo $_SESSION['stdlogin'];
}

echo"<br><br>";

// if (session_status() == PHP_SESSION_ACTIVE){
//     echo"Session is active";
// } else {
//     echo "Session not";
// }

// session_destroy();
 ?>