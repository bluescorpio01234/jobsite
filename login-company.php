uiopqewruioqerwrweqp<?php
                    include('../homepage/connection.php');
                    session_start();

                    $companyEmail = $_POST['email'];
                    $companyPassword = $_POST['password'];

                    $loginQuery = "SELECT * FROM company WHERE email = '$companyEmail' AND password = '$companyPassword'";

                    $result = mysqli_query($conn, $loginQuery);

                    $total = mysqli_num_rows($result);

                    if ($total > 0) {
                        $companyData = mysqli_fetch_assoc($result);
                        $companyID = $companyData['id'];

                        // Use the company ID to retrieve the status of the company's registration request
                        $statusQuery = "SELECT status FROM company WHERE id = '$companyID'";
                        $statusResult = mysqli_query($conn, $statusQuery);
                        $statusData = mysqli_fetch_assoc($statusResult);
                        $status = $statusData['status'];

                        if ($status == "approved") {
                            // Store the company's email and ID in the session (you can store any other relevant info as well)
                            $_SESSION['company_id'] = $companyID;
                            $_SESSION['company_email'] = $companyEmail;

                            // Redirect to the company dashboard after successful login
                            header('location:company-dashboard.php');
                            exit();
                        } else {
                            // Set the login error message in the session
                            $_SESSION['login_error'] = "Your company's registration request is still pending or has been rejected by the admin.";
                            header('location: company-login.php');
                            exit();
                        }
                    } else {
                        // Set the login error message in the session
                        $_SESSION['login_error'] = "Invalid email or password.";
                        header('location: company-login.php');
                        exit();
                    }

                    mysqli_close($conn);
