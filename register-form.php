<?php
session_start();

// Check if there's a login error message stored in the session
if (isset($_SESSION['login_error'])) {
  $loginError = $_SESSION['login_error'];
  // Clear the error message from the session
  unset($_SESSION['login_error']);
} else {
  $loginError = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in & Sign up Form</title>
  <style>
    .error {
      color: red;
      position: relative;
      top: -1400%;
      left: 18%;
    }
  </style>
  <link rel="stylesheet" href="register-style.css" />
  <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
</head>

<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">

          <?php if ($loginError !== "") : ?>
            <p class="error"><?php echo $loginError; ?></p>
          <?php endif; ?>

          <!-- Login Section Starts -->
          <form action="login.php" autocomplete="off" class="sign-in-form" method="POST">
            <div class="logo">
              <img src="./img/logo.png" alt="" />
              <h4>JobSpace.</h4>
            </div>

            <div class="heading">
              <h2>Welcome</h2>
              <h6>Not registred yet?</h6>
              <a href="#" class="toggle">Sign up</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="email" minlength="4" class="input-field" name="email" autocomplete="off" required />
                <label>Email</label>
              </div>

              <div class="input-wrap">
                <input type="password" minlength="4" class="input-field" name="password" autocomplete="off" required />
                <label>Password</label>
              </div>


              <input type="submit" value="Sign In" class="sign-btn" />

              <p class="text">
                Forgotten your password or you login datails?
                <a href="#">Get help</a> signing in
              </p>
            </div>
          </form>
          <!-- Login Section Ends -->


          <!-- Sign Up section Starts -->

          <form autocomplete="off" class="sign-up-form" action="register.php" method="POST">
            <!-- <div class="logo">
                <img src="./img/logo.png" alt="" />
                <h4>JobSpace.</h4>
              </div> -->

            <div class="heading">
              <h2></h2>
              <h6>Already have an account?</h6>
              <a href="#" class="toggle">Sign in</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="text" minlength="4" class="input-field" autocomplete="off" name="username" id="contact-name" onkeyup="validateName()" />
                <label>Username</label>
                <span id="name-error"></span>
              </div>

              <div class="input-wrap">
                <input type="email" class="input-field" autocomplete="off" name="email" id="contact-email" onkeyup="validateEmail()" required />
                <label>Email</label>
                <span id="email-error"></span>
              </div>

              <div class="input-wrap">
                <input type="password" class="input-field" autocomplete="off" name="password" id="contact-password" onkeyup="validatePassword()" required />
                <label>Password</label>
                <span id="password-error"></span>
              </div>

              <div class="input-wrap">
                <input type="password" class="input-field" autocomplete="off" name="cpassword" id="contact-cpassword" onkeyup="validateCPassword()" required />
                <label>Confirm Password</label>
                <span id="confirm-error"></span>
              </div>

              <div class="input-wrap">
                <input type="tel" class="input-field" autocomplete="off" name="phone" id="contact-phone" onkeyup="validatePhone()" required />
                <label>Phone</label>
                <span id="phone-error"></span>
              </div>

              <div class="input-wrap">
                <input type="text" class="input-field" autocomplete="off" name="address" id="contact-address" onkeyup="validateAddress()" required />
                <label>Address</label>
                <span id="address-error"></span>
              </div>

              <div class="role-select">
                <select name="role" id="role" class="role" required>
                  <option value="0">User</option>

                </select>
              </div>

              <input type="submit" value="Sign Up" class="sign-btn" onclick="openPopup()" />
              <span id="submit-error" style="display: none"></span>
            </div>
          </form>
          <!-- Sign Up Section Ends -->
        </div>


        <div class="carousel">
          <div class="images-wrapper">
            <img src="../assets/img/image1.png" class="image img-1 show" alt="" />
            <img src="../assets/img/image2.png" class="image img-2" alt="" />
            <img src="../assets/img/image3.png" class="image img-3" alt="" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Welcome to JobSpace</h2>
                <h2>Hope you are doing well</h2>
                <h2>Invite your friends</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->

  <script src="register.js"></script>
  <script src="errors.js"></script>
</body>

</html>