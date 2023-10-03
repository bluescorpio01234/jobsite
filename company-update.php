<?php
session_start();
// Check if the user is not logged in with a valid session
if (!isset($_SESSION['company_id'])) {
    // Redirect to the login page or any other appropriate page
    header("Location: company-login.php");
    exit();
}

include("../homepage/connection.php");

// Check if the company_id key is set in the session
// if (!isset($_SESSION["company_id"])) {
//     // Redirect the user to the company login page or any other appropriate action
//     header("Location: company-login.php");
//     exit();
// }

// Get the company ID from the session
$company_id = $_SESSION["company_id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated information from the form
    $name = $_POST['name'];
    $pan = $_POST['pan'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    // Check if the company wants to update the logo
    if (!empty($_FILES['logo']['name'])) {
        // Upload logo file
        $logoName = $_FILES['logo']['name'];
        $logoTmpName = $_FILES['logo']['tmp_name'];

        // Specify the directory to save the uploaded logo
        $logoDirectory = "../logos/";
        $logoPath = $logoDirectory . $logoName;

        if (move_uploaded_file($logoTmpName, $logoPath)) {
            // Update company information with the new logo path
            $updateQuery = "UPDATE company SET name='$name', pan='$pan', address='$address', email='$email', password='$password', cpassword='$cpassword', phone='$phone', logo='$logoPath' WHERE id='$company_id'";
        } else {
            echo "Error uploading logo";
        }
    } else {
        // Update company information without changing the logo
        $updateQuery = "UPDATE company SET name='$name', pan='$pan', address='$address', email='$email', password='$password', cpassword='$cpassword', phone='$phone' WHERE id='$company_id'";
    }

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect to the company dashboard page after successful update
        header("Location: company-dashboard.php");
        exit();
    } else {
        echo "Error updating company information: " . mysqli_error($conn);
    }
}

// Retrieve the company information from the database using the company ID
$selectQuery = "SELECT * FROM company WHERE id='$company_id'";
$result = mysqli_query($conn, $selectQuery);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the company information from the database
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Company not found";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Company Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

        body {
            background-color: #ffffff;
            color: #3c91e6;
            font-family: "Poppins", sans-serif;
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            height: 105vh;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group label {
            /* Additional style to adjust label width for horizontal form */
            width: 47%;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #3c91e6;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(23, 64, 126);
        }




        @media (max-width: 600px) {

            /* Additional styles for mobile devices */
            .form-group {
                flex-direction: column;
            }

            .form-group label {
                /* Reset label width for mobile devices */
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-building"></i> Company Update</h2>
        <form action="company-update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name"><i class="fas fa-building"></i> Name:</label>
                <input type="text" name="name" id="name" required />
                <span id="name-error"></span>
            </div>

            <div class="form-group">
                <label for="pan"><i class="fas fa-home"></i> Pan :</label>
                <input type="text" name="pan" id="pan" required />
                <span id="pan-error"></span>
            </div>

            <div class="form-group">
                <label for="address"><i class="fas fa-map-marker-alt"></i> Address:</label>
                <input type="text" name="address" required />
                <span id="address-error"></span>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" name="email" id="email" required />
                <span id="email-error"></span>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-key"></i> Password:</label>
                <input type="password" name="password" id="password" required />
                <span id="password-error"></span>
            </div>

            <div class="form-group">
                <label for="cpassword"><i class="fas fa-key"></i> Confirm Password:</label>
                <input type="password" name="cpassword" id="cpassword" required />
                <span id="cpassword-error"></span>
            </div>

            <div class="form-group">
                <label for="phone"><i class="fas fa-phone"></i> Phone:</label>
                <input type="text" name="phone" id="phone" required />
                <span id="phone-error"></span>
            </div>

            <div class="form-group">
                <label for="logo"><i class="fas fa-image"></i> Logo:</label>
                <input type="file" name="logo" id="logo" accept="image/*" required />

            </div>

            <div class="forget">
                <span>Already have an account? <a href="company-login.php">Login Here</a></span>
            </div><br>

            <input type="submit" value="Register" id="confirm" />
            <span id="confirm-error"></span>
        </form>
    </div>
    <script src="val.js"></script>
</body>

</html>