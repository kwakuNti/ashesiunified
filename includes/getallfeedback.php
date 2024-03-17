<?php
// Include your existing connection.php file
include '../config/connection.php';
function fetchFeedback($conn) {
    $feedbacks = array(); // Initialize an empty array to store feedbacks
    $query = "SELECT f.feedback_date, f.user_id, f.feedback_content, CONCAT(u.first_name, ' ', u.last_name) AS user_name
    FROM Feedback f
    INNER JOIN Users u ON f.user_id = u.user_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch associative array
        while ($row = mysqli_fetch_assoc($result)) {
            // Append feedback details to the feedbacks array
            $feedbacks[] = array(
                'feedback_date' => $row['feedback_date'],
                'feedback_content' => $row['feedback_content'],
                'user_name' => $row['user_name']
            );
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $feedbacks; // Return the array of feedbacks
}
