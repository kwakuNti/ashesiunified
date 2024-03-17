<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portfolio</title>
    <link rel="stylesheet" href="../public/css/profile1.css" />
    <link rel="stylesheet" href="../public/css/profile.css" />
</head>

<body>
    <nav id="desktop-nav">
        <div class="logo">John Doe</div>
    </nav>
    <nav id="hamburger-nav">
        <div class="logo">John Doe</div>
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    <section id="profile">
        <div class="section__pic-container">
            <img src="./assets/profile-pic.png" alt="John Doe profile picture" />
        </div>
        <div class="section__text">
            <p class="section__text__p1">Hello, I'm</p>
            <h1 class="title">John Doe</h1>
            <p class="section__text__p2">Frontend Developer</p>
            <div class="btn-container">

                <button class="btn btn-color-1" onclick="location.href='../templates/settings.php'">
                    Settings
                </button>

            </div>
        </div>
    </section>
    <script src="../public/js/profile.js"></script>
</body>

</html>