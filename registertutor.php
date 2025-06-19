<?php
// Include the database connection file
include "connection.php";

// Check if the form has been submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture form data sent via POST
    $fname = $_POST['fname'];       // Full Name
    $uname = $_POST['uname'];       // Username
    $age   = $_POST['age'];         // Age
    $dob   = $_POST['dob'];         // Date of Birth
    $gender = $_POST['gender'];     // Gender
    $notel  = $_POST['notel'];      // Phone Number
    $country = $_POST['country'];   // Country
    $email  = $_POST['email'];      // Email
    $bio    = $_POST['bio'];        // Bio

    // SQL insert statement to add data into tutors table
    $sql = "INSERT INTO tutors (full_name, username, age, dob, gender, phone, country, email, bio)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind the data with correct data types (s = string, i = integer)
    $stmt->bind_param("ssissssss", $fname, $uname, $age, $dob, $gender, $notel, $country, $email, $bio);

    // Execute and check success
    if ($stmt->execute()) {
        echo "<h2>Tutor Registration Successful!</h2>";
        echo "<p>Welcome, <strong>$fname</strong>. Your details have been recorded.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();

} else {
    echo "Form not submitted properly.";
}
?>
