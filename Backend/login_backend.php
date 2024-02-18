<?php
session_start();
include("");
// must create a database, and then sort out connections

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)){
        echo "All fields are required!";
        exit;
    }
    $query = "SELECT * FROM people WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows ===0){
        header("Location: ...........?msg=Wrong Email"); //...logins location to replace .....
        echo "Incorrect Email";
        exit;
    }
    $user = $result->fetch_assoc();

    if(!password_verify($password, $user['passwd'])){
        header("Location: ...........?msg=Wrong password"); //...logins location to replace .....
        echo "Incorrect password";
        exit;
    }
    $_SESSION['user_id']=$user['pid'];
    
    // Redirect to home page
    header("Location: .......php"); //...homepage location to replace .....

    exit;
} else {
    // Redirect or provide appropriate message if login button wasn't clicked
    header("Location: ......php");//...logins location to replace .....
    exit;
}



  





   






