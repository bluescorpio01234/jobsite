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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>company</title>
    <style>
        .right {
            background-color: #3c91e6;
            color: aliceblue;
        }

        .btn-primary {
            color: azure;
        }

        .right:hover {
            background-color: rgb(2, 2, 29);
        }
    </style>

</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="comp.logo.jpg" class="logo" />
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="company-dashboard.php">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="display-jobs.php">
                    <i class="bx bxs-shopping-bag-alt"></i>
                    <span class="text">Jobs</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="bx bxs-group"></i>
                    <span class="text">Company</span>
                </a>
            </li>

        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="..homepage/logout.php" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="bx bx-menu"></i>

            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num"></span>
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Company</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="add-company.php">Company</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <a href="new-job-form.php
                    " class="btn-primary">Add Job</a>
                </div>
            </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="script.js"></script>
</body>

</html>