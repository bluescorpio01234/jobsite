<?php
include("connection.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Perform the delete operation
    $query = "DELETE FROM users WHERE id = '$userId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Successful deletion
        // echo "Company deleted successfully.";
        header('location:users.php');
    } else {
        // Error during deletion
        echo "Error deleting user.";
    }
} else {
    // No company id provided
    echo "Invalid request.";
}

mysqli_close($con);
