
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!"/>
    <meta name="keywords" content="calendar, events, reminders, javascript, html, css, open source coding"/>
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../public/css/calendar.css">

	<title>Ashesi Unified</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../assets/images/logo-mobile.png" alt="logo>
			<span class="text"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../template/dashboard.php">
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
				<a href="../Chat/chat.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">Calendar</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
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


    <section id="content">
		<!-- NAVBAR -->
		<!-- <nav>
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
		</nav> -->
		<!-- NAVBAR -->



        <div class="container">
            <div class="left">
                <div class="calendar">
                <div class="month">
                    <p class="fas fa-angle-left prev"></p>
                    <div class="date">december 2015</div>
                    <p class="fas fa-angle-right next"></p>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days"></div>
                <div class="goto-today">
                    <div class="goto">
                    <input type="text" placeholder="mm/yyyy" class="date-input" />
                    <button class="goto-btn">Go</button>
                    </div>
                    <button class="today-btn">Today</button>
                </div>
                </div>
            </div>
            <div class="right">
                <div class="today-date">
                <div class="event-day">wed</div>
                <div class="event-date">12th december 2022</div>
                </div>
                <div class="events"></div>
                <div class="add-event-wrapper">
                <div class="add-event-header">
                    <div class="title">Add Event</div>
                    <i class="fas fa-times close"></i>
                </div>
                <div class="add-event-body">
                    <div class="add-event-input">
                    <input type="text" placeholder="Event Name" class="event-name" />
                    </div>
                    <div class="add-event-input">
                    <input
                        type="text"
                        placeholder="Event Start Time"
                        class="event-time-from"
                    />
                    </div>
                    <div class="add-event-input">
                    <input
                        type="text"
                        placeholder="Event End   Time"
                        class="event-time-to"
                    />
                    </div>
                </div>
                <div class="add-event-footer">
                    <button class="add-event-btn">Add Event</button>
                </div>
                </div>
            </div>
            <button class="add-event">
                <i class="fas fa-plus"></i>
            </button>
        </div>


    </section>

    <section>
        



    </section>
    <div class="calender">
    </div>
    <script src="../dashboard/js/calendar.js" ></script>

</body>
</html>