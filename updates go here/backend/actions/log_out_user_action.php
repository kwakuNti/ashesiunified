<?php
// Start the session
session_start();

// Unset specific session variables
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);
unset($_SESSION['unique_id']);


header("Location: ../../pages/Login/login.php");
exit;

