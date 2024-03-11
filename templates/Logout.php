<?php
include '../includes/fetch_active_user.php';
include '../config/core.php';
checkLogin()
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../public/css/logout.css" />
    <title>Log Out</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../actions/log_out_user_action.php" class="sign-in-form" method="post">
            <h2 class="title">Log Out</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="<?php echo getUserFullName($_SESSION['user_id']); ?>" readonly/>
            </div>
            <input type="submit" value="Logout" class="btn solid" />
            <p class="social-text">Want to know more ? reach us at our websites</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Mistake ?</h3>
            <p>
            Are you sure you want to log out? Your satisfaction is our priority, and we're here to assist you. If you have any questions or concerns.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Go back
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="../public/js/logout.js"></script>
  </body>
</html>