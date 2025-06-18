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
    $studID = $_POST['studentID'];
    $studFullnm = $_POST['studentFullName'];
    $studAge = $_POST['studentAge'];
    $studGen = $_POST['studentGen'];
    $studDob = $_POST['studentDob']; // ← ini kena masuk juga dalam SQL
    $studNum = $_POST['studentNum'];
    $studCoun = $_POST['studentCountry'];
    $studBio = $_POST['studentBio'];
    $usernameStudent = $_POST['usernameStudent'];
    $passwordStudent = password_hash($_POST['passwordStudent'], PASSWORD_DEFAULT);
    $emailStudent = $_POST['emailStudent'];

    // Betulkan query: tambah `studentDob`
    $sql = "INSERT INTO student (
        studentID, studentFullname, studentAge, studentGen, studentDob, studentNum, 
        studentCountry, studentBio, adminID, usernameStudent, passwordStudent, emailStudent
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param(
        "ssisssssssss", // 12 parameter
        $studID, $studFullnm, $studAge, $studGen, $studDob, $studNum,
        $studCoun, $studBio, $adminID, $usernameStudent, $passwordStudent, $emailStudent
    );

    if ($stmt->execute()) {
        echo "Pelajar berjaya disimpan.";
    } else {
        echo "Ralat: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
