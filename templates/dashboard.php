<?php
include '../config/core.php';
include '../config/connection.php';
include '../includes/fetch_active_user.php';
include '../actions/update_profile.php';
include '../includes/getallevents.php';
include '../includes/getallfeedback.php';
include '../includes/announce.php';

$feedbacks = fetchFeedback($conn);
$upcomingEventsCount = countUpcomingEvents($conn);
checkLogin()
?>
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
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Ashesi Unified</title>
</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../assets/images/logo-mobile.png" alt="logo>
			<span class=" text"></span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../templates/profile.php">
                    <i class='bx bxs-user-account'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="../templates/chat.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>

            <li>
                <a href="../templates/calendar.php">
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">Calender</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../templates/settings.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="../templates/Logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form id="searchForm" action="#" class="search-form">
                <div class="form-input">
                    <input type="text" id="searchInput" placeholder="Search..." autocomplete="off">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
                <div class="result-box">
                    <ul id="searchResults" class="search-results"></ul>
                </div>
            </form>

            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="<?php echo getUserProfileImage($_SESSION['user_id']); ?>" alt="profile-picture">
            </a>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard: <?php echo getUserFullName($_SESSION['user_id']); ?></h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3><?php echo $upcomingEventsCount; ?></h3>
                        <p>Upcoming Events</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3><?php echo $announcementCount; ?></h3>
                        <p>Announcements</p>
                    </span>
                </li>

                <li>
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">
                        <h3>0</h3>
                        <p>Discussions</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Student Feedback</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name of Student</th>
                                <th>Feedback</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($feedbacks as $feedback): ?>
                            <tr>
                                <td style="width: 20%">
                                    <p><?php echo $feedback['user_name']; ?></p>
                                </td>
                                <td style="width: 60%">
                                    <p><?php echo $feedback['feedback_content']; ?></p>
                                </td>
                                <td style="width: 20%">
                                    <p><?php echo $feedback['feedback_date']; ?></p>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </section>

    <script src='../public/js/search.js'></script>
    <script src="../public/js/dashboard.js"></script>
</body>

</html>