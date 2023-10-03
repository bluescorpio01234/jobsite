<?php
include('connection.php');

// Collecting info
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$role = $_POST['role'];

// Check if the email already exists
$email_check_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$email_check_query = $conn->query($email_check_sql);

if ($email_check_query->num_rows > 0) {
    // Email already exists, show an error message or redirect to a registration error page
    echo "Email address is already registered. Please use a different email.";
} else {
    // Email is unique, proceed with the insertion
    $sql = "INSERT INTO `users`(`name`, `phone`, `email`, `address`, `password`, `cpassword`, `role`) VALUES ('$username','$phone','$email','$address','$password','$cpassword', '$role')";
    
    $query = $conn->query($sql);

    if ($query) {
        header("Location: register-form.php");
    } else {
        echo "Failed to insert data";
    }
}
