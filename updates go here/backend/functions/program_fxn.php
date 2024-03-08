<?php
// Include database connection file
include '../../backend/settings/connection.php';

$sql = "SELECT * FROM Programs";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch all programs as associative array
    $programs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Echo HTML for dropdown
    echo '<label for="program"></label>';
    echo '<select name="program" required>';
    echo '<option value="" disabled selected>Select Program</option>';
    
    // Iterate through programs and echo options
    foreach ($programs as $program) {
        echo '<option value="' . $program['program_id'] . '">' . $program['program_name'] . '</option>';
    }
    
    echo '</select>';
} else {
    // Echo error message if query fails
    echo "Error: " . mysqli_error($conn);
}
