<?php
// Include necessary core and connection files
include '../config/core.php';
include '../config/connection.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $outgoing_id = $_SESSION['user_id'];
    
    // Sanitize incoming user ID and message
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Check if message is not empty
    if (!empty($message)) {
        // Insert message into database
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                     VALUES ('$incoming_id', '$outgoing_id', '$message')")
               or die("Error: " . mysqli_error($conn));
    }
} else {
    // Redirect to login page if user is not logged in
    header("location: ../login.php");
}

