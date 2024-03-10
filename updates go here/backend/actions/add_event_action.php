<?php
include("../settings/connection.php");

if(isset($_POST['submit'])){
    $event_title = $_POST['event_title'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_location =  $_POST['event_location'];
    $department_id = $_POST['department_id'];
    $created_by = $_POST['created_by'];
    

    if(empty($event_title) || empty($event_description) || empty($event_date) || empty($event_time) || empty($event_location) || empty($department_id) || empty($created_by)) {
        header("Location: ../pages/Calender/calendar.php?msg=Please fill in all fields");
        exit;
    }
    $insertQuery= "INSERT INTO People(event_title,event_description,event_date,event_time,event_location,department_id,created_by) VALUES(?,?,?,?,?,?,?)";

    if(mysqli_query($conn, $insertQuery)){
        header("Location: ../pages/Calender/calendar.php?msg=Successfully added the new event!");
        exit;
    } else {
        header("Location: ../pages/Calender/calendar.php?msg=Error adding event");
        exit;
    }
}
