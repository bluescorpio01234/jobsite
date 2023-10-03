<?php
session_start();
// Check if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirect to the login page or any other appropriate page
    header("Location: company-login.php");
    exit();
}

include("../homepage/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Job</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
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
    <div class="container">
        <h2><i class="fas fa-briefcase"></i> Add Job</h2>
        <form action="new-job.php" method="post">
            <div class="form-group">
                <label for="title"><i class="fas fa-heading"></i> Title:</label>
                <input type="text" name="title" id="title" required />
                <span id="title-error"></span>
            </div>

            <div class="form-group">
                <label for="posted_date"><i class="fas fa-calendar"></i> Posted Date:</label>
                <input type="date" name="posted_date" id="posted_date" required />
                <span id="posted_date-error"></span>
            </div>

            <div class="form-group">
                <label for="deadline"><i class="fas fa-clock"></i> Deadline:</label>
                <input type="datetime-local" name="deadline" id="deadline" required />
                <span id="deadline-error"></span>
            </div>

            <div class="form-group">
                <label for="details"><i class="fas fa-info-circle"></i> Details:</label>
                <textarea name="details" id="details" rows="4" required></textarea>

                <script>
                    CKEDITOR.replace('details');
                </script>
                <span id="details-error"></span>
            </div>

            <div class="form-group">
                <label for="points"><i class="fas fa-clock"></i> Required Skills:</label>
                <textarea name="points" rows="5" cols="40" required></textarea>
                <span id="points-error"></span>
            </div>

            <div class="form-group">
                <label for="skills"><i class="fas fa-clock"></i> Education + Experience:</label>
                <textarea name="skills" rows="5" cols="40" required></textarea>
                <span id="skills-error"></span>
            </div>



            <div class="form-group">
                <label for="location"><i class="fas fa-map-marker-alt"></i> Location:</label>
                <input type="text" name="location" id="location" required />
                <span id="location-error"></span>
            </div>

            <div class="form-group">
                <label for="salary"><i class="fas fa-dollar-sign"></i> Salary:</label>
                <input type="number" name="salary" id="salary" required />
                <span id="salary-error"></span>
            </div>

            <div class="form-group">
                <label for="type"><i class="fas fa-tags"></i> Type:</label>
                <select name="type" id="type" required>
                    <option value="">Select Job Type
                    <option value="1">IT</option>
                    </option>
                </select>




            </div>
            <div class="form-group">
                <label for="no_of_vacancy"><i class="fas fa-tags"></i> Number of Vacancy:</label>
                <input type="number" name="no_of_vacancy" id="">
            </div>

            <div class="form-group">
                <label for="available_for"><i class="fas fa-tags"></i> Available for:</label>
                <select name="available_for" id="available_for" required>

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
                <select name="job_level" id="job_level" required>

                    <option value="senior_level" selected>Senior Level
                    </option>
                    <option value="mid_level">Mid Level</option>

                    <option value="junior_level">Junior Level
                    </option>

                    <option value="intern_level">Intern</option>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" value="Add Job" id="confirm" />
                <span id="confirm-error"></span>
            </div>




        </form>
    </div>
</body>

</html>