<?php
include '../config/core.php';
include '../config/connection.php';

$outgoing_id = $_SESSION['user_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$sql = "SELECT u.user_id, u.first_name, u.last_name, u.email, u.img, u.status
        FROM Users u
        WHERE u.user_id != '$outgoing_id'
        AND (u.first_name LIKE '%$searchTerm%' OR u.last_name LIKE '%$searchTerm%')
        ORDER BY u.first_name ASC";

$output = "";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $img = $row['img'];
        $status = $row['status'];

        $sql2 = "SELECT m.msg, m.incoming_msg_id, m.outgoing_msg_id
                 FROM messages m
                 WHERE (m.incoming_msg_id = '$user_id' OR m.outgoing_msg_id = '$user_id')
                 AND (m.outgoing_msg_id = '$outgoing_id' OR m.incoming_msg_id = '$outgoing_id')
                 ORDER BY m.msg_id DESC
                 LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
            $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;

            if (isset($row2['outgoing_msg_id'])) {
                $you = ($outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";
            } else {
                $you = "";
            }
        } else {
            $msg = "No message available";
            $you = "";
        }

        $offline = ($status == "Offline now") ? "offline" : "";
        $hid_me = ($outgoing_id == $user_id) ? "hide" : "";

        $output .= '<a href="chat.php?user_id=' . $user_id . '">
                        <div class="content">
                            <img src="' . ($img ? $img : 'default_profile.png') . '" alt="Profile Picture">
                            <div class="details">
                                <span>' . $first_name . ' ' . $last_name . '</span>
                                <p>' . $you . $msg . '</p>
                            </div>
                        </div>
                        <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                    </a>';
    }
} else {
    $output .= 'No user found related to your search term';
}

echo $output;
