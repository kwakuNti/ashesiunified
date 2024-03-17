<?php 
include '../config/connection.php';
include '../includes/fetch_active_user.php';
include '../actions/update_profile.php';
include '../config/core.php';
checkLogin()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/settings.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Settings</title>
</head>

<body>

    </section>
    <div class="update-profile">
        <form action="../actions/update_password_action.php" method="post" enctype="multipart/form-data">
            <img src="<?php echo getUserProfileImage($_SESSION['user_id']); ?>" alt="profile-picture">
            <div class="flex">
                <div class="inputBox">
                    <span>username :</span>
                    <input type="text" name="first_name" value="<?php echo getUserFullName($_SESSION['user_id']); ?>"
                        class="box" readonly>
                    <span>your email :</span>
                    <input type="email" name="email" value="<?php echo getUserEmail($_SESSION['user_id']); ?>"
                        class="box" readonly>
                    <span>update your pic :</span>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="">
                    <span>old password :</span>
                    <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                    <span>new password :</span>
                    <input type="password" name="new_pass" placeholder="enter new password" class="box">
                    <span>confirm password :</span>
                    <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                </div>
            </div>
            <input type="submit" value="update profile" name="update_profile" class="btn">
            <a href="../actions/redirect.php?role=<?php echo $_SESSION['role_id']; ?>" class="delete-btn">go back</a>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === "Unsupported file type.") {
                        echo "swal('Warning', 'Unsupported file type.', 'warning');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Profile updated successfully") {
                      echo "swal('Success', 'Profile updated successfully', 'success');";
                  }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Failed to upload profile picture.") {
                        echo "swal('Warning', 'Failed to upload profile picture.', 'warning');";
                    }
					if (isset($_GET['msg']) && $_GET['msg'] === "New passwords do not match.") {
                        echo "swal('Warning', 'New passwords do not match.', 'warning');";
                    }
					if (isset($_GET['msg']) && $_GET['msg'] === "Incorrect old password.") {
                        echo "swal('Warning', 'Incorrect old password.', 'warning');";
                    }
                    ?>

    });
    </script>
</body>

</html>