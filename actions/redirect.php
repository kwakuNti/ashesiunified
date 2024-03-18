<?php
include '../config/core.php';
checkLogin();

// Check if the user_id is set in the query string
if (isset($_GET['user_id'])) {
$user_id = $_GET['user_id'];

// You can perform additional checks or operations with the $user_id if needed

// Check if the role_id is set in the session
if (isset($_SESSION['role_id'])) {
$role_id = $_SESSION['role_id'];

// Redirect the user based on their role
if ($role_id == 3) {
// If role_id is 3, redirect to studentDashboard
header("Location: ../templates/studentDashboard.php");
exit;
} elseif ($role_id == 2) {
// If role_id is 2, redirect to dashboard
header("Location: ../templates/dashboard.php");
exit;
} else {
// Handle other role IDs or scenarios as needed
// For example, redirect to a default dashboard page
header("Location: ../templates/dashboard.php");
exit;
}
} else {
// If role_id is not set in the session, redirect to a default dashboard page
header("Location: ../templates/dashboard.php");
exit;
}
} else {
// If user_id is not set in the query string, handle the error or redirect to a default page
header("Location: ../templates/dashboard.php");
exit;
}