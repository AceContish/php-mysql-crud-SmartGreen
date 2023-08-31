<?php
// Connect to the database (replace the placeholder values with your actual database credentials)
require 'db.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user = $_POST['admin_username'];
    $email = $_POST['admin_email'];
    $phoneNumber = $_POST['admin_Pnumber'];
    $password = $_POST['admin_password'];

    // Insert data into the database
    $sql = "INSERT INTO admin (admin_username, admin_password, admin_phoneNo, admin_email) 
            VALUES ('$user', '$password', '$phoneNumber', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful
        echo '<script>alert("Registration successful");</script>';
        echo '<script>setTimeout(function(){ window.location.href = "adminLogin.html"; }, 2000);</script>';
        exit();
    } else {
        // Registration failed
        echo '<script>alert("Registration failed");</script>';
    }
}

// Close the database connection
mysqli_close($conn);
?>
