<?php
include("connection.php");


if (isset($_GET['id'])) {
    $companyID = $_GET['id'];


    // Update the company's status to "approved" in the database
    $query = "UPDATE company SET status = 'approved' WHERE id = '$companyID'";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('location: display-company.php');
    }
}
