<?php
// Check if user is logged in
session_start();
if (isset($_SESSION['AccNo'])) {
    header('Location: ../pages/dashboard/index.php');
    exit;
}

// Check if there is a GET message
$error = '';
if (isset($_GET['msg'])) {
    $error = $_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Urban Bank Ltd - 2024</title>
    <link rel="icon" href="../assets/img/Urban-logo2.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/logres.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .button {
            background-color: #030303; /* Green */
            border: ;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 150vh;
        }

        /* Additional styles for form elements */
        .login-form {
            max-width: 400px; /* Adjust as needed */
            padding: 50px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="body-color body-whole" background="../assets/img/bg7.jpg">
    <div class="container">
            <!-- Login Form Section -->
            <div class="col-lg-6">
                <div class="login-container">
                    <div class="login-form" >
                        <div class="text-center mb-5 d-block d-lg-none"></div>
                        <div class="col-md-12 fw-bold mb-5 text-center login-header">Welcome to Urban Bank Ltd</div>
                        <form action="../scripts/login_auth.php" method="POST">
                            <div class="mb-2">
                                <label for="accountNumber" class="form-label text-black login-label">Account Number</label>
                                <input type="text" class="form-control rounded-4 textfield" id="accountNumber"
                                    name="accountNumber">
                                <small id="error-accountNumber" class="text-danger error-font"></small>
                            </div>
                            <div class="mb-5 password-field">
                                <label for="password" class="form-label text-black login-label">Password</label>
                                <input type="password" class="form-control rounded-4 textfield" id="password"
                                    name="password">
                                <img src="../assets/img/eye-open.png" class="password-icon" id="eye-login">
                                <small id="error-password" class="mt-1 text-danger error-font">
                                    <?php echo $error ?>
                                </small>
                            </div>
                            <p class="mt-4 login-label text-center"><a href="forgotpassword.php"
                                    class="no-underline">Forgot Password</a></p>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary rounded-4 mb-4 elevatedButton">Login</button>
                            </div>
                        </form>
                        <p class="mt-4 login-label text-center">Don't have an account? <a href="register.php"
                                class="no-underline">Register</a></p>
                        <a href="home.php"><button class='button'>Back to Homepage</button></a>
                        <!-- Social Icons -->
                    </div>
                </div>
            </div>
    </div>

    <!-- Bottom Left Ellipse -->
    <div class="position-absolute fixed-bottom m-0 p-0"></div>

    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
