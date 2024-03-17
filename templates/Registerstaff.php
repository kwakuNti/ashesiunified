<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ashesi•Unified</title>
    <link rel="stylesheet" href="../public/css/register.css">
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

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <form action="../actions/register_staff_action.php" method="post" id="registerForm" name="registerForm">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" name="first_name" required id="first_name">
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Last Name" name="last_name" required id="last_name">
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="tel" placeholder="Phone Number" name="phone_number" required id="phone_number">
                <i class='bx bx-phone'></i>
            </div>

            <div class="input-box">
                <input type="date" placeholder="Date of Birth" name="dob" required id="dob">
            </div>

            <div class="input-box1">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box2" id="staffDetails">
                <div class="input-box2">
                <?php include '../includes/department_fxn.php'?>
            </div>
            <div class="input-box2">
            <?php include '../includes/position_fxn.php'; ?>
            </div>
            <div class="input-box2">
                    <input type="number" placeholder="Staff ID" name="user_id" id="staff_id">
                </div>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email:@aucampus.onmicrosoft.com" required pattern="^[a-zA-Z0-9._%+-]+@aucampus\.onmicrosoft\.com$" title="Please enter a valid email address ending with @aucampus.onmicrosoft.com">
                <i class='bx bx-mail-send'></i>
            </div>
            
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required pattern=".{8,}" title="Password must be at least 8 characters long">
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required pattern=".{8,}" title="Password must be at least 8 characters long">
                <i class='bx bxs-lock-alt'></i>
            </div>

            
            <button type="submit" class="btn" name="register">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="../templates/Login.php">Login</a></p>
            </div>
            <div class="feedback">
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === "Failed to register staff. Please try again") {
                        echo "swal('Error', 'Failed to register student. Please try again', 'error');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "Registered Successfully") {
                        echo "swal('Success', 'Registered Successfully', 'success');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "User already registered") {
                        echo "swal('Warning', 'User already registered', 'warning');";
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === "User Id already registered") {
                        echo "swal('Warning', 'User Id already registered', 'warning');";
                    }
                    ?>
                });
            </script>
            </div>
        </form>
    </div>
    <script src="../public/js/registerstaff.js"></script>
</body>
</html>
