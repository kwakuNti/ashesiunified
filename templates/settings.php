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
	<link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/settings.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<title>Settings</title>
</head>
<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../assets/images/logo-mobile.png" alt="logo>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">

			<li>
				<a href="../templates/dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-user-account' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				
				<a href="../templates/department.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Departments</span>
				</a>
			</li>
			
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			
			<li>
				<a href="../templates/calendar.php">
                <i class='bx bxs-calendar-check' ></i>
					<span class="text">Calender</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
		<li class="active">
				<a href="../templates/settings.php">
                <i class='bx bxs-cog' ></i>
				<span class="text">Settings</span>
				</a>
			</li>
			
			<li>
            <a href="../templates/Logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
    <section  id="content">
    <main>
			<div class="head-title">
				<div class="left">
					<h1>Settings:  <?php echo getUserFullName($_SESSION['user_id']); ?></h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Settings</a>
						</li>
					</ul>
				</div>
			</div>
    </section>
    <div class="update-profile">
   <form action="../actions/update_password_action.php" method="post" enctype="multipart/form-data">
   <img src="<?php echo getUserProfileImage($_SESSION['user_id']); ?>" alt="profile-picture">
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="first_name" value="<?php echo getUserFullName($_SESSION['user_id']); ?>" class="box" readonly>
            <span>your email :</span>
            <input type="email" name="email" value="<?php echo getUserEmail($_SESSION['user_id']); ?>"class="box" readonly>
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
      <a href="../templates/dashboard.php" class="delete-btn">go back</a>
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