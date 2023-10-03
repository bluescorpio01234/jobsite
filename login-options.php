<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="login-options.css" />
</head>

<body>
    <div class="container">
        <div class="card jobseeker" onclick="redirectTo('register-form.php')">
            <i class="fas fa-user fa-4x"></i>
            <h2>Login as JobSeeker</h2>
            <button class="btn">Get Started</button>
        </div>
        <div class="card company" onclick="redirectTo('../company/company-login.php')">
            <i class="fas fa-building fa-4x"></i>
            <h2>Login as Company</h2>
            <button class="btn">Get Started</button>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
    <script src="login-options.js"></script>
</body>

</html>