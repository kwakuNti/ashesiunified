<?php
// Function to retrieve the status name by user ID
function getStatusNameByUserId($conn, $user_id) {
    // Escape the user ID to prevent SQL injection
    $escaped_user_id = mysqli_real_escape_string($conn, $user_id);
    
    // Query to retrieve the status name
    $sql = "SELECT s.status_name 
            FROM Statuses s 
            INNER JOIN Users u ON s.status_id = u.status_id 
            WHERE u.user_id = '{$escaped_user_id}'";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the status name from the result set
        $row = mysqli_fetch_assoc($result);
        return $row['status_name'];
    } else {
        // If the query fails or no rows are returned, return null or an appropriate default value
        return null;
    }
}