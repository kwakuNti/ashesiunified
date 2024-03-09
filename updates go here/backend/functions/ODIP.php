<?php
include '../../backend/settings/connection.php';
// Fetch the list of registered staff members
$sql = "SELECT s.*, u.first_name, u.last_name FROM Staff s
        INNER JOIN Users u ON s.user_id = u.user_id
        WHERE s.department_id = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the staff members in the left sidebar
    while($row = $result->fetch_assoc()) {
        echo '<li class="person" data-chat="' . $row["user_id"] . '">';
        echo '<img src="path_to_profile_image/' . $row["user_id"] . '.jpg" alt="Profile Image" />';
        echo '<span class="name">' . $row["first_name"] . ' ' . $row["last_name"] . '</span>';
        echo '</li>';
    }
} else {
    echo "No staff members found.";
}
