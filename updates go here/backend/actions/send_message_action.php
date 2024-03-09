<?php

// Include necessary files
include '../../backend/settings/core.php';
include '../../backend/settings/connection.php';
checkLogin();

// Check if the user is logged in
if (checkLogin()) {
    
    // Get the outgoing user's unique_id from the session
    $outgoing_id = $_SESSION['user_id'];

    // Get the incoming user's unique_id from the POST data
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    // Get the message from the POST data and escape it to prevent SQL injection
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if the message is not empty
    if (!empty($message)) {
        // Insert the message into the database
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                    VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
    }
}