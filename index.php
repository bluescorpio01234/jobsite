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
      <li>
        <a href="users.php">
          <i class="bx bx-user"></i>
          <span class="text"> Manage Users</span>
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
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="index.php"><?php ?>Dashboard</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="#">Home</a>
            </li>
          </ul>
        </div>
      </div>

      <ul class="box-info">
        <li>
          <i class="bx bxs-calendar-check"></i>
          <span class="text">
            <h3><span class="text" id="jobCount"></span></h3>
            <p>Total Jobs</p>
          </span>
        </li>
        <li>
          <i class="bx bxs-group"></i>
          <span class="text">
            <h3><span class="text" id="applicants"></span></h3>
            <p>Applicants</p>
          </span>
        </li>
      </ul>

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Recent Jobs</h3>
            <i class="bx bx-search"></i>
            <i class="bx bx-filter"></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="logo.png" />
                  <p>Ram sharma</p>
                </td>
                <td>01-10-2023</td>
                <td><span class="status completed">Completed</span></td>
              </tr>
              <tr>
                <td>
                  <img src="logo.png" />
                  <p>Sita Thapa</p>
                </td>
                <td>20-8-2023</td>
                <td><span class="status pending">Pending</span></td>
              </tr>
              <tr>
                <td>
                  <img src="logo.png" />
                  <p>Shyam Timilsina</p>
                </td>
                <td>23-1-2023</td>
                <td><span class="status process">Process</span></td>
              </tr>
              <tr>
                <td>
                  <img src="logo.png" />
                  <p>Hari Shrestha</p>
                </td>
                <td>05-10-2023</td>
                <td><span class="status pending">Pending</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->

  <script src="script.js"></script>
  <script>
    function updateJobCount() {
      fetch('../company/get-job-count.php') // Replace 'get-job-count.php' with the actual backend API endpoint that retrieves the job count.
        .then(response => response.json())
        .then(data => {
          document.getElementById('jobCount').innerText = data.count;
        })
        .catch(error => console.error('Error fetching job count:', error));
    }

    function updateAppliedJobCount() {
      fetch('get-applied-job-count.php')
        .then(response => response.json())
        .then(data => {
          document.getElementById('appliedJobCount').innerText = data.count;
        })
        .catch(error => console.error('Error fetching applied job count:', error));
    }

    // Call the function to update applied job count when the page loads
    window.onload = function() {
      updateJobCount(); // Update active job count
      updateAppliedJobCount(); // Update applied job count
    };
  </script>
</body>

</html>