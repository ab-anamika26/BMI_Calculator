<?php
// logout.php

session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie if exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Redirect to login or home page after logout
header("Location: login.php"); // Change 'login.php' to your login page URL
exit();
?>
