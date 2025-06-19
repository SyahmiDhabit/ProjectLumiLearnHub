<?php
// Include the database connection file
include "connection.php";

// Check if the form has been submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture data from the HTML form using POST method
    $fname   = $_POST['fname'];
    $uname   = $_POST['uname'];
    $age     = $_POST['age'];
    $dob     = $_POST['dob'];
    $gender  = $_POST['gender'];
    $notel   = $_POST['notel'];
    $country = $_POST['country'];
    $email   = $_POST['email'];
    $bio     = $_POST['bio'];

    // Prepare SQL query to insert data into 'users' table
    $sql = "INSERT INTO users (full_name, username, age, dob, gender, phone, country, email, bio)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if statement was prepared successfully
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssissssss", $fname, $uname, $age, $dob, $gender, $notel, $country, $email, $bio);

    // Execute and check success
    if ($stmt->execute()) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Thank you, <strong>$fname</strong>. Your data has been saved.</p>";
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Form not submitted properly.";
}
?>
