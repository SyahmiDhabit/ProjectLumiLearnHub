<?php
session_start();
require('connection.php');

// Semak jika adminID ada dalam session
if (!isset($_SESSION['adminID'])) {
    echo "Akses tidak dibenarkan. Sila daftar sebagai admin dahulu.";
    exit;
}

$adminID = $_SESSION['adminID']; // Ambil dari session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tutorID = $_POST['tutorID'];
    $tutorFullnm = $_POST['tutorFullName'];
    $tutorAge = $_POST['tutorAge'];
    $tutorGen = $_POST['tutorGen'];
    $tutorDob = $_POST['tutorDob'];
    $tutorNum = $_POST['tutorNum'];
    $tutorCoun = $_POST['tutorCountry'];
    $tutorBio = $_POST['tutorBio'];
    $usernameTutor = $_POST['usernameTutor'];
    $passwordTutor = password_hash($_POST['passwordTutor'], PASSWORD_DEFAULT);
    $emailTutor = $_POST['emailTutor'];

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
