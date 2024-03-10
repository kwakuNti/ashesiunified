<?php
include '../../backend/settings/connection.php';
include '../../backend/settings/core.php';

// Get the outgoing user's unique_id from the session
$outgoing_id = $_SESSION['student_id'];

// Query to select all users except the outgoing user, ordered by user_id in descending order
$sql = "SELECT * FROM users WHERE NOT student_id = {$outgoing_id} ORDER BY user_id DESC";
$query = mysqli_query($conn, $sql);

$output = "";

// Check if there are no users available
if(mysqli_num_rows($query) == 0){
    // If no users are available, set a message indicating so
    $output .= "No users are available to chat";
} elseif(mysqli_num_rows($query) > 0){
    // If there are users available, include the data.php file to handle the display of users
    include_once "../../backend/actions/messagedata.php";
}

// Output the users or message
echo $output;
