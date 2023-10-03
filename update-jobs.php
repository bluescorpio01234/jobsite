<?php
session_start();
// Check if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirect to the login page or any other appropriate page
    header("Location: company-login.php");
    exit();
}
include('../homepage/connection.php');


if (isset($_POST['update_job'])) {

    $job_id = mysqli_real_escape_string($conn, $_POST['job_id']);


    $update_title = mysqli_real_escape_string($conn, $_POST['update_title']);
    $update_posted_date = mysqli_real_escape_string($conn, $_POST['update_posted_date']);
    $update_deadline = mysqli_real_escape_string($conn, $_POST['update_deadline']);
    $update_location = mysqli_real_escape_string($conn, $_POST['update_location']);
    $update_salary = mysqli_real_escape_string($conn, $_POST['update_salary']);
    $update_details = mysqli_real_escape_string($conn, $_POST['update_details']);
    $update_points = mysqli_real_escape_string($conn, $_POST['update_points']);
    $update_skills = mysqli_real_escape_string($conn, $_POST['update_skills']);
    $update_no_of_vacancy = mysqli_real_escape_string($conn, $_POST['update_no_of_vacancy']);
    $update_available_for = mysqli_real_escape_string($conn, $_POST['update_available_for']);
    $update_job_level = mysqli_real_escape_string($conn, $_POST['update_job_level']);

    $query = mysqli_query($conn, "UPDATE `jobs` SET title = '$update_title', posted_date = '$update_posted_date', deadline = '$update_deadline', details = '$update_details', points = '$update_points', skills = '$update_skills', location = '$update_location', salary = '$update_salary', no_of_vacancy = '$update_no_of_vacancy', job_level = '$update_job_level', available_for = '$update_available_for' WHERE id = '$job_id'") or die('query failed');

    if ($query) {
        echo "Updated Successfully";
    } else {
        echo "Failed";
    }

    if (mysqli_num_rows($query) > 0) {
        $fetch = mysqli_fetch_assoc($query);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="headstyle.css" />
    <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
    <style>
        /* Basic styling for the sidebar and menu items */
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

        body {
            background-color: #ffffff;
            color: #3c91e6;
            font-family: "Poppins", sans-serif;
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #3c91e6;
            color: whitesmoke;
            font-weight: bold;
            cursor: pointer;

        }

        input[type="submit"]:hover {
            background-color: rgb(23, 64, 126);
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar">
            <a href="#" class="logo">JobSpace.</a>


            <div class="signin-signup">
                <div class="join">

                    <a href="logout.php" class="sign-up">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- <div class="sidebar">
        <nav class="sidenav">

            <br><br>
            <div class="menu">
                <a href="my-info.php
                " class="menu-item">My Info</a>
                <a href="#" class="menu-item">Applied Jobs</a>
                <a href="#" class="menu-item">Saved Jobs</a>
                <a href="logout.php" class="menu-item">Log Out</a>
            </div>
        </nav>
    </div>
 -->

    <h2 id="line"><strong>UPDATE Job</strong></h2>

    <div class="update-profile">
        <?php
        $fetch = null; // Initialize $fetch to null
        if (isset($_POST['job_id'])) {
            $job_id = mysqli_real_escape_string($conn, $_POST['job_id']);
            $select = mysqli_query($conn, "SELECT * FROM jobs WHERE id = '$job_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
        }
        ?>
        <form action="update-jobs.php" method="POST">
            <div class="flex">
                <div class="inputBox">
                    <span>Title:</span>
                    <input type="text" name="update_title" value="<?php echo isset($fetch['title']) ? $fetch['title'] : ''; ?>" class="box">

                    <span>Posted Date :</span>
                    <input type="posted_date" name="update_posted_date" value="<?php echo isset($fetch['posted_date']) ? $fetch['posted_date'] : ''; ?>" class="box"><br>
                    <span>deadline :</span>
                    <input type="deadline" name="update_deadline" value="<?php echo isset($fetch['deadline']) ? $fetch['deadline'] : ''; ?>" class="box"><br>
                    <span>location :</span>
                    <input type="location" name="update_location" value="<?php echo isset($fetch['location']) ? $fetch['location'] : ''; ?>" class="box">

                </div>


                <div class="form-group">
                    <label for="details"><i class="fas fa-info-circle"></i> Details:</label>
                    <textarea name="details" id="details" rows="4" value="<?php echo $fetch['password']; ?>" required></textarea>

                    <span id="details-error"></span>
                </div>
                <div class="form-group">
                    <label for="points"><i class="fas fa-clock"></i> Required Skills:</label>
                    <textarea name="points" rows="5" cols="40" value="<?php echo $fetch['points']; ?>" required></textarea>
                    <span id="points-error"></span>
                </div>

                <div class="form-group">
                    <label for="skills"><i class="fas fa-clock"></i> Education+Experience:</label>
                    <textarea name="skills" rows="5" cols="40" value="<?php echo $fetch['skills']; ?>" required></textarea>
                    <span id="skills-error"></span>
                </div>

                <div class="form-group">
                    <label for="salary"><i class="fas fa-dollar-sign"></i> Salary:</label>
                    <input type="number" name="salary" id="salary" value="<?php echo $fetch['salary']; ?>" required />
                    <span id="salary-error"></span>
                </div>

                <div class="form-group">
                    <label for="no_of_vacancy"><i class="fas fa-tags"></i> Number of Vacancy:</label>
                    <input type="number" name="no_of_vacancy" id="" value="<?php echo $fetch['no_of_vacancy']; ?>">
                </div>



                <label for="available_for"><i class="fas fa-tags"></i> Available for:</label>
                <select name="available_for" id="available_for" value="<?php echo $fetch['available_for']; ?>" required>

                    <option value="full_time" selected>Full Time
                    </option>
                    <option value="freelance">Freelance</option>

                    <option value="part_time">Part Time
                    </option>
                    <option value="internship">Internship</option>
                </select>

            </div>

            <div class="form-group">
                <label for="job_level"><i class="fas fa-tags"></i> Job Level:</label>
                <select name="job_level" id="job_level" value="<?php echo $fetch['job_level']; ?>" required>

                    <option value="senior_level" selected>Senior Level
                    </option>
                    <option value="mid_level">Mid Level</option>

                    <option value="junior_level">Junior Level
                    </option>

                    <option value="intern_level">Intern</option>
                </select>

            </div>

            <input type="hidden" name="job_id" value="<?php echo $fetch['id']; ?>">


    </div>
    </div>
    <input type="submit" value="update profile" name="update_profile" class="btn">
    <a href="my-info.php" class="delete-btn">go back</a>
    </form>

    </div>
    </div>
    </form>




    </div>
    </div>

</body>

</html>