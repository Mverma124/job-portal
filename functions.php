<?php
function checkLoggedIn() {
    // Start session if not already started
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // User is not logged in, redirect to login page
        header('Location: null.php');
        exit;
    }
}
?>
