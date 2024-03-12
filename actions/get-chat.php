<?php
include '../config/core.php';
include '../config/connection.php';

if(isset($_SESSION['user_id'])) {
    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    $sql = "SELECT m.msg, m.msg_id, m.incoming_msg_id, m.outgoing_msg_id, u.first_name, u.last_name, u.img
    FROM messages m
    LEFT JOIN users u ON u.user_id = m.outgoing_msg_id
    WHERE (m.outgoing_msg_id = {$outgoing_id} AND m.incoming_msg_id = {$incoming_id})
       OR (m.outgoing_msg_id = {$incoming_id} AND m.incoming_msg_id = {$outgoing_id})
    ORDER BY m.msg_id ASC";

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="' . $row['img'] . '" alt="Profile Picture">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                            </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send a message, they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../templates/Login.php");
}