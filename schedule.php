<?php
session_start();
include 'connection.php';

$schedule = $_POST['schedule'];
$subject = $_POST['subject'];
$day = $_POST['day'];
$time = $_POST['timeSlot'];
$tutorID = null; // Optional — depends on future logic


$studentID = $_SESSION['studentID'];

$sql = "INSERT INTO schedule (availableDate, availableTime, tutorID, studentID, subject)
        VALUES ('$day', '$time', '$tutorID', '$studentID', '$subject')";

if ($conn->query($sql) === TRUE) {
  echo "Schedule saved.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
