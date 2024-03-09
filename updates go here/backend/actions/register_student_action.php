<?php
// Include the database connection file
include_once('../../backend/settings/connection.php');
include_once('../../backend/settings/core.php');



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']);
    $phone_number = sanitize_input($_POST['phone_number']);
    $dob = sanitize_input($_POST['dob']);
    $gender = sanitize_input($_POST['gender']);
    $student_id = sanitize_input($_POST['user_id']);
    $program_id = sanitize_input($_POST['program']);
    $year_group = sanitize_input($_POST['year_group']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    // Validate password and confirm password
    if ($password !== $confirm_password) {
        header("Location: ../Register/Registerstudent.php.php?msg=Passwords do not match. Please try again.");
        exit;
    }

        // Check if email is already registered
        $query = "SELECT * FROM Users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            header("Location: ../Register/Registerstudent.php.php?msg=User already registered");
            exit;
        }

        // Check if id is already registered
        $query = "SELECT * FROM Users WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $results = $stmt->get_result();
                    
        if ($results->num_rows > 0) {
                header("Location: ../../pages/Register/Registerstudent.php?msg=User Id already registered");
                exit;
        }

    
    $unique_id = $_SESSION['unique_id'];
    $roleID = 3;
    $statusID = "Active";
    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement to insert user data into the Users table
    $sql = "INSERT INTO Users (user_id,first_name, last_name, phone_number, date_of_birth, email, password, role_id, status)
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssis", $student_id, $first_name, $last_name, $phone_number, $dob, $email, $hashed_password, $roleID, $statusID);
    $stmt->execute();

    // Insert data into Students table
    $sql_student = "INSERT INTO Students (student_id,unique_id,program_id, year_group)
                    VALUES (?, ?,?, ?)";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("iiii", $student_id,$unique_id,$program_id, $year_group);
    $stmt_student->execute();

    $sql_pic = "INSERT INTO userprofileimages (image_id,unique_id,image_path)
    VALUES (?, ?, ?)";
    $stmt_pic = $conn->prepare($sql_pic);
    $stmt_pic->bind_param("iis", $image_id,$unique_id,$image_path);
    $stmt_pic->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0 && $stmt_student->affected_rows > 0 && $stmt_pic->affected_rows > 0) {
        // Registration successful
        header("Location: ../../pages/Login/login.php?msg=Registered Sucessfully");
        exit;
    } else {
        // Registration failed
        header("Location: ../Resgister/Registerstudent.php.php?msg=Failed to register student. Please try again.");
    }

    // Close the statements and connection
    $stmt->close();
    $stmt_student->close();
    $conn->close();
} else {
    // Redirect user back to registration page if form is not submitted
    header("Location: ../Resgister/Registerstudent.php?msg=error");
    exit();
}
function sanitize_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}