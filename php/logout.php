<?php
session_start();

// Remove all session variables
$_SESSION = array();

// End session and return to login page
session_destroy();
header("Location: ../index.php");
exit;