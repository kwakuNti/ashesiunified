<?php
// Include your existing connection.php file
include '../config/connection.php';

// Function to fetch events with status (completed or pending)
function fetchEvents($conn) {
    $events = array(); // Initialize an empty array to store events
    $query = "SELECT event_title, event_date FROM Events";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch associative array
        while ($row = mysqli_fetch_assoc($result)) {
            $event_date = strtotime($row['event_date']);
            $current_date = time();

            // Determine the status based on the event date and current date
            if ($current_date > $event_date) {
                $status = 'completed';
            } else {
                $status = 'pending';
            }

            // Append event details and status to the events array
            $events[] = array(
                'event_name' => $row['event_title'],
                'event_date' => $row['event_date'],
                'status' => $status
            );
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $events; // Return the array of events
}

$events = fetchEvents($conn);
function countUpcomingEvents($conn) {
    // Get the current date
    $currentDate = date('Y-m-d');

    // Query to count the number of upcoming events
    $query = "SELECT COUNT(*) AS upcoming_events_count FROM Events WHERE event_date > '$currentDate'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $upcomingEventsCount = $row['upcoming_events_count'];
        return $upcomingEventsCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}