<?php
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
    <title>Forgot Password - Unite Trust Bank Ltd - 2024</title>
    <link rel="icon" href="../assets/img/Urban-logo2.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/logres.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body class="body-color body-whole">

    <!-- Top Left Ellipse -->
    <div class="position-absolute start-0 m-0 p-0"></div>

    <div class="container">
        <div class="row">
            <!-- Forgot Password Form Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center" style="height: 100vh;">
                <div class="col-7">
                    <div class="col-md-12 fw-bold mb-5 text-center login-header">Forgot Password</div>
                    <form action="../scripts/reset_password.php" method="POST" id="resetPasswordForm">
                        <div class="mb-2">
                            <label for="accountNumber" class="form-label text-black login-label">Account Number</label>
                            <input type="text" class="form-control rounded-4 textfield" id="accountNumber"
                                name="accountNumber">
                            <small id="error-accountNumber" class="text-danger error-font"></small>
                        </div>
                        <div class="mb-2">
                            <label for="newPassword" class="form-label text-black login-label">New Password</label>
                            <input type="password" class="form-control rounded-4 textfield" id="newPassword"
                                name="newPassword">
                            <small id="error-newPassword" class="text-danger error-font"></small>
                        </div>
                        <div class="mb-2">
                            <label for="confirmPassword" class="form-label text-black login-label">Confirm New Password</label>
                            <input type="password" class="form-control rounded-4 textfield" id="confirmPassword"
                                name="confirmPassword">
                            <small id="error-confirmPassword" class="text-danger error-font">
                                <?php echo $error ?>
                            </small>

                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary rounded-4 mb-4 elevatedButton">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Hidden Logo Section -->
            <div class="col-lg-6 align-items-center justify-content-center pb-5 d-none d-lg-flex"
                style="height: 96vh; background-position: right;">
                <a href="../index.php"><img src="../assets/img/bankk8.png" class="zoom-on-hover" alt="bankk8 Logo"></a>
                <!-- Login Side Block -->
                <div class="login-block"></div>
            </div>
        </div>
    </div>

    <!-- Bottom Left Ellipse -->
    <div class="position-absolute fixed-bottom m-0 p-0"></div>

    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            if (newPassword !== confirmPassword) {
                document.getElementById("error-confirmPassword").textContent = "Passwords do not match";
                event.preventDefault();
            } else {
                document.getElementById("error-confirmPassword").textContent = "";
            }
        });
    </script>
</body>

</html>
