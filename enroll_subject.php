<?php
session_start();
include 'connection.php';

if (!isset($_SESSION["studentID"])) {
    die("Error: User not logged in.");
}

$studentID = $_SESSION["studentID"];
$subjectID = $_POST["subjectID"];
$enrollmentDate = date("Y-m-d H:i:s");

// Validate if student exists
$checkStudent = $conn->query("SELECT studentID FROM student WHERE studentID = '$studentID'");
if ($checkStudent->num_rows == 0) {
    die("<br>Error: Student ID does not exist.");
}

// Insert data into student_subject table
$sql = "INSERT INTO student_subject (studentID, subjectID, enrollmentDate, status) VALUES ('$studentID', '$subjectID', '$enrollmentDate', 'active')";

if ($conn->query($sql) === TRUE) {
    echo "Subject enrolled successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>
