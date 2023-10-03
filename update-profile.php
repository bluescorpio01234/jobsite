<?php

include('connection.php');
include('../include/include.php');
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

    mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email', phone = '$update_phone', address = '$update_address' WHERE id = '$user_id'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'old password not matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
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
        :root {
            --blue: #3498db;
            --dark-blue: #2980b9;
            --red: #e74c3c;
            --dark-red: #c0392b;
            --black: #333;
            --white: #fff;
            --light-bg: #eee;
            --box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

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

        .update-profile {
            min-height: 100vh;
            background-color: #f1f6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .update-profile form {
            padding: 20px;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            text-align: center;
            width: 700px;
            text-align: center;
            border-radius: 5px;
        }



        .update-profile form .flex {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }

        .update-profile form .flex .inputBox {
            width: 49%;
        }

        .update-profile form .flex .inputBox span {
            text-align: left;
            display: block;
            margin-top: 15px;
            font-size: 17px;
            color: var(--black);
        }

        .update-profile form .flex .inputBox .box {
            width: 100%;
            border-radius: 5px;
            background-color: var(--light-bg);
            padding: 12px 14px;
            font-size: 17px;
            color: var(--black);
            margin-top: 10px;
        }

        #line {
            position: relative;
            justify-content: center;
            left: 43.5%;
            top: 8rem;
        }

        .btn {
            background-color: var(--blue);
            width: 10rem;
            height: 2rem;
        }

        .btn:hover {
            background-color: var(--dark-blue);
            cursor: pointer;
        }

        .delete-btn {
            background-color: var(--red);
            display: inline-flex;
            color: black;
        }

        .delete-btn:hover {
            background-color: var(--dark-red);
            cursor: pointer;
        }


        @media (max-width:650px) {
            .update-profile form .flex {
                flex-wrap: wrap;
                gap: 10px;
            }

            .update-profile form .flex .inputBox {
                width: 100%;
            }
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

    <h2 id="line"><strong>UPDATE PROFILE</strong></h2>

    <div class="update-profile">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }

        ?>
        <form action="" method="POST">
            <div class="flex">
                <div class="inputBox">
                    <span>Username:</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                    <span>Email :</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                    <span>Phone :</span>
                    <input type="phone" name="update_phone" value="<?php echo $fetch['phone']; ?>" class="box">
                    <span>Address :</span>
                    <input type="address" name="update_address" value="<?php echo $fetch['address']; ?>" class="box">

                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                    <span>old password :</span>
                    <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                    <span>new password :</span>
                    <input type="password" name="new_pass" placeholder="enter new password" class="box">
                    <span>confirm password :</span>
                    <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
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