<?php
function countAnnouncements($conn) {
    // Prepare and execute SQL query to count announcements
    $sql = "SELECT COUNT(*) AS announcement_count FROM Announcements";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Fetch the count from the result
        $row = mysqli_fetch_assoc($result);
        return $row['announcement_count'];
    } else {
        // Handle query error
        return false;
    }
}

// Call the function to get the announcement count
$announcementCount = countAnnouncements($conn);