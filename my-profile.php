<?php

include('connection.php');

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

        .menu-item:hover {
            background-color: #444;
        }

        /* Adjust content area to accommodate the sidebar */
        .content {
            margin-left: 250px;
            padding: 20px;
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
    <div class="sidebar">
        <nav class="sidenav">

            <br><br>
            <div class="menu">
                <a href="my-info.php
                " class="menu-item">My Info</a>
                <a href="#" class="menu-item">Applied Jobs</a>
                <!-- <a href="#" class="menu-item">Saved Jobs</a> -->
                <a href="logout.php" class="menu-item">Log Out</a>
            </div>
        </nav>
    </div>
</body>

</html>