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