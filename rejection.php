<?php
include("connection.php");

if (isset($_GET['id'])) {
    $companyID = $_GET['id'];

    // Update the company's status to "rejected" in the database
    $query = "UPDATE company SET status = 'rejected' WHERE id = '$companyID'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Successful rejection
        header('location: approve-company.php');
    } else {
        // Error during rejection
        echo "Error rejecting company.";
    }
} else {
    // No company id provided
    echo "Invalid request.";
}

mysqli_close($con);
