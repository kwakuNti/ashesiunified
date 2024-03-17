<?php
include("../config/connection.php");

// Function to fetch announcements from the database
function fetchAnnouncements() {
    global $conn;
    $announcementsx = array();

    // Fetch announcements from the database
    $sql = "SELECT * FROM Announcements ORDER BY announcement_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $announcementsx[] = $row;
        }
    }

    return $announcementsx;
}