<?php

include("../homepage/connection.php");


if (isset($_GET['id'])) {
    $jobId = $_GET['id'];

    // Perform the delete operation
    $query = "DELETE FROM jobs WHERE id = '$jobId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Successful deletion
        // echo "Company deleted successfully.";
        header('location:display-jobs.php');
    } else {
        // Error during deletion
        echo "Error deleting jobs.";
    }
} else {
    // No jobs id provided
    echo "Invalid request.";
}

mysqli_close($con);
