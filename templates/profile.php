<?php
include '../config/core.php';
include '../includes/fetch_active_user.php';
include '../actions/update_profile.php';
include '../includes/details.php';
checkLogin()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Profile</title>
    <link rel="stylesheet" href="../public/css/profile.css" />
    <link rel="stylesheet" href="mediaqueries.css" />
</head>

<body>
    <nav id="desktop-nav">
        <div class="logo"><?php echo getUserFullName($_SESSION['user_id']); ?></div>
        <div>
            <ul class="nav-links">
                <li><a href="#about">Home</a></li>
                <li><a href="../actions/redirect.php">Dashboard</a></li>
                <li><a href="../templates/settings.php">Settings</a></li>
                <li><a href="../templates/Logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <nav id="hamburger-nav">
        <div class="logo"><?php echo getUserFullName($_SESSION['user_id']); ?></div>
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu-links">
                <li><a href="#about" onclick="toggleMenu()">About</a></li>
                <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
                <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
                <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
            </div>
        </div>
    </nav>
    <section id="profile">
        <div class="section__pic-container">
            <img src="<?php echo getUserProfileImage($_SESSION['user_id']); ?>" alt="profile-picture"
                style="border-radius: 50%;">
        </div>
        <div class="section__text">
            <p class="section__text__p1">Hi there, My name is </p>
            <h1 class="title"><?php echo getUserFullName($_SESSION['user_id']); ?></h1>
            <?php
            // Check if user profile details exist
            if ($userProfileDetails) {
                // Output user profile details
                echo "<p class='section__text__p2'>" . $userProfileDetails['role'] . "</p>";
                echo "<p>Date of Birth: " . $userProfileDetails['date_of_birth'] . "</p>";
                echo "<p>User ID: " . $userProfileDetails['user_id'] . "</p>";
                echo "<p>Email: " . $userProfileDetails['email'] . "</p>";
            } else {
                echo "<p>User profile details not found.</p>";
            }
            ?>
        </div>
</body>

</html>