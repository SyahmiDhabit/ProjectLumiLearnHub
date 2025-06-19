<?php
session_start();
require('connection.php');

$tutorFullnm = $_POST['tutorFullName'];
$usernameTutor = $_POST['usernameTutor'];
$passwordTutor = $_POST['passwordTutor'];
$tutorAge = $_POST['tutorAge'];
$tutorDob = $_POST['tutorDob'];
$tutorGen = $_POST['tutorGen'];
$tutorNum = $_POST['tutorNum'];
$tutorCoun = $_POST['tutorCountry'];
$emailTutor = $_POST['emailTutor'];
$tutorBio = $_POST['tutorBio']; 

$hashedPasswordtutor = password_hash($passwordTutor, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO tutor (fullName, username, password, age, dob, gender, phoneNumber, country, email, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $tutorFullnm, $usernameTutor, $hashedPasswordtutor, $tutorAge, $tutorDob, $tutorGen, $tutorNum, $tutorCoun, $emailTutor, $tutorBio);

if ($stmt->execute()) {
    echo "New record created successfully";
    echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
