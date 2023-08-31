<?php

use LDAP\Result;

session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {
        $username = $_POST['admin_username'];
        $password = $_POST['admin_password'];

        // Prepare the query (you can modify it based on your table structure)
        $query = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $row = mysqli_fetch_assoc($result);

            $_SESSION['userid'] = $row['admin_id'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Login failed
            $errorMessage = "Invalid username or password.";
            header("Location: register.html?error=" . urlencode($errorMessage));
            exit();
        }
    } else {
        // Redirect back to the login page if the username or password is not set
        header("Location: adminLogin.html");
        exit();
    }
} else {
    // Redirect back to the login page if the request method is not POST
    header("Location: adminLogin.html");
    exit();
}
?>
