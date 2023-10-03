<?php
session_start();
// Check if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirect to the login page or any other appropriate page
    header("Location: company-login.php");
    exit();
}

include("../homepage/connection.php");

// Function to validate and sanitize input
function validateInput($input)
{
    // Implement your validation and sanitization logic here
    include('../homepage/connection.php');
    return mysqli_real_escape_string($conn, trim($input)); // Example: trim and escape
}

// Retrieve form data and validate/sanitize
$title = validateInput($_POST['title']);
$posted_date = validateInput($_POST['posted_date']);
$deadline = validateInput($_POST['deadline']);
$details = validateInput($_POST['details']);
$points = validateInput($_POST["points"]);
$skills = validateInput($_POST["skills"]);
$location = validateInput($_POST['location']);
$salary = validateInput($_POST['salary']);
$type = validateInput($_POST['type']);
$no_of_vacancy = validateInput($_POST['no_of_vacancy']);
$job_level = validateInput($_POST['job_level']);
$available_for = validateInput($_POST['available_for']);

// Retrieve company ID from session
$company_id = $_SESSION['company_id'];


// Query
$sql = "INSERT INTO jobs (title, posted_date, deadline, details, points, skills, location, salary, type_id, no_of_vacancy, available_for, job_level, company_id) 
        VALUES ('$title', '$posted_date', '$deadline', '$details', '$points', '$skills', '$location', '$salary', '$type', '$no_of_vacancy', '$available_for', '$job_level', '$company_id')";


$stmt = mysqli_prepare($conn, $sql);


if (mysqli_stmt_execute($stmt)) {
    header('location: display-jobs.php');
} else {
    echo "Error adding job: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
