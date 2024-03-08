<?php
include '../../backend/functions/fetch_active_user.php';
include '../../backend/settings/core.php';
checkLogin()
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../Logout/css/logout.css" />
    <title>Log Out</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../../backend/actions/log_out_user_action.php" class="sign-in-form" method="post">
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
  </body>
</html>