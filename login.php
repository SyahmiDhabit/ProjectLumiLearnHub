<?php
session_start();
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emailTutor = $_POST['emailTutor'] ?? '';
    $passwordTutor = $_POST['passwordTutor'] ?? '';

    if (empty($emailTutor) || empty($passwordTutor)) {
        echo "<p style='color:red;'>Please enter both email and password.</p>";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM tutor WHERE email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $emailTutor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // ✅ Use correct column name from your database
        if (password_verify($passwordTutor, $user['password'])) {
            $_SESSION['tutorID'] = $user['tutorID'];
            $_SESSION['tutorFullName'] = $user['fullName'];
            header("Location: tutorinterface.php");
            exit();
        } else {
            echo "<p style='color:red;'>Incorrect password.</p>";
            echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
        }

    } else {
        echo "<p style='color:red;'>Email not found.</p>";
        echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
    }

    $stmt->close();
}
$conn->close();
?>
