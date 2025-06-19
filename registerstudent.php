<?php
// Include the database connection file
include "connection.php";

// Check if the form has been submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture data from the HTML form using POST method
    // These input names must match the 'name' attributes in your HTML <input> fields
    $fname = $_POST['fname'];       // Full Name
    $uname = $_POST['uname'];       // Username
    $age   = $_POST['age'];         // Age
    $dob   = $_POST['dob'];         // Date of Birth
    $gender = $_POST['gender'];     // Gender (radio input)
    $notel  = $_POST['notel'];      // Phone Number
    $country = $_POST['country'];   // Country (dropdown)
    $email  = $_POST['email'];      // Email
    $bio    = $_POST['bio'];        // Bio (textarea)

    // Prepare SQL query to insert data into 'users' table
    $sql = "INSERT INTO users (full_name, username, age, dob, gender, phone, country, email, bio)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind the variables to the prepared statement with their types
    // s = string, i = integer (age), total 9 values
    $stmt->bind_param("ssissssss", $fname, $uname, $age, $dob, $gender, $notel, $country, $email, $bio);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Thank you, <strong>$fname</strong>. Your data has been saved.</p>";
    } else {
        // If there's an error, show it
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} else {
    // If the form is not submitted via POST, show error message
    echo "Form not submitted properly.";
}
?>