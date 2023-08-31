<?php
// Connect to the database (replace the placeholder values with your actual database credentials)
require 'db.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user = $_POST['new_user'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['Pnumber'];
    $password = $_POST['password'];

    // Generate unique key
    $uniqueKey = substr($user, 0, 2) . substr($password, 0, 2);

    // Insert data into the database
    $sql = "INSERT INTO userapp (phone_number, email, password, unique_key, username) 
            VALUES ('$phoneNumber', '$email', '$password', '$uniqueKey', '$user')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful
        echo '<script>alert("Registration successful");</script>';
        echo '<script>setTimeout(function(){ window.location.href = "register.html"; }, 2000);</script>';
        exit();
    } else {
        // Registration failed
        echo '<script>alert("Registration failed");</script>';
    }
}

// Close the database connection
mysqli_close($conn);
?>
