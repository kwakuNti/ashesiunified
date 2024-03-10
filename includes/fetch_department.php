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
                $department_url = '../../pages/Chat/department_a_chat.php';
                break;
            case 'SLE':
                $department_url = '../../pages/Chat/department_b_chat.php';
                break;

            case 'ODIP':
                $department_url = '../../pages/Chat/department_c_chat.php';
                    break;

            case 'Career Services':
                $department_url = '../../pages/Chat/department_d_chat.php';
                break;
            
            case 'Academic Committee':
                $department_url = '../../pages/Chat/department_e_chat.php';
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
