<?php
include '../config/connection.php';

$sql = "SELECT department_name FROM Departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<ul class="box-info">';
    while ($row = $result->fetch_assoc()) {
        $department_name = $row['department_name'];
        echo '<li>';
        echo '<i class="bx bxs-doughnut-chart"></i>';
        echo '<span class="text">';
        
        // Assigning URLs directly within the loop based on department names
        switch ($department_name) {
            case 'ASC':
                $department_url = '../templates/usersASC.php';
                break;
            case 'SLE':
                $department_url = '../templates/usersSLE.php';
                break;

            case 'ODIP':
                $department_url = '../templates/usersODIP.php';
                    break;

            case 'Career Services':
                $department_url = '../templates/usersCS.php';
                break;
            
            case 'Academic Committee':
                $department_url = '../templates/usersAC.php';
                break;
            default:
                // Default URL or handle accordingly
                $department_url = '#';
                break;
        }
        
        // Outputting department name as a clickable link
        echo '<h3><a href="' . $department_url . '">' . $department_name . '</a></h3>';
        
        echo '</span>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo "No departments found.";
}
