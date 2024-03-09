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
    <link rel="stylesheet" href="../Department/css/department.css">

	<title>Ashesi Unified</title>
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
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Departments</span>
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
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../Chat/chat.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="../Calender/calendar.php">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Calender</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../Settings/settings.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
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



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../dashboard/images/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Departments:  <?php echo getUserFullName($_SESSION['user_id']); ?></h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Departments</a>
						</li>
					</ul>
				</div>
			</div>
            <?php include '../../backend/functions/fetch_department.php';?>
		</main>
	</section>
	

	<script src="../dashboard/js/script.js"></script>
</body>
</html>