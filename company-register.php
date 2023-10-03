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

        #email-error,
        #name-error,
        #phone-error,
        #pan-error,
        #password-error,
        #cpassword-error {
            color: red;
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
        <h2><i class="fas fa-building"></i> Company Registration</h2>
        <form action="company-insert.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name"><i class="fas fa-building"></i> Name:</label>
                <input type="text" name="name" id="name" required />
                <span id="name-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="pan"><i class="fas fa-home"></i> Pan :</label>
                <input type="text" name="pan" id="pan" required />
                <span id="pan-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="address"><i class="fas fa-map-marker-alt"></i> Address:</label>
                <input type="text" name="address" required />
                <span id="address-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" name="email" id="email" required />
                <span id="email-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-key"></i> Password:</label>
                <input type="password" name="password" id="password" required />
                <span id="password-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="cpassword"><i class="fas fa-key"></i> Confirm Password:</label>
                <input type="password" name="cpassword" id="cpassword" required />
                <span id="cpassword-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="phone"><i class="fas fa-phone"></i> Phone:</label>
                <input type="text" name="phone" id="phone" required />
                <span id="phone-error" class="error"></span>
            </div>

            <div class="form-group">
                <label for="logo"><i class="fas fa-image"></i> Logo:</label>
                <input type="file" name="logo" id="logo" accept="image/*" required />

            </div>

            <div class="forget">
                <span>Already have an account? <a href="company-login.php">Login Here</a></span>
            </div><br>

            <input type="submit" value="Register" id="confirm" />
            <span id="confirm-error" class="error"></span>
        </form>
    </div>
    <!-- <script src="validate.js"></script> -->
    <script>
        let confirm = document.getElementById('confirm');
        console.log(confirm);
        const nameError = document.getElementById('name-error');
        const nameInput = document.getElementById('name');
        let error = false;

        nameInput.addEventListener('input', () => {
            const nameRegex = /^[a-zA-Z\s][a-zA-Z0-9\s]{4,}$/;
            if (!nameRegex.test(nameInput.value)) {
                nameError.textContent = 'Please enter a valid name';
                error = true;
            } else {
                error = false;
                nameError.textContent = '';
            }
        });

        const panInput = document.getElementById('pan');
        const panError = document.getElementById('pan-error');


        panInput.addEventListener('input', () => {
            const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            if (!panRegex.test(panInput.value)) {
                panError.textContent = 'Please enter a valid PAN number';
                error = true;
            } else {
                error = false;
                panError.textContent = '';
            }
        });

        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');

        emailInput.addEventListener('input', () => {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address';
                error = true;
            } else {
                error = false;
                emailError.textContent = '';
            }
        });

        const passwordInput = document.getElementById('password');
        const passwordError = document.getElementById('password-error');

        passwordInput.addEventListener('input', () => {
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
            if (!passwordRegex.test(passwordInput.value)) {
                passwordError.textContent = 'Please enter a valid password';
                error = true;
            } else {
                error = false;
                passwordError.textContent = '';
            }
        });

        const cpasswordInput = document.getElementById('cpassword');
        const cpasswordError = document.getElementById('cpassword-error');

        cpasswordInput.addEventListener('input', () => {
            const passwordInputValue = passwordInput.value;
            const cpasswordInputValue = cpasswordInput.value;
            if (passwordInputValue !== cpasswordInputValue) {
                cpasswordError.textContent = 'Passwords do not match';
                error = true;
            } else {
                error = false;
                cpasswordError.textContent = '';
            }
        });


        const phoneInput = document.getElementById('phone');
        const phoneError = document.getElementById('phone-error');

        phoneInput.addEventListener('input', () => {
            const phoneRegex = /^9[0-9]{9}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                phoneError.textContent = 'Please enter a valid phone number';
                error = true;
            } else {
                error = false;
                phoneError.textContent = '';
            }
        });

        confirm.addEventListener('click', (e) => {
            console.log(error);
            if (error) {
                e.preventDefault();
            }
        })
        // const addressInput = document.getElementById('address');
        // const addressError = document.getElementById('address-error');

        // addressInput.addEventListener('input', () => {
        //     const addressRegex = /^[a-zA-Z0-9\s,'-]*$/;
        //     if (!addressRegex.test(addressInput.value)) {
        //         addressError.textContent = 'Please enter a valid address';
        //         error = true;
        //     } else {
        //         addressError.textContent = '';
        //     }
        // });
    </script>
</body>

</html>