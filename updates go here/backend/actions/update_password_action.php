<?php
include("../settings/core.php");
include("../settings/connection.php");

if (isset($_POST['update_profile'])) {
    $old_pass = $_POST['update_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $user_id = $_SESSION['user_id'];

    // Check if the old password matches the current password in the database
    $select_old_pass = $conn->prepare("SELECT password FROM Users WHERE user_id = ?");
    $select_old_pass->bind_param("s", $user_id);
    $select_old_pass->execute();
    $select_old_pass->bind_result($current_pass);
    $select_old_pass->fetch();
    $select_old_pass->close();

    if (password_verify($old_pass, $current_pass)) {
        if ($new_pass == $confirm_pass) {
            // Hash the new password
            $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_pass = $conn->prepare("UPDATE Users SET password = ? WHERE user_id = ?");
            $update_pass->bind_param("ss", $hashed_pass, $user_id);
            $update_pass->execute();
            $update_pass->close();

            header("Location: ../../pages/Settings/settings.php?msg=Password updated successfully");
            exit;
        } else {
            header("Location: ../../pages/Settings/settings.php?msg=New passwords do not match.");
            exit;
        }
    } else {
        header("Location: ../../pages/Settings/settings.php?msg=Incorrect old password.");
        exit;
    }
}