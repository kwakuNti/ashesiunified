<?php
    include '../../backend/settings/core.php';
    include '../../backend/settings/connection.php';


    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT user_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "../../backend/actions/messagedata.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
