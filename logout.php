<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

unset($_SESSION['ulogin']);
session_destroy(); // destroy session
header("location:index.php"); 

// if(isset($_SESSION['loginuser'])){
//     unset($_SESSION['loginuser']);
//     header("location:index.php"); 
// }
?>

