<?php
include '../config/connection.php';
function getUserProfileImage($user_id) {
    global $conn; // Assuming $conn is your database connection variable

    // Prepare and execute query to fetch user's profile image
    $stmt = $conn->prepare("SELECT img FROM Users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($img);
    $stmt->fetch();
    $stmt->close();

    return $img;
}

