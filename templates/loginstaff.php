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
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <title>Login | Ashesi•Unified</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
  <body>
    <div class="wrapper">
      <form action="../actions/login_staff.php" id="loginForm" name="loginForm" method="post">
        <h1>Login</h1>
        <div class="input-box">
          <input type="email" placeholder="Email" name="email" id="email" required pattern="^[a-zA-Z0-9._%+-]+@(ashesi\.edu\.gh|aucampus\.onmicrosoft\.com)$" title="Please enter a valid Ashesi University email address" autocomplete="email">
          <i class='bx bx-mail-send'></i>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Password" name="password" id="password" required pattern=".{8,}" title="Password must be at least 8 characters long">
          <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">Remember Me</label>
          <a href="#">Forgot Password</a>
        </div>
        <button type="submit" class="btn" id="signin" name="signin">Login</button>

        <div class="register-link">
          <p>Dont have an account? <a href="../templates/selector_page.php">Register</a></p>
        </div>
        <div class="feedback"></div>
        <script>
                document.addEventListener("DOMContentLoaded", function() {
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === "Incorrect password") {
                        echo "swal('Warning', 'Incorrect password', 'warning');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "success") {
                      echo "swal('Success', 'success', 'success');";
                  }
                    if (isset($_GET['msg']) && $_GET['msg'] === "User not registered") {
                        echo "swal('Warning', 'User not registered', 'warning');";
                    }
                    ?>
                    
                });
            </script>
      </form>
    </div>

    <script src="../public/js/login.js"> </script>
  </body>

</html>
