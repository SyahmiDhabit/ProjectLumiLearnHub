<?php
$servername = "localhost";
$username = "lumiLearn";
$password = "1234";
$database = "student_lumilearn";
$port = 3306;

// ✅ Correct order: host, user, password, database, port
$conn = new mysqli($servername, $username, $password, $database, $port);

// ✅ Error check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
