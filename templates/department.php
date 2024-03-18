<?php 
include '../config/core.php';
include '../includes/fetch_active_user.php';
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
    <link rel="stylesheet" href="../public/css/department.css">

    <title>Ashesi Unified</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../assets/images/logo-mobile.png" alt="logo>
			<span class=" text"></span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="../templates/studentDashboard.php">
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
            <li class="active">
                <a href="#">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Departments</span>
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
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
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
                <img src="../dashboard/images/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Departments: <?php echo getUserFullName($_SESSION['user_id']); ?></h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Departments</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php include '../includes/fetch_department.php';?>
        </main>
    </section>
    <script>
    $(document).ready(function() {
        $('#searchInput').keyup(function() {
            let searchTerm = $(this).val();
            if (searchTerm.length > 0) {
                autocomplete(searchTerm);
            } else {
                $('#searchResults').empty();
            }
        });
    });

    function autocomplete(term) {
        $.ajax({
            url: '../actions/dashsearch.php',
            type: 'GET',
            dataType: 'json',
            data: {
                term: term
            },
            success: function(response) {
                displayResults(response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function displayResults(data) {
        let departments = data.departments;
        let users = data.users;
        let events = data.events;
        let resultsList = $('#searchResults');
        resultsList.empty();
        if (departments.length > 0 || users.length > 0 || events.length > 0) {
            departments.forEach(function(department) {
                resultsList.append(
                    `<li data-type="department" data-id="${department.department_id}">${department.department_name}</li>`
                );
            });
            users.forEach(function(user) {
                resultsList.append(`<li data-type="user" data-id="${user.user_id}">${user.first_name}</li>`);
            });
            events.forEach(function(event) {
                resultsList.append(
                    `<li data-type="event" data-id="${event.event_id}">${event.event_title}</li>`);
            });
            resultsList.show();
        } else {
            resultsList.hide();
        }

        // Handle click event on search results
        resultsList.on('click', 'li', function() {
            let type = $(this).data('type');
            let id = $(this).data('id');
            if (type === 'department') {
                // Check if staff is logged in
                if (checkStaffLoggedIn()) {
                    // Display error message for staff
                    swal("Error", "Sorry, this is a student feature", "error");
                } else {
                    // Redirect to department page
                    window.location.href = `../templates/department.php?id=${id}`;
                }
            } else if (type === 'user') {
                // Display error using SweetAlert
                swal("Error", "Sorry, this is an admin feature", "error");
            } else if (type === 'event') {
                // Redirect to event page
                window.location.href = `../templates/event.php?id=${id}`;
            }
        });
    }

    function checkStaffLoggedIn() {
        // Check if the user's role_id is 2 (indicating staff)
        return <?php echo isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2 ? 'true' : 'false'; ?>;
    }
    </script>


    <script src="../public/js/dashboard.js"></script>
</body>

</html>