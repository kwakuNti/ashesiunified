<?php
// Function to fetch user profile details
function getUserProfileDetails($user_id)
{
    global $conn; // Assuming $conn is your database connection object

    // Prepare and execute SQL query to fetch user profile details
    $stmt = $conn->prepare("SELECT r.description AS role, u.date_of_birth, u.user_id, u.email FROM Users u INNER JOIN Roles
r ON u.role_id = r.role_id WHERE u.user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch user details
        $userDetails = $result->fetch_assoc();
        return $userDetails;
    } else {
        return false; // User not found
    }
}

// Fetch user profile details
$userProfileDetails = getUserProfileDetails($_SESSION['user_id']);