<?php
session_start();
require('connection.php');

// Collect admin form data
$adminUser  = $_POST['adminUserName'];
$adminPass  = $_POST['adminpassword'];
$adminEmail = $_POST['adminemail'];

// Hash the password securely
$hashedPassword = password_hash($adminPass, PASSWORD_DEFAULT);

// Use prepared statement to insert data
$stmt = $conn->prepare("INSERT INTO admin (username, password, email) VALUES (?, ?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind the correct variables
$stmt->bind_param("sss", $adminUser, $hashedPassword, $adminEmail);

if ($stmt->execute()) {
    echo "✅ New admin account created successfully.";
    echo "<meta http-equiv='refresh' content='3;URL=login.php'>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
