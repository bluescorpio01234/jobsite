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
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-top: 15rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
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
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-building"></i>Company Login</h2>
        <!-- Add the method="post" attribute to the <form> element -->
        <form action="login-company.php" method="post">
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

            <div class="forget">
                <!-- Update the link to point to the registration page (company-register.php) -->
                <span>Don't have an account? <a href="company-register.php">Register Here</a></span>
            </div><br>

            <input type="submit" value="Login" id="confirm" />
            <span id="confirm-error"></span>
        </form>
    </div>
    <script src="val.js"></script>
</body>

</html>