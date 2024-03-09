<?php
include '../../backend/settings/connection.php';
function getUserFullName($user_id) {
    global $conn;

    $stmt = $conn->prepare("SELECT first_name, last_name FROM Users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fullName = $row["first_name"] . " " . $row["last_name"];
    } else {
        $fullName = "Unknown";
    }

    return $fullName;
}

function getUserEmail($user_id) {
    global $conn;

    $stmt = $conn->prepare("SELECT email FROM Users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["email"];
    } else {
        $email = "Unknown";
    }

    return $email;
}


