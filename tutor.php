<?php
session_start();
require('connection.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tutorID = $_POST['tutorID'];
    $tutorFullnm = $_POST['tutorFullName'];
    $tutorAge = $_POST['tutorAge'];
    $tutorGen = $_POST['tutorGen'];
    $tutorDob = $_POST['tutorDob'];
    $tutorNum = $_POST['tutorNum'];
    $tutorCoun = $_POST['tutorCountry'];
    $tutorBio = $_POST['tutorBio'];
     $emailTutor = $_POST['emailTutor'];
    $usernameTutor = $_POST['usernameTutor'];
    $passwordTutor =  $_POST['passwordTutor'];

    $sql = "INSERT INTO tutor (tutorID, tutorFullname, tutorAge, tutorGen, tutorDob, tutorNum, tutorCountry, tutorBio, adminID, usernameTutor, passwordTutor, emailTutor)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssssssss", $tutorID, $tutorFullnm, $tutorAge, $tutorGen, $tutorDob, $tutorNum, $tutorCoun, $tutorBio, $adminID, $usernameTutor, $passwordTutor, $emailTutor);

    if ($stmt->execute()) {
        echo "Tutor berjaya disimpan.";
    } else {
        echo "Ralat: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
