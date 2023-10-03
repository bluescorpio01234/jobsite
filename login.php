<?php
include('connection.php');
session_start();

$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$loginQuery = "SELECT id, role FROM users WHERE email = '$userEmail' AND password = '$userPassword'";

$result = mysqli_query($conn, $loginQuery);

if ($result) {
    $total = mysqli_num_rows($result);

    if ($total > 0) {
        $user = mysqli_fetch_assoc($result);

        // Store the user's email and role in the session
        $_SESSION['email'] = $userEmail;
        $_SESSION['role'] = $user['role']; // Store the role from the database
        $_SESSION['user_id'] = $user['id'];

        if ($user['role'] == 1) {
            header('location: ../dashboard/index.php'); // Admin
        } else if ($user['role'] == 0) {
            header('location: user-index.php'); // User
        }
    } else {
        // Set the login error message in the session
        $_SESSION['login_error'] = "Wrong email or password. Try again!";
        header('location: register-form.php');
    }
} else {
    echo "Database Query error: " . mysqli_error($conn);
}
