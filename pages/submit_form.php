<?php
// Include db.php to establish database connection
require_once('../configs/db.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $loanType = $_POST["loan-type"];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO loan_applications (username, password, phone, loan_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $phone, $loanType);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection (Note: $mysqli is included from db.php)
$conn->close();
?>