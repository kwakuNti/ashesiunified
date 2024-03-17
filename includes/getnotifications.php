<?php
// Include the database connection file
include '../config/connection.php';
include '../config/core.php';
checkLogin();

// Fetch notifications for the logged-in user from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM UserNotifications WHERE user_id = '$user_id' AND is_read = 0 ORDER BY notification_date DESC";
$result = mysqli_query($conn, $sql);

// Check if there are any unread notifications
if (mysqli_num_rows($result) > 0) {
    // Fetch the notifications and mark them as read
    $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Mark notifications as read
    $update_sql = "UPDATE UserNotifications SET is_read = 1 WHERE user_id = '$user_id'";
    mysqli_query($conn, $update_sql);

    // Close the database connection
    mysqli_close($conn);

    // Return fetched notifications as JSON data
    echo json_encode($notifications);
} else {
    // No unread notifications found
    echo json_encode(array());
}