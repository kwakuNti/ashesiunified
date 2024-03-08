<?php
include("../settings/core.php");
include("../settings/connection.php");

if (isset($_POST['update_profile_pic'])) {
    $user_id = $_SESSION['user_id'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        // Move the uploaded file to a desired directory
        $upload_dir = 'uploads/';
        $file_path = $upload_dir . basename($file_name);

        $allowed_types = array('jpg', 'jpeg', 'png');
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed_types)) {
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Store the file path in the database
                $insert_image = $conn->prepare("INSERT INTO UserProfileImages (user_id, image_path) VALUES (?, ?)");
                $insert_image->bind_param("ss", $user_id, $file_path);
                $insert_image->execute();
                $insert_image->close();

                header("Location: ../../pages/Settings/settings.php?msg=Image uploaded successfully.");
                exit;
            } else {
                header("Location: ../../pages/Settings/settings.php?msg=Error uploading image.");
                exit;
            }
        } else {
            header("Location: ../../pages/Settings/settings.php?msg=Invalid file type. Only JPG, JPEG, and PNG files are allowed.");
            exit;
        }
    }
}
