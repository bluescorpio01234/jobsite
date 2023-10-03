<?php
session_start();

$user_id = $_SESSION['user_id']; // Assuming you have stored the user's ID in the session
include("../homepage/connection.php");

$query = "SELECT j.title AS job_title, j.company_id, c.name AS company_name, aj.applied_date, c.email AS company_email
FROM applied_jobs AS aj
JOIN jobs AS j ON aj.jobs_id = j.id
JOIN company AS c ON j.company_id = c.id
WHERE aj.users_id = {$user_id};";

$result = mysqli_query($conn, $query);

$appliedJobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
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
    .sidebar {
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        background-color: #2c78fe;
        padding-top: 20px;
        color: #fff;
    }

    .menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-top: 20px;
    }

    .menu-item {
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .menu-item:hover {
        background-color: #444;
    }

    /* Adjust content area to accommodate the sidebar */
    .content {
        margin-left: 250px;
        padding: 20px;
    }

    table {}
</style>
</head>

<body>

    <header>
        <nav class="navbar">
            <a href="user-index.php" class="logo">JobSpace.</a>


            <div class="signin-signup">
                <div class="join">

                    <a href="logout.php" class="sign-up">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="sidebar">
        <nav class="sidenav">

            <br><br>
            <div class="menu">

                <a href="user-index.php
                " class="menu-item">Home</a>
                <a href="my-info.php
                " class="menu-item">My Info</a>
                <a href="#" class="menu-item">Applied Jobs</a>
                <!-- <a href="#" class="menu-item">Saved Jobs</a> -->

            </div>
        </nav>
    </div>
    <div class="content">
        <table cellspacing="10px" border="2px solid blue" cellpadding="5px">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Company Email</th>
                    <th>Applied Date</th>

                    <!-- You can add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appliedJobs as $job) : ?>
                    <tr>
                        <td><?php echo $job['job_title']; ?></td>
                        <td><?php echo $job['company_name']; ?></td>
                        <td><?php echo $job['company_email']; ?></td>
                        <td><?php echo $job['applied_date']; ?></td>

                        <!-- You can add more columns as needed -->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Your JavaScript and other scripts here -->
</body>

</html>