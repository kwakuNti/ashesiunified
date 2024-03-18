<?php
include '../../backend/settings/core.php';
include '../../backend/settings/connection.php';

if(checkLogin()){
    // Get the outgoing and incoming user IDs
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    
    $output = "";
    
    // Select messages from the database
    $sql = "SELECT * FROM messages LEFT JOIN Users ON users.user_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    
    $query = mysqli_query($conn, $sql);

    // Check if there are messages
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] === $outgoing_id){
                // Outgoing message
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            } else {
                // Incoming message
                $output .= '<div class="chat incoming">
                            <img src="php/images/'.$row['img'].'" alt="">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            }
        }
    } else {
        // No messages available
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    
    // Output the messages
    echo $output;
}