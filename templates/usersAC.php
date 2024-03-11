<?php 
include '../config/core.php';
include '../config/connection.php';
include '../actions/update_profile.php';
checkLogin()
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<title>Chat</title>
<link rel="stylesheet" href="../public/css/chat.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php
                    $sql = mysqli_query($conn, "SELECT user_id, first_name, last_name, email, img, status FROM Users WHERE user_id = '{$_SESSION['user_id']}'");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>
                    <img src="<?php echo ($row['img'] ? $row['img'] : 'default_profile_picture.jpg'); ?>" alt="profile-picture">
                    <div class="details">
                        <span><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="../templates/dashboard.php?php echo $row['user_id']; ?>" class="logout">Go Back</a>
            </header>
            <div class="search">
                <span class="text">Select a user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>

    <script src="../public/js/usersAC.js"></script>

</body>
</html>