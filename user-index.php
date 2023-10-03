<?php
// Assuming you have already established a database connection
// Include connection.php or any other file that establishes the database connection
include('connection.php');

include('../include/include.php');




// Fetch jobs with company information using JOIN
$query = "SELECT j.*, c.name AS company_name, c.logo AS company_logo FROM jobs j
          JOIN company c ON j.company_id = c.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>JobSpace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="headstyle.css" />
    <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
    <style>
        /* Add your existing CSS styles here */

        .job-details-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .job-details {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .job-details img {
            max-width: 100px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .job-details h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .details {
            margin-top: 20px;
        }

        .details p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .details strong {
            font-weight: bold;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .job-details {
                padding: 10px;
            }

            .job-details img {
                max-width: 80px;
                margin-bottom: 10px;
            }

            .job-details h2 {
                font-size: 20px;
            }

            .details p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">JobSpace.</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
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
                    <a href="my-info.php" class="sign-in">My Profile</a>
                    <a href="logout.php" class="sign-up">Log Out</a>
                </div>

                <div id="menu-icon" class="fa-solid fa-bars"></div>
            </div>
        </nav>
        <!-- Banner -->
        <div class="banner">
            <div class="banner-text">
                <p>
                    Any Industry, Any Loction, Any Experience
                    <i class="fa-solid fa-briefcase"></i>
                </p>
                <h2>Hey! Searching for a Job?</h2>
                <p>
                    Then you are in a good place. JobSpace here is waiting for talents
                    like you to get hired.
                </p>
                <div class="search-box">
                    <i class="fa-brands fa-searchengin"></i>
                    <input type="search" name="search-box" id="-search-box" placeholder="Search your dream job" />
                    <button class="btn">Search</button>
                </div>

                <div class="candidate">
                    <div class="box box-1">
                        <img src="../images/4.png" alt="" />
                    </div>
                    <div class="box box-2">
                        <img src="../images/1.png" alt="" />
                    </div>
                    <div class="box box-3">
                        <img src="../images/2.png" alt="" />
                    </div>
                    <div class="box box-4">
                        <img src="../images/3.png" alt="" />
                    </div>
                    <div class="box box5">
                        <p>200+</p>
                    </div>
                </div>
            </div>
            <div class="banner-img">
                <img src="../images/banner1.png" alt="banner" />
            </div>
        </div>

        <div class="categories">
            <div class="categorie-text">
                <h4>High Demand Categories Featured</h4>
            </div>
            <div class="categorie">
                <div class="categorie-box">
                    <p class="fa-solid fa-microchip fa-fade"></p>
                    <p>AI Engineer</p>
                </div>
                <div class="categorie-box">
                    <p class="fa-solid fa-code fa-fade"></p>
                    <p>Web Development</p>
                </div>
                <div class="categorie-box">
                    <p class="fa-solid fa-chart-line fa-fade"></p>
                    <p>Marketing</p>
                </div>
                <div class="categorie-box">
                    <p class="fa-solid fa-gamepad fa-fade"></p>
                    <p>Game Developer</p>
                </div>
            </div>
        </div>
    </header>

    <div class="jobs-list-container">
        <h2>Jobs</h2>
        <input class="job-search" type="text" placeholder="Search here..." />

        <div class="jobs">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 3 == 0) {
                        echo '<div class="row">';
                    }
                    echo '<div class="job">';
                    echo '<img src="../logos/' . $row['company_logo'] . '" alt="' . $row['company_name'] . '">';
                    echo '<h3 class="job-title">' . $row['title'] . '</h3>';
                    echo '<div class="details"><i class="fas fa-map-marker-alt"> </i>    ' . $row['location'] . '</div>';
                    echo '<a class="details-btn" href="../jobs/jobs.php?job_id=' . $row['id'] . '">More Details</a>';

                    echo '<span class="open-positions">No of Vacancy: '  . $row['no_of_vacancy'] . '</span>';
                    echo '</div>';
                    if ($count % 3 == 2 || $count == mysqli_num_rows($result) - 1) {
                        echo '</div>';
                    }
                    $count++;
                }
            }
            ?>
        </div>
    </div>

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


    <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>


</body>

</html>