<?php
function countFeedbackByUser($conn, $userId) {
    // Prepare and execute SQL query to count feedback sent by the user
    $sql = "SELECT COUNT(*) AS feedback_count FROM Feedback WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the count from the result
    $row = $result->fetch_assoc();
    return $row['feedback_count'];
}

// Call the function to get the feedback count for the logged-in user
$feedbackCount = countFeedbackByUser($conn, $_SESSION['user_id']);


// Function to fetch announcements from the database
function fetchAnnouncements($conn) {
    // Initialize an empty array to store announcements
    $announcements = array();

    // SQL query to select announcements from the database
    $sql = "SELECT announcement_content FROM announcements";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch associative array of announcements
        while ($row = $result->fetch_assoc()) {
            // Add each announcement to the $announcements array
            $announcements[] = $row;
        }
    }

    // Return the array of announcements
    return $announcements;
}