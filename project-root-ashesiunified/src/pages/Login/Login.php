<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ashesi•Unified</title>
    <link rel="stylesheet" href="../Login/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
  <body>
    <div class="wrapper">
      <form action="../dashboard/dashboard.php" id="loginForm" name="loginForm">
        <h1>Login</h1>
        <div class="input-box">
          <input type="email" placeholder="Email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$" title="Please enter a valid Ashesi University email address">
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
          <p>Dont have an account? <a href="../Register/Register.php">Register</a></p>
        </div>
        <div class="feedback"></div>

      </form>
    </div>

    <script src="../Login/js/login.js"> </script>
  </body>

</html>