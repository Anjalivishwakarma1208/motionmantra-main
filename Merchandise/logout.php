<?php
session_start();
$_SESSION = array();
session_destroy(); // Destroy all session data
header("Location: login.php"); // Redirect to login page
exit();
?>
