<?php

if (!isset($_POST['submit'])) {
    header('Location: ../pages/forgotpassword.php');
    exit;
}

require('../configs/db.php');

$accNo = $_POST['accountNumber'];
$new_password = $_POST['newPassword'];
$confirm_password = $_POST['confirmPassword'];

// Validate new password
if (empty($new_password) || strlen($new_password) < 6) {
    header('Location: ../pages/forgotpassword.php?msg=Password must have at least 6 characters');
    exit;
}

// Validate confirm password
if ($new_password != $confirm_password) {
    header('Location: ../pages/forgotpassword.php?msg=Passwords do not match');
    exit;
}

$password = password_hash($new_password, PASSWORD_DEFAULT);

// Update password in credentials table
$sql_updatePass = "UPDATE credentials SET Pass = '$password' WHERE AccNo = '$accNo'";
$result_updatePass = mysqli_query($conn, $sql_updatePass);

// Check if password update was successful
if ($result_updatePass) {
    session_start();
    $_SESSION['success_message'] = 'Password updated successfully.';
    header('Location: ../pages/login.php');
    exit;
} else {
    header('Location: ../pages/forgotpassword.php?msg=Failed to update password. Please try again.');
    exit;
}
