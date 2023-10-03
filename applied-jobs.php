<?php
session_start();

// Instead of 15, Session shpuld be passed in order to get respective company's details.
$company_id = $_SESSION['company_id'];
include("../homepage/connection.php");
$query = "SELECT u.name as users_name, j.title as jobs_title, aj.applied_date as applied_jobs_date, aj.cv as applied_jobs_cv, u.email as users_email
FROM applied_jobs AS aj
JOIN users AS u ON aj.users_id = u.id
JOIN jobs AS j ON aj.jobs_id = j.id
JOIN company AS c ON j.company_id = c.id WHERE company_id = {$company_id}
;";
$result = mysqli_query($conn, $query);

$jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($jobs);
// print_r($jobs);
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
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            padding-bottom: 12px;
            font-size: 13px;
            text-align: left;
            border-bottom: 1px solid var(--grey);
        }

        table td {
            padding: 16px 0;
        }

        table tr td:first-child {
            display: flex;
            align-items: center;
            grid-gap: 12px;
            padding-left: 6px;
        }

        table td img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        table tbody tr:hover {
            background: var(--grey);
        }

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
            <img src="../logos/4.png" class="logo" />
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
                    <span class="text">Posted Jobs</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-group"></i>
                    <span class="text">Applied Jobs</span>
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
                <a href="logout.php" class="logout">
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
                    <h1>Jobs</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="display-jobs.php">Jobs</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>

            </div>
            <br>

            <div class="content">


                <table>
                    <thead>
                        <tr>

                            <th>Job Seeker</th>
                            <th>Job title</th>
                            <th>Email</th>
                            <th>Applied Date</th>
                            <th>CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jobs as $job) : ?>
                            <tr>


                                <td><?php echo $job['users_name']; ?></td>
                                <td><?php echo $job['users_email']; ?></td>
                                <td><?php echo $job['jobs_title']; ?></td>
                                <td><?php echo $job['applied_jobs_date']; ?></td>
                                <td>
                                    <!-- Add a download link for the CV -->
                                    <a href="<?php echo $job['applied_jobs_cv']; ?>" download>Download CV</a>
                                </td>

                            </tr>
                        <?php endforeach ?>




                    </tbody>
                </table>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="script.js"></script>
</body>

</html>