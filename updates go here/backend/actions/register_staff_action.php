<?php
// Include the database connection file
include_once('../../backend/settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $phone_number = sanitize_input($_POST['phone_number']);
    $dob = sanitize_input($_POST['dob']);
    $gender = sanitize_input($_POST['gender']);
    $staff_id = sanitize_input($_POST['user_id']);
    $department_id = sanitize_input($_POST['department_id']);
    $position_id = sanitize_input($_POST['position_id']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    // Validate password and confirm password
    if ($password !== $confirm_password) {
        header("Location: ../../pages/Register/Registerstaff.php.php?msg=Passwords do not match. Please try again.");
        exit;
    }

        // Check if email is already registered
        $query = "SELECT * FROM Users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            header("Location: ../../pages/Register/Registerstaff.php?msg=User already registered");
            exit;
        }

        // Check if email is already registered
        $query = "SELECT * FROM Users WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $staff_id);
        $stmt->execute();
        $results = $stmt->get_result();
            
        if ($results->num_rows > 0) {
             header("Location: ../../pages/Register/Registerstaff.php?msg=User Id already registered");
             exit;
        }



    $roleID = 3;
    $statusID = 1;
    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement to insert user data into the Users table
    $sql = "INSERT INTO Users (user_id,first_name, last_name, phone_number, date_of_birth, email, password, role_id, status_id)
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssii", $staff_id, $first_name, $last_name, $phone_number, $dob, $email, $hashed_password, $roleID, $statusID);
    $stmt->execute();


    // Insert data into Students table
    $sql_student = "INSERT INTO Staff (user_id,department_id, position_id)
                    VALUES (?, ?, ?)";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("iii", $staff_id,$department_id, $position_id);
    $stmt_student->execute();


    $sql_pic = "INSERT INTO userprofileimages (image_id,user_id,image_path)
    VALUES (?, ?, ?)";
    $stmt_pic = $conn->prepare($sql_pic);
    $stmt_pic->bind_param("iis", $image_id,$staff_id,$image_path);
    $stmt_pic->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0 && $stmt_student->affected_rows > 0 &&  $stmt_pic->affected_rows > 0) {
        // Registration successful
        header("Location: ../../pages/Login/login.php?msg=Registered Sucessfully");
        exit;
    } else {
        // Registration failed
        header("Location: ../../pages/Register/Registerstaff.php.php?msg=Failed to register student. Please try again.");
    }

    // Close the statements and connection
    $stmt->close();
    $stmt_student->close();
    $conn->close();
} else {
    // Redirect user back to registration page if form is not submitted
    header("Location: ../../pages/Register/Registerstaff.php?msg=error");
    exit();
}
function sanitize_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}