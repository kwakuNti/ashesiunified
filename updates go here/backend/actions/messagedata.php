<?php
while($row = mysqli_fetch_assoc($query)){
    // Query to fetch the latest message for the current conversation
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['user_id']}
            OR outgoing_msg_id = {$row['user_id']}) AND (outgoing_msg_id = {$outgoing_id}
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    
    $status_name = getStatusNameByUserId($conn, $row['user_id']);

    // Determine the latest message for the conversation
    $result = (mysqli_num_rows($query2) > 0) ? $row2['msg'] : "No message available";
    $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
    
    // Determine if the latest message was sent by the current user
    $you = (isset($row2['outgoing_msg_id']) && $outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";

    // Determine the user's online status
    $offline = ( $status_name == "Inactive") ? "offline" : "";

    // Determine if the user is the current user
    $hid_me = ($outgoing_id == $row['user_id']) ? "hide" : "";

    // Output HTML for displaying the user's information
    $output .= '<a href="chat.php?user_id='. $row['user_id'] .'">
                <div class="content">
                <img src="php/images/'. $row['img'] .'" alt="">
                <div class="details">
                    <span>'. $row['first_name']. " " . $row['last_name'] .'</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
            </a>';
}
