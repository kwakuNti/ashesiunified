<?php
// Include database connection file
include '../../backend/settings/connection.php';

$sql = "SELECT * FROM Departments";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch all departments as associative array
    $departments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Echo HTML for dropdown

    echo '<label for="department"></label>';
    echo '<select name="department_id" required >';
    echo '<option value="" disabled selected>Select Department</option>';
    
    // Iterate through departments and echo options
    foreach ($departments as $department) {
        echo '<option value="' . $department['department_id'] . '">' . $department['department_name'] . '</option>';
    }
    
    echo '</select>';
} else {
    // Echo error message if query fails
    echo "Error: " . mysqli_error($conn);
}
