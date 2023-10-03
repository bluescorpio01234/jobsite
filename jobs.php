<?php
include("../homepage/connection.php");
include('../include/include.php');

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $query = "SELECT j.*, c.name AS company_name, c.logo AS company_logo, j.points AS job_points, j.skills AS job_skills FROM jobs j
JOIN company c ON j.company_id = c.id
WHERE j.id = $job_id";

    $result = mysqli_query($conn, $query);

    $job = mysqli_fetch_assoc($result);
    $points = $job['job_points'];
    $skills = $job['job_skills'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobSpace</title>
    <link rel="stylesheet" href="details-style.css">
    <link rel="stylesheet" href="bac.css">
    <link rel="stylesheet" href="style.css">
    <style>
        #imageUpload {
            position: absolute;

        }

        .apply-form {
            background-color: aliceblue;
            width: 250px;
            height: 600px;
            margin-left: 30px;
            margin-top: 30px;
        }

        .apply-bn {
            background-color: blue;
            height: 30px;
            width: 5rem;
            margin-bottom: 10px;
        }

        .apply-bn:hover {
            background-color: blueviolet;
        }

        .message {
            width: 100%;
            position: relative;
            margin-bottom: 60px;
            display: flex;
            justify-content: center;

        }

        .message .success {
            font-size: 20px;
            color: green;
            position: absolute;
            animation: buttons .3s linear;
            display: none;
        }

        .message .danger {
            font-size: 20px;
            color: red;
            position: absolute;
            animation: buttons .3s linear;
            display: none;
        }

        footer {
            position: relative;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgb(205, 220, 234);
            height: auto;
            width: 100vw;
            font-family: "open sans";
            padding-top: 40px;
            color: rgb(236, 241, 246);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .footer-content h3 {
            font-size: 1.8rem;
            font-weight: 400;
            text-transform: capitalize;
            line-height: 3rem;
        }

        .footer-content p {
            max-width: 500px;
            margin: 10px auto;
            line-height: 28px;
            font-size: 1px;
        }

        .socials {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0 3rem 0;
        }

        .socials li {
            margin: 0 10px;
        }

        .socials a {
            text-decoration: none;
            color: rgb(4, 27, 47);
        }

        .socials a i {
            font-size: 1.1rem;
            transition: color 0.4s ease;
        }

        .socials a:hover i {
            color: aqua;
        }

        .footer-bottom {
            background-color: rgb(176, 196, 213);
            width: 100vw;
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            font-size: 14px;
            word-spacing: 2px;
            text-transform: capitalize;
        }

        .footer-bottom span {
            text-transform: uppercase;
            opacity: 0.4;
            font-weight: 200;
        }

        @keyframes buttons {
            0% {
                transform: scale(0.1);
            }

            50% {
                transform: scale(0.5);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Header Start -->
        <nav class="navbar">
            <a href="../homepage/user-index.php" class="logo">JobSpace.</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="../homepage/user-index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">View Jobs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
            </ul>

            <div class="signin-signup">
                <div class="join">
                    <a href="../homepage/my-info.php" class="sign-in">My Profile</a>
                    <a href="../homepage/logout.php" class="sign-up">Log Out</a>
                </div>

                <div id="menu-icon" class="fa-solid fa-bars"></div>
            </div>
        </nav>
        <!-- Header End -->
    </header>
    <?php if ($job) { ?>
        <div class="container">


            <div class="container-1">
                <div class="logo">
                    <img src="../logos/<?php echo $job['company_logo']; ?>" alt="" />
                </div>
                <div class="info">
                    <h3><?php echo $job['title']; ?></h3>
                    <br />

                    <span><?php echo $job['company_name']; ?></span>
                    <span><i class="fas fa-map-marker-alt"></i> <?php echo $job['location']; ?></span>
                    <span><?php echo $job['salary']; ?></span>
                </div>
                <div class="details">
                    <h3>Job Description</h3>
                    <br />
                    <p>
                        <?php echo $job['details']; ?>
                    </p>
                </div>
                <div class="skills">
                    <h3>Required Knowledge</h3>
                    <br />
                    <?php
                    $lines = explode("\n", $points);

                    // Display the points as an unordered list
                    echo "<ul>";
                    foreach ($lines as $line) {
                        // Trim whitespace from the line
                        $line = trim($line);
                        if (!empty($line)) {
                            // Wrap the line in an <li> tag
                            echo "<li>$line</li>";
                        }
                    }
                    echo "</ul>";
                    ?>
                    <div class="skills">
                        <h3>Education + Experience</h3>
                        <br />
                        <?php
                        $lines = explode("\n", $skills);

                        // Display the points as an unordered list
                        echo "<ul>";
                        foreach ($lines as $line) {
                            // Trim whitespace from the line
                            $line = trim($line);
                            if (!empty($line)) {
                                // Wrap the line in an <li> tag
                                echo "<li>$line</li>";
                            }
                        }
                        echo "</ul>";
                        ?>

                    </div>

                </div>
                <div class="container-2">
                    <div class="job-info">
                        <h3>Job Overview</h3>
                        <br /> <br />



                        <li>Posted date : <span class="ov" style="margin-left: 3rem;"><?php echo $job['posted_date']; ?></span></li>
                        <li>Location : <span class="ov" style="margin-left: 4.8rem;"><?php echo $job['location']; ?></span></li>
                        <li>Vacancy : <span class="ov" style="margin-left: 4.7rem;"><?php echo $job['no_of_vacancy']; ?></span></li>
                        <li>Job nature : <span class="ov" style="margin-left: 3.8rem;"><?php echo $job['available_for']; ?></span></li>
                        <li>Salary : <span class="ov" style="margin-left: 6.1rem;"><?php echo $job['salary']; ?></span></li>
                        <li>Application date : <span class="ov" style="margin-left: 1rem;"><?php echo $job['deadline']; ?></span></li>


                        <form action="apply-job.php" method="POST" enctype="multipart/form-data" class="apply-form">
                            <label for="imageUpload"><strong>Upload CV: </strong></label><br> <br>
                            <input type="file" id="imageUpload" name="imageUpload" /><br><br>
                            <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="userId" />

                            <input type="hidden" value="<?php echo $job_id; ?>" name="jobId" />
                            <button type="submit" id="apply-now" onclick="message()">Apply Now</button>

                            <div class="message">
                                <div class="success" id="success">
                                    Successfully Applied!
                                </div>
                                <div class="danger" id="danger" name="danger">
                                    Can't be Empty!
                                </div>
                            </div>

                    </div>

                </div>
            </div>

        </div>
    <?php }
    ?>
    <footer>
        <div class="footer-content">
            <h3>JOBSPACE</h3>
            <p style="width: 20px;">yes</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; 2023 All Rights Reserved<span>&nbsp; Arbeen & Shisham</span></p>
        </div>
    </footer>

    <script>
        function message() {
            // e.preventDefault();
            var cv = document.getElementById('imageUpload');
            const success = document.getElementById('success');
            const danger = document.getElementById('danger');

            if (cv == "") {
                danger.style.display = 'block';
            } else {
                success.style.display = 'block';
            }
        }
    </script>

</body>

</html>