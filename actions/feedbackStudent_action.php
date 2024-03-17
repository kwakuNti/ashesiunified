<?php

include ("../config/connection.php");
include ("../config/core.php");


date_default_timezone_set('UTC');
$date_today=date('Y-m-d');



if(isset($_POST['submit'])){
    $userID = $_SESSION['user_id'];
    $feedback_content=$_POST['feedback_content'];
    


    $sql = "INSERT into Feedback(user_id, feedback_content, feedback_date) values(?, ?, ?)";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param('iss', $userID, $feedback_content,  $date_today);  

    if($stmt->execute()){
        header("Location: ../templates/studentDashboard.php");
        echo 'Sent';
    }
    else{
        echo "Error" . $conn->error;
        exit;
    }
    


}