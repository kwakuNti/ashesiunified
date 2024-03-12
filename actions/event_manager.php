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

    // Prepare an insert statement
    $sql = "INSERT INTO Events (event_title, event_description, event_date, event_time, event_location, department_id, created_by)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $event_title, $event_description, $event_date, $event_time, $event_location, $department_id, $_SESSION["user_id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Event inserted successfully
            header("location: ../templates/calendar.php?success"); // Redirect to calendar page
            exit();
        } else {
            // Error handling
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // If the form is not submitted, redirect back to the form page
    header("location: ../templates/calendar.php?msg=notsubmitted");
    exit;
}
