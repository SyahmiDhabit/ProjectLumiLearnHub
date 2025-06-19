<?php
// Include the database connection file
include "connection.php";

// Check if the form has been submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture data from the HTML form
    $fname   = $_POST['fname'];
    $uname   = $_POST['uname'];
    $pass    = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $age     = $_POST['age'];
    $dob     = $_POST['dob'];
    $gender  = $_POST['gender'];
    $notel   = $_POST['notel'];
    $country = $_POST['country'];
    $email   = $_POST['email'];
    $bio     = $_POST['bio'];

    // Optional: Admin ID is NULL or set to default if your table requires it
    $adminID = null;

    // Complete SQL for the 'users' table with all fields
    $sql = "INSERT INTO users 
        (fullName, age, gender, dob, phoneNumber, country, bio, adminID, username, password, email)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the prepare() is successful
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters (s = string, i = integer)
    $stmt->bind_param("sississssss", 
        $fname,     // fullName
        $age,       // age
        $gender,    // gender
        $dob,       // dob
        $notel,     // phoneNumber
        $country,   // country
        $bio,       // bio
        $adminID,   // adminID (null)
        $uname,     // username
        $pass,      // password (hashed)
        $email      // email
    );

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
