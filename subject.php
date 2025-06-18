<?php
require('connection.php');

$subjectID = $_POST['subjectID'];
$subjectName = $_POST['subjectName'];
$description =$_POST['description'];

$sql = "INSERT INTO subject (subjectID, subjectName, description)
        VALUES ('$subjectID', '$subjectName', '$description')";

if ($conn->query($sql) === TRUE){
    echo "New subject created successfully";
    echo "<meta http-equiv='refresh' content='3, URL=index.php'>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>