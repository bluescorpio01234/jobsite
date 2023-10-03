<?php
session_start();
// echo $_SESSION['user_id'];
//if(isset($_SESSION['user_id'])){



// }else{
//   echo "<script> location.href='login.php'; </script>";

// }






// session_start();//alerady in header.php
if (isset($_SESSION['user_id'])) {


    // echo "<script> alert('value is set: $use') </script>";

} else {
    echo "<script> location.href='register-form.php'; </script>";
}
