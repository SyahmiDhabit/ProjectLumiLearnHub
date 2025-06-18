<?php
session_start();
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminID = $_POST['adminID'];
    $usrNameAdmin = $_POST['usrNameAdmin'];
    $passAdmin = $_POST['passAdmin'];
    $emlAdmin = $_POST['emlAdmin'];

    $hashedPassword = password_hash($passAdmin, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (adminID, usrNameAdmin, passAdmin, emlAdmin)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $adminID, $usrNameAdmin, $hashedPassword, $emlAdmin);

    if ($stmt->execute()) {
        // Simpan adminID dalam session
        $_SESSION['adminID'] = $adminID;

        // Redirect ke student.php
        header("Location: student.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
