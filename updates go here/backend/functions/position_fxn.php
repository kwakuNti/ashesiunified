<?php
// Include database connection file
include '../../backend/settings/connection.php';

$sql = "SELECT * FROM Positions";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch all positions as associative array
    $positions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Echo HTML for dropdown

    echo '<label for="position"></label>';
    echo '<select name="position_id" required >';
    echo '<option value="" disabled selected>Select Position</option>';
    
    // Iterate through positions and echo options
    foreach ($positions as $position) {
        echo '<option value="' . $position['position_id'] . '">' . $position['position_title'] . '</option>';
    }
    
    echo '</select>';
} else {
    // Echo error message if query fails
    echo "Error: " . mysqli_error($conn);
}

