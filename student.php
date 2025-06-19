<?php
session_start();
require('connection.php');

// Collect student form data
$studentFullnm     = $_POST['studentFullName'];
$usernameStudent   = $_POST['usernamestudent'];
$passwordStudent   = $_POST['passwordstudent'];
$studentAge        = $_POST['studentAge'];
$studentDob        = $_POST['studentDob'];
$studentGen        = $_POST['studentGen'];
$studentNum        = $_POST['studentNum'];
$studentCoun       = $_POST['studentCountry'];
$emailStudent      = $_POST['emailstudent'];
$studentBio        = $_POST['studentBio'];

// Hash the password correctly
$hashedPasswordStudent = password_hash($passwordStudent, PASSWORD_DEFAULT);

// Use the correct variable names and table
$stmt = $conn->prepare("INSERT INTO student (fullName, username, password, age, dob, gender, phoneNumber, country, email, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssssss", 
    $studentFullnm, 
    $usernameStudent, 
    $hashedPasswordStudent, 
    $studentAge, 
    $studentDob, 
    $studentGen, 
    $studentNum, 
    $studentCoun, 
    $emailStudent, 
    $studentBio
);

if ($stmt->execute()) {
    echo "New record created successfully";
    echo "<meta http-equiv='refresh' content='3;URL=login.php'>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
