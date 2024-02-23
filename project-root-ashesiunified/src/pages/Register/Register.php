<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ashesi•Unified</title>
    <link rel="stylesheet" href="../Register/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="../dashboard/dashboard.php" method="post" id="registerForm" name="registerForm">
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

            <div class="input-box1" id="roleDetails">
                <label for="student_role">Role:</label><br>
                <input type="radio" id="student_role" name="role" value="student" required onclick="toggleDetails()">
                <label for="student_role">Student</label>
                <input type="radio" id="staff_role" name="role" value="staff" required onclick="toggleDetails()">
                <label for="staff_role">Staff</label>
                <i class='bx bx-star'></i>
            </div>
            

            <div class="input-box2" id="studentDetails" style="display: none;">
                <div class="input-box2">
                    <input type="number" placeholder="Student ID" name="student_id" id="student_id">
                </div>
                <div class="input-box2">
                <input type="text" placeholder="Course/Program" name="course" id="course">
            </div>
            <div class="input-box2">
                <input type="number" placeholder="Year Group" name="year_group" id="year_group" min="2010" max="2030" step="1">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$" title="Please enter a valid Ashesi University email address">
                <i class='bx bx-mail-send'></i>
            </div>
            </div>

            <div class="input-box2" id="staffDetails" style="display: none;">
                <div class="input-box2">
                <input type="text" placeholder="Department" name="department" id="department">
                <i class='bx bx-group'></i>
            </div>
            <div class="input-box2">
                <input type="text" placeholder="Position" name="position" id="position">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" id="email" required pattern="[a-zA-Z0-9._%+-]+@aucampus\.onmicrosoft\.com$" title="Please enter a valid email address ending with @aucampus.onmicrosoft.com">
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

            
            <button type="submit" class="btn" id="register" name="register">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="../Login/Login.php">Login</a></p>
            </div>
            <div class="feedback"></div>
        </form>
    </div>
</body>
<script src="../Register/js/register.js"></script>
</html>
