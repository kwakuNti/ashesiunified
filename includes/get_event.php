<?php
include '../config/connection.php';
function fetchEvents($conn) {
    // Initialize an empty array to store events
    $events = array();

    // SQL query to select events
    $sql = "SELECT * FROM Events";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch each row from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Add the row to the events array
            $events[] = $row;
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        // Error handling
        echo "Error: " . mysqli_error($conn);
    }

    // Return the events array
    return $events;
}

$events = fetchEvents($conn);

