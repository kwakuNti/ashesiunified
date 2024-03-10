<?php
include("../config/core.php");
include("../config/connection.php");

// Check if the form is submitted
if (isset($_POST['update_profile'])) {
    // Update Profile Picture
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = array('image/jpeg', 'image/png', 'image/gif');

        // Get file information
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        // Verify file type
        if(!in_array($file_type, $allowed_types)) {
            header("Location: ../templates/settings.php?msg=Unsupported file type.");
            exit;
        }

        // Specify the directory where you want to save uploaded images
        $upload_dir = '../uploads/';

        // Generate a unique filename to prevent overwriting existing files
        $file_path = $upload_dir . '/' . uniqid() . '_' . $file_name;

        // Move uploaded file to desired location
        if(move_uploaded_file($file_tmp, $file_path)) {
            // Update the img column in the Users table with the image path
            $user_id = $_SESSION['user_id'];
            $stmt_update_img = $conn->prepare("UPDATE Users SET img = ? WHERE user_id = ?");
            $stmt_update_img->bind_param("ss", $file_path, $user_id);
            $stmt_update_img->execute();
            $stmt_update_img->close();
        } else {
            header("Location: ../templates/settings.php?msg=Failed to upload profile picture.");
            exit;
        }
    }

    // Update Password
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

            header("Location: ../templates/settings.php?msg=Profile updated successfully");
            exit;
        } else {
            header("Location: ../templates/settings.php?msg=New passwords do not match.");
            exit;
        }
    } else {
        header("Location: ../templates/settings.php?msg=Incorrect old password.");
        exit;
    }
}

