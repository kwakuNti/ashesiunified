<?php

include ("../config/connection.php");
include ("../config/core.php");


date_default_timezone_set('UTC');
$date_today=date('Y-m-d');

if (isset($_POST['submit'])){
    $department_id =($_POST["department_id"]);
    $announcement_title=$_POST['announcement_title'];
    $announcement_content=$POST['announcement_content'];
    $announcement_date=$POST['announcement_date'];
    $created_by==$_SESSION['user_id'];

    $sql = "INSERT into Announcements(department_id, announcement_title, announcement_content, announcement_date,created_by ) values(?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param('isssi',$department_id, $announcement_title, $announcement_content, $announcement_date, $created_by);

    if($stmt->execute()){
        header("Location: ../templates/dashboard.php");
        echo 'Sent';
    }
    else{
        echo "Error" . $conn->error;
        exit;
    }
}