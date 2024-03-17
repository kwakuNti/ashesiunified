<?php
include '../config/connection.php';
include '../config/core.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with form data
    $event_title = trim($_POST["event-title"]);
    $event_description = trim($_POST["event-description"]);
    $event_date = trim($_POST["event-date"]);
    $event_time = trim($_POST["event-time"]);
    $event_location = trim($_POST["event-location"]);
    $department_id = ($_POST["department_id"]);

    // Prepare an insert statement for the Events table
    $sql_events = "INSERT INTO Events (event_title, event_description, event_date, event_time, event_location, department_id, created_by)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt_events = mysqli_prepare($conn, $sql_events)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt_events, "sssssss", $event_title, $event_description, $event_date, $event_time, $event_location, $department_id, $_SESSION["user_id"]);

        // Attempt to execute the prepared statement for Events
        if (mysqli_stmt_execute($stmt_events)) {
            // Event inserted successfully
            // Now, prepare an insert statement for the UserNotifications table
            $notification_title = $event_title;
            $notification_content = $event_description;
            $notification_date = date("Y-m-d H:i:s"); // Current timestamp
            $is_read = 0;

            $sql_notifications = "INSERT INTO UserNotifications (user_id, notification_title, notification_content, notification_date, is_read)
                VALUES (?, ?, ?, ?, ?)";

            if ($stmt_notifications = mysqli_prepare($conn, $sql_notifications)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt_notifications, "ssssi", $_SESSION["user_id"], $notification_title, $notification_content, $notification_date, $is_read);

                // Attempt to execute the prepared statement for UserNotifications
                mysqli_stmt_execute($stmt_notifications);

                // Close statement
                mysqli_stmt_close($stmt_notifications);
            }

            // Redirect to calendar page
            header("location: ../templates/calendar.php?success");
            exit();
        } else {
            // Error handling for Events table
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement for Events table
        mysqli_stmt_close($stmt_events);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // If the form is not submitted, redirect back to the form page
    header("location: ../templates/calendar.php?msg=notsubmitted");
    exit;
}