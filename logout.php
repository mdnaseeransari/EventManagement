<?php
session_start();
// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to main.html
header("Location: index.html");
exit;
?>