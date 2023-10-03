<?php
include('../homepage/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    $targetDir = "../logos/"; // Specify the folder where CVs will be stored
    $fileName = basename($_FILES["imageUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Check if file is uploaded successfully
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFilePath)) {
        // Retrieve user_id from the session (assuming it's already set during login)
        session_start(); // Start the session
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieve job_id from the form (assuming it's submitted via a hidden field)
            $job_id = $_POST['jobId'];


            // Check if the user has already applied for this job
            $checkSql = "SELECT * FROM applied_jobs WHERE users_id = '$user_id' AND jobs_id = '$job_id'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) == 0) {
                // User has not applied for this job before, so insert the application
                $insertSql = "INSERT INTO applied_jobs (users_id, jobs_id, cv) VALUES ('$user_id', '$job_id', '$targetFilePath')";
                $insertResult = mysqli_query($conn, $insertSql);

                if ($insertResult) {
                    // Application inserted successfully
                    header("location: http://localhost/myjobwebsite/jobs/jobs.php?job_id=" . $job_id);
                } else {
                    echo "Application submission failed.";
                }
            } else {
                // User has already applied for this job
                echo "You have already applied for this job.";
            }
        } else {
            echo "User not authenticated."; // Handle the case where the user is not authenticated
        }
    } else {
        echo "File upload failed.";
    }
}
