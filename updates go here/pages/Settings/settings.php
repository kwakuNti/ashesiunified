<?php 
include '../../backend/settings/core.php';
include '../../backend/functions/fetch_active_user.php';
checkLogin()
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../dashboard/css/style.css">
    <link rel="stylesheet" href="../Settings/css/settings.css">
<title>Settings</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../dashboard/images/logo-mobile.png" alt="logo>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">
            <li class="active">
				<a href="#">
                <i class='bx bxs-cog' ></i>
				<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#">
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
				<a href="#">
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
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
                <i class='bx bxs-calendar-check' ></i>
					<span class="text">Calender</span>
				</a>
			</li>
			<li>
            <a href="../Logout/Logout.php" class="logout">
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
   <form action="../../backend/actions/update_password_action.php" method="post" enctype="multipart/form-data">

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
      <a href="home.php" class="delete-btn">go back</a>
   </form>
    </div>

</body>