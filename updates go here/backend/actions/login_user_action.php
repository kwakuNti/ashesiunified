<?php
// Start session
session_start();

// Include necessary files
include("../settings/connection.php");

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
    $query = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    
    // Check if user exists
    if ($result->num_rows == 0) {
        // User not registered
        header("Location: ../../pages/Login/login.php?msg=User not registered");
        exit;
    } else {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['unique_id'] = $user['unique_id'];
            


            // Redirect to dashboard
            header("Location: ../../pages/dashboard/dashboard.php?msg=sucess");
            exit;
        } else {
            // Incorrect password
            header("Location: ../../pages/Login/login.php?msg=Incorrect password");
            exit;
        }
    }
} else {
    // Invalid request method
    echo "Invalid request method";
    exit;
}

