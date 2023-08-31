<?php

use LDAP\Result;

session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['Username']) && isset($_POST['password'])) {
        $username = $_POST['Username'];
        $password = $_POST['password'];

        // Prepare the query (you can modify it based on your table structure)
        $query = "SELECT * FROM userapp WHERE username = '$username' AND password = '$password'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $row = mysqli_fetch_assoc($result);

            $_SESSION['userid'] = $row['user_id'];
            header("Location: dashboard.php");
            exit();
        } else {
            // Login failed
            $errorMessage = "Invalid username or password.";
            header("Location: register.html?error=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Redirect back to the login page if the username or password is not set
        header("Location: register.html");
        exit();
    }
} else {
    // Redirect back to the login page if the request method is not POST
    header("Location: register.html");
    exit();
}
?>
