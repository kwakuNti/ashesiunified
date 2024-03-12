<?php
// Start session
session_start();

// Include necessary files
include '../config/connection.php';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Email and password are required";
        exit;
    }

 // Retrieve user data from database
$query = "SELECT u.user_id, u.role_id, s.department_id
FROM Users u
LEFT JOIN Staff s ON u.user_id = s.user_id
WHERE u.email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 0) {
// User not registered
header("Location: ../templates/Login.php?msg=User not registered");
exit;
} else {
$user = $result->fetch_assoc();
// Verify password
if (password_verify($password, $user['password'])) {
// Set session variables
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['role_id'] = $user['role_id'];

// Store department_id in session
if ($user['department_id'] !== null) {
  $_SESSION['department_id'] = $user['department_id'];
} else {
  // Handle the case where department_id is null
  // You can set a default value or prompt the user to select a department
  $_SESSION['department_id'] = 0; // Set a default value of 0 for demonstration purposes
}

// Redirect to dashboard
header("Location: ../templates/dashboard.php?msg=success");
exit;
} else {
// Incorrect password
header("Location: ../templates/Login.php?msg=Incorrect password");
exit;
}
}
} else {
    // Invalid request method
    echo "Invalid request method";
    exit;
}
?>