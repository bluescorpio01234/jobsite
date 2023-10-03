<?php
session_start();
include("../homepage/connection.php");

$name = $_POST['name'];
$pan = $_POST['pan'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$phone = $_POST['phone'];

// Upload logo file
$logoName = $_FILES['logo']['name'];
$logoTmpName = $_FILES['logo']['tmp_name'];

// Specify the directory to save the uploaded logo
$logoDirectory = "../logos/";
$logoPath = $logoDirectory . $logoName;

if (move_uploaded_file($logoTmpName, $logoPath)) {
    if ($password == $cpassword) {
        $status = "pending"; // Set the default status to "pending"
        $insertQuery = "INSERT INTO company (name, pan, address, email, password, cpassword, phone, logo, status) VALUES ('$name', '$pan','$address', '$email',  '$password', '$cpassword', '$phone', '$logoPath', '$status')";

        if (mysqli_query($conn, $insertQuery)) {
            // Redirect to the company dashboard page after successful registration
            header("Location: company-login.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Password Do not Match";
?>
        <a href="company-register.php">Try Again</a>
<?php
    }
} else {
    echo "Error uploading logo";
}
mysqli_close($conn);

?>