<?php
// Include your database connection
include '../config/core.php';
include '../includes/fetch_active_user.php';
include '../includes/getallevents.php';

// Function to search for departments
function searchDepartments($conn, $term) {
    $termWildcard = '%' . $term . '%';
    $sql = "SELECT * FROM departments WHERE department_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $termWildcard);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to search for users
function searchUsers($conn, $term) {
    $termWildcard = '%' . $term . '%';
    $sql = "SELECT * FROM users WHERE first_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $termWildcard);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to search for upcoming events
function searchEvents($conn, $term) {
    $termWildcard = '%' . $term . '%';
    $sql = "SELECT * FROM events WHERE event_title LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $termWildcard);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Main search function
function search($conn, $term) {
    $results = array();
    // Search departments
    $departments = searchDepartments($conn, $term);
    $results['departments'] = $departments;
    // Search users
    $users = searchUsers($conn, $term);
    $results['users'] = $users;
    // Search events
    $events = searchEvents($conn, $term);
    $results['events'] = $events;
    return $results;
}

// Check if search term is provided
if (isset($_GET['term'])) {
    $term = $_GET['term'];
    // Perform search
    $searchResults = search($conn, $term);
    // Return results as JSON
    header('Content-Type: application/json');
    echo json_encode($searchResults);
} else {
    // No search term provided
    echo json_encode(array('error' => 'No search term provided'));
}