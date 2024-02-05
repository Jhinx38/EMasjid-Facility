<?php
session_start();

// Check if the user is logged in
if ($_SESSION['uname'] != "" || $_SESSION['itname'] != "" || $_SESSION['adname'] != ""){
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: error.php");
    exit();
}
