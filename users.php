<?php
session_start();

// Check if the user is logged in and has the correct role (user_role == 1) before allowing access to this page
// Check if the user is logged in and has the correct role (user_role == 1 or user_role == 2) before allowing access to this page
if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || ($_SESSION['role'] != 1)) {
  header('location: ../homepage/register-form.php');
  exit();
}


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
  </style>
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <!-- <a href="#" class="brand">
      <img src="comp.logo.jpg" class="logo" />
    </a> -->
    <ul class="side-menu top">
      <li class="active">
        <a href="index.php">
          <i class="bx bxs-dashboard"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="display-company.php">
          <i class="bx bxs-shopping-bag-alt"></i>
          <span class="text">Company</span>
        </a>
      </li>
      <li>
        <a href="approve-jobs.php">
          <i class="bx bxs-group"></i>
          <span class="text">Jobs</span>
        </a>
      </li>
      <li class="active">
        <a href="users.php">
          <i class="bx bx-user"></i>
          <span class="text">Manage Users</span>
        </a>
      </li>
      <li>
        <a href="approve-company.php">
          <i class="bx bxs-message-dots"></i>
          <span class="text">Approve Company</span>
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
        <a href="../homepage/logout.php" class="logout">
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
          <h1>Manage Users</h1>
          <!-- <ul class="breadcrumb">
            <li>
              <a href="index.php">Manage Users</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="#">Home</a>
            </li>
          </ul> -->
        </div>
        <!-- <div class="right">
          <a href="#" class="btn btn-primary">Add User</a>
        </div> -->
      </div>

      <div class="content">
        <table>
          <thead>
            <tr>

              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <!-- <th>Status</th> -->
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Connect to the database and retrieve user data
            include("connection.php");
            $query = "SELECT * FROM users where role = 0";
            $result = mysqli_query($con, $query);

            // Loop through the data and generate table rows
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              // echo "<td>" . $row['role'] . "</td>";

              echo "<td><a href='delete-users.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
              echo "</tr>";
            }

            // Close the database connection

            ?>
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