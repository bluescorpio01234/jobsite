<?php
include("connection.php");

if (isset($_GET['id'])) {
    $companyId = $_GET['id'];

    // Perform the delete operation
    $query = "DELETE FROM company WHERE id = '$companyId'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Successful deletion
        // echo "Company deleted successfully.";
        header('location:display-company.php');
    } else {
        // Error during deletion
        echo "Error deleting company.";
    }
} else {
    // No company id provided
    echo "Invalid request.";
}

mysqli_close($con);
