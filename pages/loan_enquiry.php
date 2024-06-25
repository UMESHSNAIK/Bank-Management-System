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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application Form - Urban Bank Ltd - 2024</title>
    <link rel="icon" href="../assets/img/Urban-logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
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
    font-weight: bold;
}

input[type="text"],
input[type="password"],
input[type="tel"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="container">
        <h2>Loan Application Form</h2>
        <form action="submit_form.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="loan-type">Loan Type:</label>
                <select id="loan-type" name="loan-type">
                    <option value="home-loan">Home Loan</option>
                    <option value="auto-loan">Vehicle Loan</option>
                    <option value="education-loan">Education Loan</option>
                    <option value="personal-loan">Personal Loan</option>
                    <option value="sme-loan">Gold Loan</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
