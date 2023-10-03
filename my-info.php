<?php

include('connection.php');
include('../include/include.php');
$user_id = $_SESSION['user_id'];
// 


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

        .menu-item:after {
            background-color: #444;
        }

        /* Adjust content area to accommodate the sidebar */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .container {
            min-height: 10vh;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            width: 20rem;
            left: 20rem;
            top: 14rem;


        }

        .container .profile {
            padding: 20px;
            background-color: white;
            text-align: center;
            width: 300px;
            border-radius: 5px;
        }
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
                <a href="my-info.php
                " class="menu-item">My Info</a>
                <a href="my-applied-jobs.php" class="menu-item">Applied Jobs</a>
                <!-- <a href="#" class="menu-item">Saved Jobs</a> -->
                <a href="logout.php" class="menu-item">Log Out</a>
            </div>
        </nav>
    </div>

    <div class="container">

        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }

            ?>
            <h3><?php echo $fetch['name']; ?></h3>
            <a href="update-profile.php" class="update-profile">Update Profile</a>




        </div>
    </div>

</body>

</html>