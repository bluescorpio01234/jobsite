<?php
session_start();
// Include database connection
include('../homepage/connection.php');

// Retrieve company ID from session
$company_id = $_SESSION['company_id'];

// Query to get the count of applied jobs for the current company
$query = "SELECT COUNT(*) AS count
          FROM applied_jobs aj
          JOIN jobs j ON aj.jobs_id = j.id
          WHERE j.company_id = '$company_id'";

// Execute the query and get the result
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Return the count as JSON
echo json_encode($row);
